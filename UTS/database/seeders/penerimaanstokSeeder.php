<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\penerimaanstok;
use App\Models\barang;
use App\Models\order;
use App\Models\vendor;

class penerimaanstokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barang = new barang;
        $barang->id = "7";
        $barang->namabarang = "Buku Akuntansi";
        $barang->satuanbarang = "pieces";
        $barang->namakategori = "Alat Tulis";
        $barang->jumlahstock = 120;
        $barang->barangmasuk = 10;
        $barang->tahunmasuk = "2023";
        $barang->save();

        $vendor = new vendor;
        $vendor->id = "1";
        $vendor->namavendor = "Yurino";
        $vendor->telepon = "081366775543";
        $vendor->alamat = "Jl. Panjaitan No.99, Medan";
        $vendor->namabarang = "Buku Akuntansi";
        $vendor->save();

        $penerimaanstok = new penerimaanstok;
        $penerimaanstok->id = "1";
        $penerimaanstok->tanggalreceivestok = "2024-10-11";
        $penerimaanstok->namavendor = "PT. Maju Jaya";
        $penerimaanstok->namabarang = "Penghapus"; 
        $penerimaanstok->tanggalorder = "2024-09-11"; 
        $penerimaanstok->quantityorder = "1";
        $penerimaanstok->hargaorder = "15000";
        $penerimaanstok->statusreceivestok = "Barang sudah diterima";
        $penerimaanstok->statusapproval = "Diapprove Manager";
        $penerimaanstok->save();
    }
}
