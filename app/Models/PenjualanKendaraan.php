<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanKendaraan extends Model
{
    protected $connection = 'mongodb';
    
    protected $collection = 'penjualanKendaraan';

    protected $fillable = [
        'id_kendaraan', 
        'tanggal_penjualan', 
        'harga_jual', 
        'harga_total', 
        'jumlah_terjual',
        'stok',
        'jenis_kendaraan',
    ];

}
