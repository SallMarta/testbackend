<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Mobil extends Model
{
    
    protected $connection = 'mongodb';
    
    protected $collection = 'mobil';

    protected $fillable = ['mesin_mobil', 'kapasitas_mobil', 'tipe_mobil'];

    public function kendaraan()
    {
        return $this->morphOne(Kendaraan::class, 'kendaraanable');
    }
}
