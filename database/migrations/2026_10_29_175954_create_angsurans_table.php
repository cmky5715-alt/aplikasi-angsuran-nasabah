<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('angsurans', function (Blueprint $table) {
            $table->id();$table->unsignedBigInteger('pinjaman_id')->nullable();
            $table->string('kode_pinjaman')->default('PJN-2026-001');$table->string('nama_nasabah');
            $table->string('kelompok')->default('Kelompok Melati');$table->integer('angsuran_ke');
            $table->date('jatuh_tempo')->nullable();$table->decimal('jumlah_tagihan', 15, 2)->default(0);
            $table->decimal('jumlah_bayar', 15, 2)->default(0);$table->date('tanggal_bayar')->nullable();
            $table->enum('status', ['belum', 'lunas'])->default('lunas');$table->string('metode')->default('Tunai');
            $table->string('keterangan')->nullable();$table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('angsurans');
    }
};