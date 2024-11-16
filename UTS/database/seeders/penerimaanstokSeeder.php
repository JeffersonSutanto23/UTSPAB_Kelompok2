<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\penerimaanstok;
use App\Models\barang;
use App\Models\vendor;

class penerimaanstokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barang = new barang;
        $barang->id = "8";
        $barang->namabarang = "Buku Akutansi";
        $barang->satuanbarang = "pieces";
        $barang->namakategori = "Alat Tulis";
        $barang->stockawal = 120;
        $barang->barangmasuk = 10;
        $barang->save();

        $vendor = new vendor;
        $vendor->id = "1";
        $vendor->namavendor = "Yurino";
        $vendor->telepon = "081366775543";
        $vendor->alamat = "Jl. Panjaitan No.99, Medan";
        $vendor->save();

        $penerimaanstok = new penerimaanstok;
        $penerimaanstok->id = "1";
        $penerimaanstok->tanggalreceivestok = "11 Oktober 2024";
        $penerimaanstok->namavendor = "Yurino";
        $penerimaanstok->namabarang = "Buku Akutansi";  
        $penerimaanstok->quantityorder = "1";
        $penerimaanstok->hargaorder = "Rp. 100.000";
        $penerimaanstok->statusreceivestok = "Barang sudah diterima";
        $penerimaanstok->save();
    }
}
