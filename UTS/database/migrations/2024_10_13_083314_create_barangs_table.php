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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->char('namabarang', 100);
            $table->char('satuanbarang', 15);
            $table->char('harga', 30);
            $table->char('namakategori', 30);
            $table->integer('stockawal');
            $table->integer('barangkeluar');
            $table->integer('barangmasuk');
            $table->timestamps();
            $table->unique('namabarang');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
