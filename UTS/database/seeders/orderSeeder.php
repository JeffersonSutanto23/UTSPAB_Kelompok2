<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\order;
use App\Models\admin;
use App\Models\barang;

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
        $order->namabarang = "Penghapus";  
        $order->quantityorder = 3;  
        $order->hargaorder = '15000';           
        $order->tanggalorder = "2024-09-11";
        $order->statusapproval = "Diapprove Manager";   
        $order->save();
    }
}
