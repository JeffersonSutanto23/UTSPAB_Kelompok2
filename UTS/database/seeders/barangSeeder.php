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
            'id' => '1',
            'namabarang' => 'Buku Tulis',
            'satuanbarang' => 'lusin',
            'namakategori' => 'Buku',
            'stockawal' => '100',
            'barangmasuk' => '20',
        ]);
        DB::table('barangs')->insert([
            'id' => '2',
            'namabarang' => 'Pensil Warna',
            'satuanbarang' => 'box',
            'namakategori' => 'Alat Gambar',
            'stockawal' => '70',
            'barangmasuk' => '20',
        ]);
        DB::table('barangs')->insert([
            'id' => '3',
            'namabarang' => 'Pulpen Hitam',
            'satuanbarang' => 'bungkus',
            'namakategori' => 'Alat Tulis',
            'stockawal' => '300',
            'barangmasuk' => '70',
        ]);
        DB::table('barangs')->insert([
            'id' => '4',
            'namabarang' => 'Stempel',
            'satuanbarang' => 'pieces',
            'namakategori' => 'Perangko',
            'stockawal' => '100',
            'barangmasuk' => '40',
        ]);
        DB::table('barangs')->insert([
            'id' => '5',
            'namabarang' => 'Pensil 2B',
            'satuanbarang' => 'bungkus',
            'namakategori' => 'Alat Tulis',
            'stockawal' => '400',
            'barangmasuk' => '140',
        ]);
        DB::table('barangs')->insert([
            'id' => '6',
            'namabarang' => 'Penghapus',
            'satuanbarang' => 'pieces',
            'namakategori' => 'Alat Tulis',
            'stockawal' => '200',
            'barangmasuk' => '100',
        ]);
        DB::table('barangs')->insert([
            'id' => '7',
            'namabarang' => 'Penggaris',
            'satuanbarang' => 'pieces',
            'namakategori' => 'Alat Tulis',
            'stockawal' => '360',
            'barangmasuk' => '100',
        ]);
    }
}
