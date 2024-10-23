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
            $table->char('idreceivestok', length: 30)->autoIncrement();
            $table->dateTime('tanggalreceivestok');
            $table->char('namavendor', length: 30);
            $table->char('idbarang', length: 20);
            $table->integer('quantityorder');
            $table->char('hargaorder', length: 30);
            $table->char('statusreceivestok',length: 30);
            $table->char('ketreceivestok', length: 100);
            $table->timestamps();
            $table->foreign('idbarang')->references('idbarang')->on('barangs');
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
