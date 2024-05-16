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
        Schema::create('beras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_beras_id')->constrained('jenis_beras')->onDelete('cascade');
            $table->integer('harga');
            $table->integer('berat');
            $table->text('deskripsi');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beras');
    }
};