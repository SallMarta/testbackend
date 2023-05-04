<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Motor;
use Illuminate\Http\Request;
use App\Models\Kendaraan;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraan = Kendaraan::with('motor', 'mobil')->get();
        return response()->json($kendaraan);
    }
    
    public function show($id)
    {
        $kendaraan = Kendaraan::with('motor', 'mobil')->find($id);
        return response()->json($kendaraan);
    }
    
    public function store(Request $request)
    {   
        $kendaraan = new Kendaraan();
        $kendaraan->nama = $request->input('nama');
        $kendaraan->tahun = $request->input('tahun');
        $kendaraan->warna = $request->input('warna');
        $kendaraan->harga = $request->input('harga');
        $kendaraan->stok = $request->input('stok');
        $kendaraan->save();
        
        if ($request->filled('mesin_motor') && $request->filled('suspensi_motor') && $request->filled('transmisi_motor')) {
            $motor = new Motor;
            $motor->mesin_motor = $request->input('mesin_motor');
            $motor->suspensi_motor = $request->input('suspensi_motor');
            $motor->transmisi_motor = $request->input('transmisi_motor');
            $motor->save();
            $kendaraan->jeniskendaraan()->save($motor);
        }
        
        if ($request->filled('mesin_mobil') && $request->filled('kapasitas_mobil') && $request->filled('tipe_mobil')) {
            $mobil = new Mobil;
            $mobil->mesin_mobil = $request->input('mesin_mobil');
            $mobil->kapasitas_mobil = $request->input('kapasitas_mobil');
            $mobil->tipe_mobil = $request->input('tipe_mobil');
            $mobil->save();
            $kendaraan->jeniskendaraan()->save($mobil);
        }  
        
        return response()->json([
            'message' => 'Kendaraan berhasil ditambah.',
            'data' => $kendaraan,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $motor = new Motor;
        $motor->mesin_motor = $request->mesin_motor;
        $motor->suspensi_motor = $request->suspensi_motor;
        $motor->transmisi_motor = $request->transmisi_motor;
        $motor->motor_id = $request->input('motor_id');
        $motor->save();
        
        $mobil = new Mobil;
        $mobil->mesin_mobil = $request->mesin_mobil;
        $mobil->kapasitas_mobil = $request->kapasitas_mobil;
        $mobil->tipe_mobil = $request->tipe_mobil;
        $mobil->mobil_id = $request->input('mobil_id');
        $mobil->save();
        
        $kendaraan = new Kendaraan();
        $kendaraan->nama = $request->input('nama');
        $kendaraan->tahun = $request->input('tahun');
        $kendaraan->warna = $request->input('warna');
        $kendaraan->harga = $request->input('harga');
        $kendaraan->stok = $request->input('stok');
        $kendaraan->save();
        return response()->json($kendaraan);
    }
    
    public function destroy($id)
    {
        $kendaraan = Kendaraan::find($id);
        $kendaraan->delete();
        return response()->json(['message' => 'Kendaraan berhasil dihapus']);
    }
}