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
        Schema::create('pws_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pws_id')->constrained()->onDelete('cascade');
            $table->integer('jumlah');
            $table->enum('jenis_data', ['jumlah_laki_laki', 'jumlah_perempuan', 'jumlah_wus_suntik', 'jumlah_wus_status']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pws_details');
    }
};
