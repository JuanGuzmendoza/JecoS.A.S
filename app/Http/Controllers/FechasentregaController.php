<?php

namespace App\Http\Controllers;

use App\Models\Fechasentrega;
use Illuminate\Http\Request;

class FechasentregaController extends Controller
{

    public function show($mes)
    {
        $F = Fechasentrega::all();
        return view('Fechas', ['Fechas' => $F]);
    }
    public function index($id)
    {
        $F = Fechasentrega::all();
        return view('Fechas', ['Fechas' => $F]);
    }
    public function store(Request $request,$mes)
    {
        $Fecha = Fechasentrega::create(['cliente' => $request->cliente,'mes' => $mes]);
        $Fecha->save();
        switch ($mes) {
            case '1':
                $Fechas = Fechasentrega::where('mes', '=', $mes)->get();
                break;
            case '2':
                $Fechas = Fechasentrega::where('mes', '=', $mes)->get();
                break;
            case '3':
                $Fechas = Fechasentrega::where('mes', '=', $mes)->get();
                break;
            case '4':
                $Fechas = Fechasentrega::where('mes', '=', $mes)->get();
                break;
            case '5':
                $Fechas = Fechasentrega::where('mes', '=', $mes)->get();
                break;
        }
        return view('Fechas',compact('mes','Fechas'));
    }
    public function mes($mes)
    {
        switch ($mes) {
            case '1':
                $Fechas = Fechasentrega::where('mes', '=', $mes)->get();
                break;
            case '2':
                $Fechas = Fechasentrega::where('mes', '=', $mes)->get();
                break;
            case '3':
                $Fechas = Fechasentrega::where('mes', '=', $mes)->get();
                break;
            case '4':
                $Fechas = Fechasentrega::where('mes', '=', $mes)->get();
                break;
            case '5':
                $Fechas = Fechasentrega::where('mes', '=', $mes)->get();
                break;
        }
        return view('Fechas',compact('mes','Fechas'));
    }
}
