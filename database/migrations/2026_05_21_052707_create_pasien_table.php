<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->foreignId('id_user')->primary()->constrained('user', 'id_user')->onDelete('cascade');
            $table->string('nik', 16)->unique();
            $table->string('no_hp', 15);
            $table->string('jenis_kelamin');
            $table->date('tgl_lahir');
            $table->text('alamat');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};
