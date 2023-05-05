<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Motor;
use Illuminate\Http\Request;
use App\Models\Kendaraan;
use Illuminate\Support\Facades\DB;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraan = Kendaraan::get();
        if (!$kendaraan) {
            return response()->json(['message' => 'Kendaraan tidak ada.'], 404);
        }
        return response()->json($kendaraan);
    }
    
    public function detail($id)
    {
        $kendaraan = Kendaraan::find($id);
        if (!$kendaraan) {
            return response()->json(['message' => 'Kendaraan tidak ada.'], 404);
        }
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
            $kendaraan->jenis_kendaraan = 'motor';
            $motor = new Motor;
            $motor->mesin_motor = $request->input('mesin_motor');
            $motor->suspensi_motor = $request->input('suspensi_motor');
            $motor->transmisi_motor = $request->input('transmisi_motor');
            $motor->id_kendaraan = $kendaraan->_id;
            $motor->nama = $kendaraan->nama;
            $motor->tahun = $kendaraan->tahun;
            $motor->warna = $kendaraan->warna;
            $motor->harga = $kendaraan->harga;
            $motor->stok = $kendaraan->stok;
            $motor->jenis_kendaraan = $kendaraan->jenis_kendaraan;
            $motor->save();
            $kendaraan->jeniskendaraan()->save($motor);
        }
        
        if ($request->filled('mesin_mobil') && $request->filled('kapasitas_mobil') && $request->filled('tipe_mobil')) {
            $kendaraan->jenis_kendaraan = 'mobil';
            $mobil = new Mobil;
            $mobil->mesin_mobil = $request->input('mesin_mobil');
            $mobil->kapasitas_mobil = $request->input('kapasitas_mobil');
            $mobil->tipe_mobil = $request->input('tipe_mobil');
            $mobil->id_kendaraan = $kendaraan->_id;
            $mobil->nama = $kendaraan->nama;
            $mobil->tahun = $kendaraan->tahun;
            $mobil->warna = $kendaraan->warna;
            $mobil->harga = $kendaraan->harga;
            $mobil->stok = $kendaraan->stok;
            $mobil->jenis_kendaraan = $kendaraan->jenis_kendaraan;
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
            $motor->nama = $kendaraan->nama;
            $motor->tahun = $kendaraan->tahun;
            $motor->warna = $kendaraan->warna;
            $motor->harga = $kendaraan->harga;
            $motor->stok = $kendaraan->stok;
            $motor->save();
            $kendaraan->jeniskendaraan()->save($motor);
        }
        
        if ($request->filled('mesin_mobil') && $request->filled('kapasitas_mobil') && $request->filled('tipe_mobil')) {
            $mobil = new Mobil;
            $mobil->mesin_mobil = $request->input('mesin_mobil');
            $mobil->kapasitas_mobil = $request->input('kapasitas_mobil');
            $mobil->tipe_mobil = $request->input('tipe_mobil');
            $mobil->nama = $kendaraan->nama;
            $mobil->tahun = $kendaraan->tahun;
            $mobil->warna = $kendaraan->warna;
            $mobil->harga = $kendaraan->harga;
            $mobil->stok = $kendaraan->stok;
            $mobil->save();
            $kendaraan->jeniskendaraan()->save($mobil);
        }
        
        return response()->json($kendaraan);
    }
    
    public function destroy($id)
    {
        $kendaraan = Kendaraan::find($id);
        
        if (!$kendaraan) {
            return response()->json(['message' => 'Kendaraan tidak ada.'], 404);
        }
        
        $mobil = Mobil::where('id_kendaraan', $id)->first();
        if ($mobil) {
            $mobil->delete();
        }
        
        $motor = Motor::where('id_kendaraan', $id)->first();
        if ($motor) {
            $motor->delete();
        }
        
        $kendaraan->delete();
        return response()->json(['message' => 'Kendaraan dihapus.'], 200);
    }
    
    public function stock()
    {
        $motor = Motor::get();
        $stokMotor = $motor->map(function ($kendaraan) {
            return collect($kendaraan->toArray())
            ->only(['stok'])
            ->all();
        });
        
        
        $mobil = Mobil::get();
        $stokMobil = $mobil->map(function ($kendaraan) {
            return collect($kendaraan->toArray())
            ->only(['stok'])
            ->all();
        });
        
        
        return response()->json([
            'stok motor'    => $stokMotor,
            'stok mobil'    => $stokMobil,
        ]);
        
        
    }
    
}