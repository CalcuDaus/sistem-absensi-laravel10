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
        Schema::create('notifikasi_bacas', function (Blueprint $table) {
            $table->id();
            $table->boolean('dibaca');
            $table->foreignId('notifikasi_id')->constrained('notifikasis');
            $table->foreignId('notifikasi_user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifikasi_bacas');
    }
};
