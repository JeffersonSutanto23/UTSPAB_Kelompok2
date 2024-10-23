<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\admin;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new admin;
        $admin->userid = "0308122001";
        $admin->nama = "Matt";
        $admin->password = "moskov1lawan3";
        $admin->namadepartemen = "Human Resource";
        $admin->email = "matt@gmail.com";
        $admin->noHP = "08130099782";
        $admin->save();

        $admin = new admin;
        $admin->userid = "0308122002";
        $admin->nama = "Budiono Siregar";
        $admin->password = "Kapal Laut";
        $admin->namadepartemen = "Human Resource";
        $admin->email = "budi@gmail.com";
        $admin->noHP = "08136799422";
        $admin->save();

        $admin = new admin;
        $admin->userid = "0308122003";
        $admin->nama = "Nino";
        $admin->password = "El Sabar";
        $admin->namadepartemen = "Human Resource";
        $admin->email = "nino@gmail.com";
        $admin->noHP = "08136445622";
        $admin->save();

        $admin = new admin;
        $admin->userid = "0308122004";
        $admin->nama = "Verrel Angkasa";
        $admin->password = "VerrelSigma";
        $admin->namadepartemen = "Finance";
        $admin->email = "verrel@gmail.com";
        $admin->noHP = "08136446702";
        $admin->save();

        $admin = new admin;
        $admin->userid = "0308122005";
        $admin->nama = "Dennis";
        $admin->password = "BladeTzy";
        $admin->namadepartemen = "Information Technology";
        $admin->email = "denis@gmail.com";
        $admin->noHP = "08145645622";
        $admin->save();

   }
}
