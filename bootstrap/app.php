<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Angsuran;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        using: function () {
            Route::middleware('web')->group(function () {
                
                // Rute utama langsung tampilkan dashboard
                Route::get('/', function () {
                    $angsurans = Angsuran::orderBy('id', 'desc')->get();
                    return view('dashboard', compact('angsurans'));
                });

                Route::get('/dashboard', function () {
                    $angsurans = Angsuran::orderBy('id', 'desc')->get();
                    return view('dashboard', compact('angsurans'));
                });

                // Simpan Data (Tanpa memaksa nilai 'status' agar otomatis memakai default database)
                Route::post('/angsuran/store', function (Request $request) {
                    $data = [
                        'nama_nasabah'   => $request->input('nama_nasabah'),
                        'jumlah_tagihan' => $request->input('jumlah_tagihan'),
                        'angsuran_ke'    => $request->input('angsuran_ke', 1),
                        'jatuh_tempo'    => $request->input('jatuh_tempo'),
                    ];

                    Angsuran::create($data);

                    return redirect()->to('/')->with('success', 'Data angsuran berhasil disimpan!');
                });

                // Update Status Jadi Lunas
                Route::post('/angsuran/{id}/lunas', function ($id) {
                    $item = Angsuran::findOrFail($id);
                    $item->update(['status' => 'lunas']);
                    return redirect()->to('/')->with('success', 'Status diperbarui menjadi Lunas!');
                });

                // Hapus Data
                Route::delete('/angsuran/{id}', function ($id) {
                    $item = Angsuran::findOrFail($id);
                    $item->delete();
                    return redirect()->to('/')->with('success', 'Data berhasil dihapus!');
                });

            });
        },
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->trustProxies(at: '*');
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();