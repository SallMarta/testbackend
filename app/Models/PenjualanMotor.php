<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class PenjualanMotor extends Model
{
    protected $connection = 'mongodb';
    
    protected $collection = 'penjualan_motor';

    protected $fillable = [
        'id_kendaraan', 
        'tanggal_penjualan', 
        'harga_jual',
        'jenis_kendaraan',
    ];
}
