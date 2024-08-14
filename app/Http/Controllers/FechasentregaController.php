<?php

namespace App\Http\Controllers;

use App\Models\Fechasentrega;
use Illuminate\Http\Request;

class FechasentregaController extends Controller
{

    public function show($mes)
    {
        $Fechas = Fechasentrega::where('mes', '=', $mes)->get();
        return view('Fechas',compact('mes','Fechas'));
    }
    public function index()
    {
        $mes=1;
        $F = Fechasentrega::where('mes', '=', $mes)->get();
        return view('Fechas', ['Fechas' => $F,'mes'=>$mes]);
    }
    public function store(Request $request,$mes)
    {
        $Fecha = Fechasentrega::create(['cliente' => $request->cliente,'mes' => $mes]);
        $Fecha->save();
        $Fechas = Fechasentrega::where('mes', '=', $mes)->get();
        return view('Fechas',compact('mes','Fechas'));
    }
    public function mes($mes)
    {
        $Fechas = Fechasentrega::where('mes', '=', $mes)->get();
        return view('Fechas',compact('mes','Fechas'));
    }
}
