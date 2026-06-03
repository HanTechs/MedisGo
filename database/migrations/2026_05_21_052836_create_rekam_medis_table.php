<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id('id_rekam');
            $table->foreignId('id_pendaftaran')->constrained('pendaftaran', 'id_pendaftaran')->onDelete('cascade');
            $table->date('tgl_periksa');
            $table->text('hasil_pemeriksaan');
            $table->text('diagnosa');
            $table->text('tindakan');
            $table->string('file_resep')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rekam_medis');
    }
};
