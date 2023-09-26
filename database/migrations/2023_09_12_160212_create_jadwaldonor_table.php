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
        Schema::create('jadwaldonor', function (Blueprint $table) {
            $table->id('id_jadwal_donor');
            $table->string('lokasi');
            $table->string('alamat_donor');
            $table->date('tanggal_donor');
            $table->string('jam_mulai');
            $table->string('jam_selesai');
            $table->string('kontak');
            $table->integer('jumlah_pendonor')->default(0);
            $table->double('latitude')->default(0);
            $table->double('longitude')->default(0);
            // $table->enum('status', ['Belum Selesai', 'Selesai']); // Kolom ENUM 'status' dengan pilihan tertentu
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwaldonor');
    }
};
