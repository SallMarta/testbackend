<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;

class MobilController extends Controller
{
    public function index()
    {
        $mobil = Mobil::all();
        return response()->json($mobil);
    }
}