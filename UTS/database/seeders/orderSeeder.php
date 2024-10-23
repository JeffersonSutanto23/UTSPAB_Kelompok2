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
        $startDate = Carbon::create(2024, 11, 1); 
        $products = [
            ['idbarang' => 'BKTLS', 'namabarang' => 'Buku Tulis', 'quantity' => 15, 'harga' => '100,000'],
            ['idbarang' => 'PNSLWRN', 'namabarang' => 'Pensil Warna', 'quantity' => 10, 'harga' => '300,000'],
            ['idbarang' => 'PLPNHTM', 'namabarang' => 'Pulpen Hitam', 'quantity' => 20, 'harga' => '70,000'],
            ['idbarang' => 'STMPL', 'namabarang' => 'Stempel', 'quantity' => 5, 'harga' => '50,000'],
            ['idbarang' => 'PNSL2B', 'namabarang' => 'Pensil 2B', 'quantity' => 30, 'harga' => '70,000'],
            ['idbarang' => 'PNGHPS', 'namabarang' => 'Penghapus', 'quantity' => 25, 'harga' => '20,000'],
            ['idbarang' => 'PNGRS', 'namabarang' => 'Penggaris', 'quantity' => 40, 'harga' => '10,000']
        ];

        for ($i = 0; $i < count($products); $i++) {
            $order = new order;
            $order->idorder = "ORDR" . (1 + $i);  
            $order->userid = "03081220" . (1 + $i); 
            $order->namadepartemen = "Human Resource";  
            $order->tanggalorder = $startDate->copy();  
            $order->namabarang = $products[$i]['namabarang'];  
            $order->quantityorder = $products[$i]['quantity'];  
            // menentukan harga
            $price = str_replace(',', '', $products[$i]['harga']); 
            $hargaorder = $order->quantityorder * (int)$price; 
            
            // Format harga
            $order->hargaorder = 'Rp.' . number_format($hargaorder, 0, ',', '.'); 
            
            $order->statusapproval = "Approved";
            $order->ketapproval = "Diapprove Manager";
            $order->tanggalapproval = $startDate->copy(); 
            $order->statusorder = "Completed";
            $order->ketorder = "Barang telah sampai";
            $order->tanggalreceiveorder = $startDate->copy();  
            $order->ketreceiveorder = "Barang bagus";
            $order->save();

            $startDate->addMonth();
        }
    }
}

