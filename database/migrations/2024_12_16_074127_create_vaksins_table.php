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
        Schema::create('vaksins', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('nama_vaksin');
            $table->string('slug')->unique();
            $table->string('nomor_batch');
            $table->string('tanggal_kedaluwarsa');
            $table->string('produsen')->nullable();
            $table->foreignId('jenis_pelayanan_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaksins');
    }
};
