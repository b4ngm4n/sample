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
        Schema::create('pos_pelayanans', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('puskesmas_id')->constrained()->onDelete('cascade');
            $table->foreignId('kelurahan_id')->nullable()->constrained()->onDelete('set null');
            $table->string('nama_pos_pelayanan');
            $table->string('slug');
            $table->text('alamat')->nullable();
            $table->foreignId('jenis_pelayanan_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pos_pelayanans');
    }
};
