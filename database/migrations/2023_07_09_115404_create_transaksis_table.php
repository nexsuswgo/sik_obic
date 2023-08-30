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
        Schema::create('obic_transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('kategori_id')->nullable();
            $table->string('bank_id')->nullable();
            $table->string('tgl')->nullable();
            $table->string('jenis')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('nominal')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
