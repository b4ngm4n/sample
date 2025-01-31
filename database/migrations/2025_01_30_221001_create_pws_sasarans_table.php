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
        Schema::create('pws_sasarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tahun_id')->constrained()->onDelete('cascade');
            $table->foreignId('kategori_id')->constrained()->onDelete('cascade');
            $table->foreignId('wilayah_kerja_id')->constrained()->onDelete('cascade');
            $table->integer('jumlah');
            $table->enum('jenis_data', ['l', 'p', 'ibu-hamil', 'tidak-hamil']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sasarans');
    }
};
