<?php 
namespace App\Imports; 

use App\Models\Penerimaanstok; 
use App\Models\Vendor; 
use App\Models\Barang; 
use Maatwebsite\Excel\Concerns\ToModel; 
use Maatwebsite\Excel\Concerns\WithHeadingRow; 

class PenerimaanstokImport implements ToModel, WithHeadingRow 
{ 
    public function model(array $row) 
{ 
        return new Penerimaanstok([ 
        'id' => $row['id'],  
        'tanggalreceivestok' => $row['tanggalreceivestok'], 
        'namabarang' => $row['namabarang'], 
        'namavendor' => $row['namavendor'],
        'quantityorder' => $row['quantityorder'],   
        'hargaorder' => $row['hargaorder'], 
        'statusreceivestok' => $row['statusreceivestok'], 
    ]); 
  } 
} 

