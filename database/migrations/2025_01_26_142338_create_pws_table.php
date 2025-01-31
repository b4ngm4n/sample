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
        Schema::create('pws', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tahun_id')->constrained()->onDelete('restrict');
            $table->foreignId('bulan_id')->constrained()->onDelete('restrict');
            $table->foreignId('wilayah_kerja_id')->constrained()->onDelete('restrict');
            $table->foreignId('kategori_vaksin_id')->constrained()->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pws');
    }
};
