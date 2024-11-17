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
            'jumlahstock' => '100',
            'barangmasuk' => '20',
            'tahunmasuk' => '2024',
        ]);
        DB::table('barangs')->insert([
            'id' => '2',
            'namabarang' => 'Pensil Warna',
            'satuanbarang' => 'box',
            'namakategori' => 'Alat Gambar',
            'jumlahstock' => '300',
            'barangmasuk' => '20',
            'tahunmasuk' => '2024',
        ]);
        DB::table('barangs')->insert([
            'id' => '3',
            'namabarang' => 'Pulpen Hitam',
            'satuanbarang' => 'bungkus',
            'namakategori' => 'Alat Tulis',
            'jumlahstock' => '240',
            'barangmasuk' => '70',
            'tahunmasuk' => '2024',
        ]);
        DB::table('barangs')->insert([
            'id' => '4',
            'namabarang' => 'Pensil 2B',
            'satuanbarang' => 'bungkus',
            'namakategori' => 'Alat Tulis',
            'jumlahstock' => '240',
            'barangmasuk' => '10',
            'tahunmasuk' => '2023',
        ]);
        DB::table('barangs')->insert([
            'id' => '5',
            'namabarang' => 'Penghapus',
            'satuanbarang' => 'pieces',
            'namakategori' => 'Alat Tulis',
            'jumlahstock' => '500',
            'barangmasuk' => '100',
            'tahunmasuk' => '2020',
        ]);
        DB::table('barangs')->insert([
            'id' => '6',
            'namabarang' => 'Penggaris',
            'satuanbarang' => 'pieces',
            'namakategori' => 'Alat Tulis',
            'jumlahstock' => '200',
            'barangmasuk' => '100',
            'tahunmasuk' => '2023',
        ]);
    }
}
