<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable = ['idorder','userid','namadepartemen','tanggalorder','namabarang','quantityorder',
    'hargaorder','statusapproval','ketapproval','tanggalapproval','statusorder','ketorder','tanggalreceiveorder',
    'ketreceiveorder'];
}
