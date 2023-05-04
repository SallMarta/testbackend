<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KendaraanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    
    'middleware' => 'api',
    'prefix' => 'auth',
    
],

function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->name('refresh');
    Route::post('/me', [AuthController::class, 'me'])->name('me');

    Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('index');
    Route::get('/kendaraan/{id}', [KendaraanController::class, 'show'])->name('show');
    Route::post('/kendaraan', [KendaraanController::class, 'store'])->name('store');
    Route::put('/kendaraan{id}', [KendaraanController::class, 'update'])->name('update');
    Route::delete('/kendaraan/{id}', [KendaraanController::class, 'delete'])->name('delete');
});
