<?php

use Illuminate\Console\View\Components\Task;
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
        Schema::create('alamats', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('jalan');
            $table->string('slug')->unique();
            $table->char('kode_pos', 5)->nullable();
            $table->char('rt', 3)->nullable();
            $table->char('rw', 3)->nullable();
            $table->unsignedBigInteger('alamatable_id');
            $table->string('alamatable_type');
            $table->enum('status', ['alamat_utama', 'alamat_tambahan', 'alamat_lama'])->default('alamat_utama');
            $table->foreignId('wilayah_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();

            $table->index(['alamatable_id', 'alamatable_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alamats');
    }
};
