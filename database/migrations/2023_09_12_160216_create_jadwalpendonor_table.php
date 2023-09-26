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
        Schema::create('jadwalpendonor', function (Blueprint $table) {
            $table->unsignedBigInteger('id_jadwal_donor');
            $table->unsignedBigInteger('id_pendonor');

            $table->index('id_jadwal_donor');
            $table->index('id_pendonor');
            $table->integer('no_urut');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwalpendonor');
    }
};
