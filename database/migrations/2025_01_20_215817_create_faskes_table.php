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
        Schema::create('faskes', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('nama_faskes');
            $table->string('slug')->unique();
            $table->string('kode_faskes');
            $table->enum('jenis_faskes', ['dinkes-prov', 'dinkes-kabkot', 'puskesmas', 'pustu', 'klinik', 'rs', 'lab-kesehatan', 'apotek', 'posyandu', 'gudang-farmasi', 'lkt', 'balai-pengobatan', 'labkesda'])->default('puskesmas');
            $table->enum('status_faskes', ['aktif', 'tidak-aktif'])->default('aktif');
            $table->foreignId('wilayah_id')->nullable()->constrained()->onDelete('set null');
            $table->nestedSet();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faskes');
    }
};
