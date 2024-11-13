<?php 
namespace App\Imports; 

use App\Models\Admin; 
use Maatwebsite\Excel\Concerns\ToModel; 
use Maatwebsite\Excel\Concerns\WithHeadingRow; 

class AdminImport implements ToModel, WithHeadingRow 
{ 
    public function model(array $row) 
{ 
        return new Admin([ 
        'id' => $row['id'],  
        'nama' => $row['nama'], 
        'password' => $row['password'], 
        'namadepartemen' => $row['namadepartemen'],  
        'email' => $row['email'],  
    ]); 
  } 
} 