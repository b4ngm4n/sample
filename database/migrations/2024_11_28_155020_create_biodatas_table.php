<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('biodatas', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('nama_lengkap', 255);
            $table->string('nama_depan', 50)->nullable();
            $table->string('nama_tengah', 50)->nullable();
            $table->string('nama_belakang', 50)->nullable();
            $table->string('slug')->unique();
            $table->char('nik')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('tempat_lahir', 255)->nullable();
            $table->string('agama', 100)->nullable();
            $table->string('pekerjaan', 100)->nullable();
            $table->enum('jenis_kelamin', ['l', 'p'])->nullable();
            $table->string('no_hp', 13)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodatas');
    }
};
