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
        Schema::create('penerimaanstoks', function (Blueprint $table) {
            $table->id();
            $table->DateTime('tanggalreceivestok');
            $table->char('namavendor', length: 30);
            $table->char('namabarang', length: 100);
            $table->integer('quantityorder');         
            $table->double('hargaorder');
            $table->char('statusreceivestok', length: 100);
            $table->timestamps();
            $table->foreign('namabarang')->references('namabarang')->on('barangs');
            $table->foreign('namavendor')->references('namavendor')->on('vendors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerimaanstoks');
    }
};
