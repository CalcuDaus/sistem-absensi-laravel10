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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nis')->unique();
            $table->string('nama');
            $table->enum('gelombang', ['1', '2']);
            $table->foreignId('instruktur_id')->constrained('instrukturs');
            $table->foreignId('sekolah_id')->constrained('sekolahs');
            $table->foreignId('jurusan_id')->constrained('jurusans');
            $table->foreignId('periode_id')->constrained('periodes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
