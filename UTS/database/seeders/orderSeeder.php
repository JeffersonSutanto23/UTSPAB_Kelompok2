<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\order;
use App\Models\admin;
use App\Models\barang;
use Carbon\Carbon;

class orderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order = new order;
        $order->id = 1;  
        $order->nama = "Dennis";    
        $order->namabarang = "Buku Akutansi";  
        $order->quantityorder = 1;  
        $order->hargaorder = 'Rp.100.000';           
        $order->statusorder= "Dalam Perjalanan";
        $order->tanggalorder = Carbon::now(); 
        $order->tanggalreceiveorder = Carbon::now();  
        $order->save();
    }
}
