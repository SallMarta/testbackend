<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Mobil;
use App\Models\Motor;
use App\Models\PenjualanKendaraan;
use App\Models\PenjualanMobil;
use App\Models\PenjualanMotor;
use Illuminate\Http\Request;

class PenjualanKendaraanController extends Controller
{
    public function jualKendaraan($id)
    {
        $kendaraan = Kendaraan::find($id);
        
        if (!$kendaraan) {
            return response()->json(['message' => 'Kendaraan tidak ada.'], 404);
        }
        
        if ($kendaraan->stok == 0) {
            return response()->json(['message' => 'Stok habis, gagal menjual'], 400);
        }
        
        $kendaraan->stok -= 1;
        $kendaraan->save();
        
        $motor = Motor::where('id_kendaraan', $id)->first();
        if ($motor) {
            $motor->stok -= 1;
            $motor->save();
            
            $laporan = new PenjualanMotor();
            $laporan->kendaraan_id = $motor->id;
            $laporan->harga = $motor->harga;
            $laporan->tanggal_jual = date('d-m-Y H:i:s');
            $laporan->save();
        }
        
        $mobil = Mobil::where('id_kendaraan', $id)->first();
        if ($mobil) {
            $mobil->stok -= 1;
            $mobil->save();
            
            $laporan = new PenjualanMobil();
            $laporan->kendaraan_id = $mobil->id;
            $laporan->harga = $mobil->harga;
            $laporan->tanggal_jual = date('d-m-Y H:i:s');
            $laporan->save();
        }
        
        $laporan = new PenjualanKendaraan();
        $laporan->kendaraan_id = $motor->id;
        $laporan->harga = $motor->harga;
        $laporan->nama = $kendaraan->nama;
        $laporan->tanggal_jual = date('d-m-Y H:i:s');
        $laporan->save();
        
        return response()->json([
            'message' => 'Kendaraan terjual.', 
            'data' => $laporan]
        );
    }
    
    public function laporanKendaraan()
    {
        $laporanKendaraan = PenjualanKendaraan::all();
        
        return response()->json([
            'laporan_kendaraan' => $laporanKendaraan
        ]);
    }

    public function laporanMotor()
    {
        $laporanMotor = PenjualanMotor::all();
        
        return response()->json([
            'laporan_motor' => $laporanMotor
        ]);
    }

    public function laporanMobil()
    {
        $laporanMobil = PenjualanMobil::all();
        
        return response()->json([
            'laporan_mobil' => $laporanMobil
        ]);
    }
    
}
