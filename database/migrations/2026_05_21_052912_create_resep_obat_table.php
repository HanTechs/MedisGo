<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resep_obat', function (Blueprint $table) {
            $table->id('id_resep');
            $table->foreignId('id_rekam')->constrained('rekam_medis', 'id_rekam')->onDelete('cascade');
            $table->string('nama_obat');
            $table->string('dosis');
            $table->string('aturan_pakai');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resep_obat');
    }
};
