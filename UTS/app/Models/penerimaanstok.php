<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penerimaanstok extends Model
{
    use HasFactory;
    protected $fillable = ['idreceivestok','tanggalreceivestok','namabarang','namavendor','quantityorder','hargaorder',
    'statusreceivestok'];
}
