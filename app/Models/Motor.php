<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Motor extends Model
{
    
    protected $connection = 'mongodb';
    
    protected $collection = 'motor';

    protected $fillable = ['mesin_motor', 'suspensi_motor', 'transmisi_motor'];

    public function kendaraan()
    {
        return $this->morphOne(Kendaraan::class, 'kendaraanable');
    }

}

