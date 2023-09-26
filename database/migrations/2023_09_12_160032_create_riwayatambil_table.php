<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('riwayatambil', function (Blueprint $table) {
            $table->id('id_riwayat');
            $table->integer('id_pendonor');
            $table->integer('jumlah_ambil');
            $table->datetime('tanggal_ambil');
            $table->string('penerima');
            $table->string('kontak_penerima');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayatambil');
    }
};
