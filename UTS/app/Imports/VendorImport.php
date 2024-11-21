<?php 
namespace App\Imports; 

use App\Models\vendor;  
use App\Models\barang; 
use Maatwebsite\Excel\Concerns\ToModel; 
use Maatwebsite\Excel\Concerns\WithHeadingRow; 

class VendorImport implements ToModel, WithHeadingRow 
{ 
    public function model(array $row) 
{ 
        return new Vendor([ 
        'id' => $row['id'],  
        'namavendor' => $row['namavendor'], 
        'telepon' => $row['telepon'], 
        'alamat' => $row['alamat'],  
        'namabarang' =>$row['namabarang'],
    ]); 
  } 
} 
