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
            $table->foreignId('faskes_id')->constrained()->onDelete('restrict');
            $table->foreignId('vaksin_id')->constrained()->onDelete('restrict');
            $table->foreignId('wilayah_id')->constrained()->onDelete('restrict');
            $table->integer('jumlah_imunisasi_l')->default(0); //jumlah imunisasi laki laki;
            $table->integer('jumlah_imunisasi_p')->default(0); //jumlah imunisasi perempuan;
            $table->foreignId('kategori_id')->nullable()->constrained()->onDelete('set null');
            $table->text('keterangan')->nullable();
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
