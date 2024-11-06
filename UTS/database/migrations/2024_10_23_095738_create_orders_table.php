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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->char('nama', 100);
            $table->char('namabarang', length: 100);
            $table->integer('quantityorder');
            $table->char('hargaorder', length: 30);
            $table->char('statusorder', length:20);
            $table->dateTime('tanggalorder');
            $table->dateTime('tanggalreceiveorder');
            $table->timestamps();
            $table->foreign('nama')->references('nama')->on('admins');
            $table->foreign('namabarang')->references('namabarang')->on('barangs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
