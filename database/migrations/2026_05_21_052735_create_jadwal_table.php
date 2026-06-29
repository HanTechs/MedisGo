<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id('id_jadwal');
            $table->foreignId('id_user')->constrained('dokter', 'id_user')->onDelete('cascade');
            $table->string('hari_mulai');
            $table->string('hari_selesai');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->integer('kuota_maksimal');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
