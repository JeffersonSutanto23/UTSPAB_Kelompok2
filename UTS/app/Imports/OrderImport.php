<?php 
namespace App\Imports; 

use App\Models\Order; 
use App\Models\Admin; 
use App\Models\Barang; 
use Maatwebsite\Excel\Concerns\ToModel; 
use Maatwebsite\Excel\Concerns\WithHeadingRow; 
use Carbon\Carbon;

class OrderImport implements ToModel, WithHeadingRow 
{ 
    public function model(array $row) 
{ 
        return new Order([ 
        'id' => $row['id'],  
        'nama' => $row['nama'], 
        'namabarang' => $row['namabarang'], 
        'quantityorder' => $row['quantityorder'],  
        'hargaorder' => $row['hargaorder'], 
        'statusorder' => $row['statusorder'], 
        'tanggalorder' => $row['tanggalorder'],
        'tanggalreceiveorder' => $row['tanggalreceiveorder'],
    ]); 
  } 
} 

