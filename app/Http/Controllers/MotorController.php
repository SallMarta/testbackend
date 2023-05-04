<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motor;

class MotorController extends Controller
{
    public function index()
    {
        $motor = Motor::all();
        return response()->json($motor);
    }
}