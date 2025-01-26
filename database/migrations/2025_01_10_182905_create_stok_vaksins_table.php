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
        Schema::create('stok_vaksins', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('vaksin_id')->constrained()->onDelete('cascade');
            $table->string('kode_batch');
            $table->date('tanggal_produksi')->nullable();
            $table->date('expired_date')->nullable();
            $table->integer('jumlah')->default(1);
            $table->string('satuan')->nullable()->default('vial');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok_vaksins');
    }
};
