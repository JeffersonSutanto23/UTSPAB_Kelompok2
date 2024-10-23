<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\penerimaanstok;
use App\Models\barang;
use App\Models\vendor;
use Carbon\Carbon;

class penerimaanstokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barang = new barang;
        $barang->idbarang = "BKKAKT";
        $barang->namabarang = "Buku Akutansi";
        $barang->satuanbarang = "pieces";
        $barang->harga = "Rp.100.000";
        $barang->namakategori = "Alat Tulis";
        $barang->stockawal = 120;
        $barang->barangkeluar = 30;
        $barang->barangmasuk = 10;
        $barang->save();

        $vendor = new vendor;
        $vendor->idvendor = "VNDR06";
        $vendor->namavendor = "Yurino";
        $vendor->telepon = "081366775543";
        $vendor->alamat = "Jl. AE Bren No.99, Medan";
        $vendor->save();

        $penerimaanstok = new penerimaanstok;
        $penerimaanstok->idreceivestok = "RCV06";
        $penerimaanstok->tanggalreceivestok = Carbon::now();
        $penerimaanstok->namavendor = "Yurino";
        $penerimaanstok->idbarang = "BKKAKT";  
        $penerimaanstok->quantityorder = "10";
        $penerimaanstok->hargaorder = "Rp. 1.000.000";
        $penerimaanstok->statusreceivestok = "Approved";
        $penerimaanstok->ketreceivestok = "Barang diterima";
        $penerimaanstok->save();
    }
}
