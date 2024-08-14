<?php

use App\Http\Controllers\FechasentregaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Bienvenida');
});
Route::resource('/Fechas', FechasentregaController::class);
Route::controller(FechasentregaController::class)->group(function(){
    Route::get('Fechas/{mes}/mes', 'mes')->name('ver_mes');
    Route::post('Fechas/{mes}/guardar', 'store')->name('guardar_registro');
});
