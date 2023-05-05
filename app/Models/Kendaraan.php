<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;


class Kendaraan extends Model
{
    protected $connection = 'mongodb';
    
    protected $collection = 'kendaraan';
    
    protected $fillable = ['nama', 'tahun', 'warna', 'harga', 'stok', 'motor_id', 'mobil_id', 'jenis_kendaraan'];
    
    public function motor()
    {
        return $this->hasMany(Motor::class);
    }
    
    public function mobil()
    {
        return $this->hasMany(Mobil::class);
    }
    
    public function jeniskendaraan()
    {
        return $this->morphTo();
    }
}