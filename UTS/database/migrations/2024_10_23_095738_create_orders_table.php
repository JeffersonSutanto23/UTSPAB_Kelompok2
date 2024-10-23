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
            $table->char('idorder', length: 30)->autoIncrement();
            $table->char('userid', length: 20);
            $table->char('namadepartemen', length: 50);
            $table->dateTime('tanggalorder');
            $table->char('namabarang', length: 100);
            $table->integer('quantityorder');
            $table->char('hargaorder', length: 30);
            $table->char('statusapproval', length:20);
            $table->char('ketapproval', length: 200);
            $table->dateTime('tanggalapproval');
            $table->char('statusorder', length: 30);
            $table->char('ketorder', length: 100);
            $table->dateTime('tanggalreceiveorder');
            $table->char('ketreceiveorder', length: 100);
            $table->timestamps();
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
