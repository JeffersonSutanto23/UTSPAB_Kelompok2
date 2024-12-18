<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use App\Models\vendor;

class vendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendor = new vendor;
        $vendor->id = "2";
        $vendor->namavendor = "PT. Indo Berjaya";
        $vendor->telepon = "081366775543";
        $vendor->alamat = "Jl. Gatot No.09, Medan";
        $vendor->namabarang = "Penggaris";
        $vendor->save();

        $vendor = new vendor;
        $vendor->id = "3";
        $vendor->namavendor = "PT. Maju Jaya";
        $vendor->telepon = "081366775060";
        $vendor->alamat = "Jl. Bambu Runcing No.29, Medan";
        $vendor->namabarang = "Penghapus";
        $vendor->save();
    }
}

