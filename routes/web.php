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
// Route::get('/user', [UserController::class, 'index']);
Route::get('/', function () {
    return view('Bienvenida');
});
Route::resource('/Fechas', FechasentregaController::class);
Route::controller(FechasentregaController::class)->group(function(){
    Route::post('/Fechas/{mes}/{año}/guardar', 'store')->name('guardar_registro');
    Route::get('/Fechas/{mes}/{año}', 'ver_año')->name('ver_año');
});
