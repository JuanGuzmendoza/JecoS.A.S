<?php

use App\Http\Controllers\ExcelController;
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
// Route::get('/', function () {
//     return view('Bienvenida');
// });
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/Fechas', FechasentregaController::class);
    Route::controller(FechasentregaController::class)->group(function(){
        Route::post('/Fechas/{mes}/{año}/guardar', 'store')->name('guardar_registro');
        Route::get('/Fechas/{mes}/{año}/actualizar', 'update')->name('actualizar_registros');
        Route::get('/Fechas/{mes}/{año}/{area}/actualizar_area', 'update_area')->name('actualizar_registros_area');
        Route::get('/Fechas/Admin/{mes}/{año}', 'ver_año')->name('ver_año');
        Route::get('/Fechas/Area/{mes}/{año}', 'ver_año_areas')->name('ver_año_areas');
    });

    Route::controller(ExcelController::class)->group(function(){
        Route::post('/Excel', 'import')->name('importar');
        Route::get('/Excel/export/{mes}/{año}', 'export')->name('exportar');
    });
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
