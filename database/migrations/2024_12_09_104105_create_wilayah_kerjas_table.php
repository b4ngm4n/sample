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
        Schema::create('wilayah_kerjas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('puskesmas_id')->constrained()->onDelete('cascade');
            $table->foreignId('kelurahan_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wilayah_kerjas');
    }
};
