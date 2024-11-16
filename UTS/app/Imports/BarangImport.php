<?php 
namespace App\Imports; 

use App\Models\Barang; 
use Maatwebsite\Excel\Concerns\ToModel; 
use Maatwebsite\Excel\Concerns\WithHeadingRow; 

class BarangImport implements ToModel, WithHeadingRow 
{ 
    public function model(array $row) 
{ 
        return new Barang([ 
        'id' => $row['id'],  
        'namabarang' => $row['namabarang'], 
        'satuanbarang' => $row['satuanbarang'],   
        'namakategori' => $row['namakategori'],
        'stockawal' => $row['stockawal'], 
        'barangmasuk' => $row['barangmasuk'],  
    ]); 
  } 
} 
