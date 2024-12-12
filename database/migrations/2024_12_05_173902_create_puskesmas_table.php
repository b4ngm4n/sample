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
        Schema::create('puskesmas', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('kecamatan_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('nama_puskesmas');
            $table->string('slug')->unique();
            $table->string('kode_puskesmas')->nullable();
            $table->enum('status_puskesmas', ['aktif', 'non-aktif'])->default('aktif');
            $table->text('alamat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puskeskemas');
    }
};
