<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use App\Models\barang;

class barangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barangs')->insert([
            'idbarang' => 'BKTLS',
            'namabarang' => 'Buku Tulis',
            'satuanbarang' => 'lusin',
            'harga' => '100,000',
            'namakategori' => 'Buku',
            'stockawal' => '100',
            'barangkeluar' => '30',
            'barangmasuk' => '20',
        ]);
        DB::table('barangs')->insert([
            'idbarang' => 'PNSLWRN',
            'namabarang' => 'Pensil Warna',
            'satuanbarang' => 'box',
            'harga' => '300,000',
            'namakategori' => 'Alat Gambar',
            'stockawal' => '70',
            'barangkeluar' => '20',
            'barangmasuk' => '20',
        ]);
        DB::table('barangs')->insert([
            'idbarang' => 'PLPNHTM',
            'namabarang' => 'Pulpen Hitam',
            'satuanbarang' => 'bungkus',
            'harga' => '70,000',
            'namakategori' => 'Alat Tulis',
            'stockawal' => '300',
            'barangkeluar' => '50',
            'barangmasuk' => '70',
        ]);
        DB::table('barangs')->insert([
            'idbarang' => 'STMPL',
            'namabarang' => 'Stempel',
            'satuanbarang' => 'pieces',
            'harga' => '50,000',
            'namakategori' => 'Perangko',
            'stockawal' => '100',
            'barangkeluar' => '50',
            'barangmasuk' => '40',
        ]);
        DB::table('barangs')->insert([
            'idbarang' => 'PNSL2B',
            'namabarang' => 'Pensil 2B',
            'satuanbarang' => 'bungkus',
            'harga' => '70,000',
            'namakategori' => 'Alat Tulis',
            'stockawal' => '400',
            'barangkeluar' => '100',
            'barangmasuk' => '140',
        ]);
        DB::table('barangs')->insert([
            'idbarang' => 'PNGHPS',
            'namabarang' => 'Penghapus',
            'satuanbarang' => 'pieces',
            'harga' => '20,000',
            'namakategori' => 'Alat Tulis',
            'stockawal' => '200',
            'barangkeluar' => '70',
            'barangmasuk' => '100',
        ]);
        DB::table('barangs')->insert([
            'idbarang' => 'PNGRS',
            'namabarang' => 'Penggaris',
            'satuanbarang' => 'pieces',
            'harga' => '10,000',
            'namakategori' => 'Alat Tulis',
            'stockawal' => '360',
            'barangkeluar' => '100',
            'barangmasuk' => '100',
        ]);
    }
}
