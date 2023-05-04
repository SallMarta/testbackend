<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Mobil;
use App\Models\Motor;
use App\Models\PenjualanKendaraan;
use Illuminate\Http\Request;

class PenjualanKendaraanController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        //
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        //
    }
    
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
        
        $mobil = Mobil::where('id_kendaraan', $id)->first();
        if ($mobil) {
            $mobil->stok -= 1;
            $mobil->save();
        }
        
        $motor = Motor::where('id_kendaraan', $id)->first();
        if ($motor) {
            $motor->stok -= 1;
            $motor->save();
        }
        
        return response()->json(['message' => 'Kendaraan terjual.']);
    }
    
}
