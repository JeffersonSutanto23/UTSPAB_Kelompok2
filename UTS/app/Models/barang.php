<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $fillable = ['idbarang','namabarang','satuanbarang','harga','namakategori','stockawal','barangkeluar','barangmasuk'];
}
