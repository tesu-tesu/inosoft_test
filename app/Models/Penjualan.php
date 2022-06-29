<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Penjualan extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'penjualan';
    protected $fillable = ['id_kendaraan', 'tgl_jual', 'harga'];
}
