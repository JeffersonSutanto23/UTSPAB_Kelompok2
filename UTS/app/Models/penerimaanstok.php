<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penerimaanstok extends Model
{
    use HasFactory;
    protected $fillable = ['id','tanggalreceivestok','namabarang','namavendor','quantityorder','hargaorder',
    'statusreceivestok'];
}
