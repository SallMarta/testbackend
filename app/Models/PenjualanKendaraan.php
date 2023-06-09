<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class PenjualanKendaraan extends Model
{
    protected $connection = 'mongodb';
    
    protected $collection = 'penjualan_kendaraan';

    protected $fillable = [
        'id_kendaraan', 
        'tanggal_penjualan', 
        'harga_jual',
        'jenis_kendaraan',
    ];

}
