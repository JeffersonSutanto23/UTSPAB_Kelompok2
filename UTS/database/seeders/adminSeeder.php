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
        $admin->id = "1";
        $admin->nama = "Matt";
        $admin->password = "moskov1lawan3";
        $admin->namadepartemen = "Human Resource";
        $admin->email = "matt@gmail.com";
        $admin->save();

        $admin = new admin;
        $admin->id = "2";
        $admin->nama = "Budiono Siregar";
        $admin->password = "Kapal Laut";
        $admin->namadepartemen = "Human Resource";
        $admin->email = "budi@gmail.com";
        $admin->save();

        $admin = new admin;
        $admin->id = "3";
        $admin->nama = "Nino";
        $admin->password = "El Sabar";
        $admin->namadepartemen = "Human Resource";
        $admin->email = "nino@gmail.com";
        $admin->save();

        $admin = new admin;
        $admin->id = "4";
        $admin->nama = "Verrel Angkasa";
        $admin->password = "VerrelSigma";
        $admin->namadepartemen = "Finance";
        $admin->email = "verrel@gmail.com";
        $admin->save();

        $admin = new admin;
        $admin->id = "5";
        $admin->nama = "Dennis";
        $admin->password = "Blazy";
        $admin->namadepartemen = "Information Technology";
        $admin->email = "denis@gmail.com";
        $admin->save();

   }
}
