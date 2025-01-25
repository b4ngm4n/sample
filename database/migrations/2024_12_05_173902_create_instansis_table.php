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
        Schema::create('instansis', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();

            $table->foreignId('kecamatan_id')->nullable()->constrained()->onDelete('cascade');
            
            $table->string('nama_instansi');
            $table->string('slug')->unique();
            $table->enum('jenis', 
            [
                'dinkes-prov', 
                'dinkes-kabkot', 
                'puskesmas', 'pustu', 
                'klinik', 'rs', 
                'lab-kesehatan', 
                'apotek', 
                'posyandu', 
                'gudang-farmasi', 
                'lkt', 
                'balai-pengobatan'
            ]);
            $table->string('kode_instansi')->nullable();
            $table->enum('status', ['aktif', 'non-aktif'])->default('aktif');

            $table->integer('lft')->nullable();
            $table->integer('rgt')->nullable();
            $table->integer('depth')->default(0);

            $table->text('alamat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instansis');
    }
};
