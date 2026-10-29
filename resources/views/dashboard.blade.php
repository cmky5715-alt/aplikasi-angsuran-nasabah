<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Aplikasi Angsuran Nasabah</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <!-- Navbar / Header -->
    <nav class="bg-blue-600 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <h1 class="text-white text-xl font-bold">Aplikasi Angsuran Nasabah</h1>
            <div class="flex items-center space-x-4">
                <span class="text-blue-100 text-sm">Halo, <strong>{{ session('admin_name', 'Admin') }}</strong></span>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded-md text-sm font-medium transition">
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <!-- Notifikasi Sukses / Pesan -->
        @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Kolom Kiri: Form Input Angsuran Baru -->
            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 h-fit">
                <h2 class="text-lg font-bold text-gray-800 mb-4 border-b pb-2">Tambah Data Angsuran</h2>
                <form action="/angsuran/store" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Nasabah</label>
                        <input type="text" name="nama_nasabah" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Contoh: Budi Santoso">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Tagihan (Rp)</label>
                        <input type="number" name="jumlah_tagihan" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Contoh: 500000">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jatuh Tempo</label>
                        <input type="date" name="jatuh_tempo" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition">
                        Simpan Data
                    </button>
                </form>
            </div>

            <!-- Kolom Kanan: Tabel Data Angsuran Nasabah -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                    <h2 class="text-lg font-bold text-gray-800 mb-4 border-b pb-2">Daftar Angsuran Nasabah</h2>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 text-gray-600 text-sm uppercase tracking-wider">
                                    <th class="py-3 px-4 border-b">Nasabah</th>
                                    <th class="py-3 px-4 border-b">Tagihan</th>
                                    <th class="py-3 px-4 border-b">Jatuh Tempo</th>
                                    <th class="py-3 px-4 border-b">Status</th>
                                    <th class="py-3 px-4 border-b text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700 text-sm">
                                @forelse($angsurans ?? [] as $item)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="py-3 px-4 border-b font-medium">{{ $item->nama_nasabah }}</td>
                                    <td class="py-3 px-4 border-b">Rp {{ number_format($item->jumlah_tagihan, 0, ',', '.') }}</td>
                                    <td class="py-3 px-4 border-b">{{ $item->jatuh_tempo }}</td>
                                    <td class="py-3 px-4 border-b">
                                        @if($item->status == 'lunas')
                                            <span class="bg-green-100 text-green-800 text-xs px-2.5 py-1 rounded-full font-semibold">Lunas</span>
                                        @else
                                            <span class="bg-yellow-100 text-yellow-800 text-xs px-2.5 py-1 rounded-full font-semibold">Belum Lunas</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4 border-b text-center space-x-2">
                                        @if($item->status != 'lunas')
                                            <form action="/angsuran/{{ $item->id }}/lunas" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white text-xs px-3 py-1.5 rounded transition font-medium">
                                                    Lunaskan
                                                </button>
                                            </form>
                                        @endif
                                        <form action="/angsuran/{{ $item->id }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-xs px-3 py-1.5 rounded transition font-medium">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="py-6 text-center text-gray-400">Belum ada data angsuran yang tersimpan.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Bagian QR Code Pembayaran -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 text-center max-w-sm mx-auto">
                    <h3 class="text-base font-bold text-gray-800 mb-1">QR Code Pembayaran</h3>
                    <p class="text-xs text-gray-500 mb-3">Scan untuk melakukan pembayaran angsuran via e-wallet / m-banking.</p>
                    
                    <div class="flex justify-center bg-gray-50 p-3 rounded-lg border border-dashed border-gray-300">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=160x160&data={{ urlencode(url('/bayar')) }}" 
                             alt="QR Code Angsuran" 
                             class="rounded shadow-sm">
                    </div>
                </div>

            </div>

        </div>
    </main>

</body>
</html>