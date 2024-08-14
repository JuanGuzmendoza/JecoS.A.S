<?php

namespace App\Http\Controllers;

use App\Models\Fechasentrega;
use Illuminate\Http\Request;

class FechasentregaController extends Controller
{

    // function show()
    // {
    //     $F=Fechasentrega::all();
    //     return view('Fechas', ['Fechas' => $F]);
    // }
    function index()
    {
        $F=Fechasentrega::all();
        return view('Fechas', ['Fechas' => $F]);
    }
    function store(Request $request)
    {
        $Fecha = Fechasentrega::create(['cliente'=>$request->cliente]);
        $Fecha->save();
         return redirect('Fechas');
    }
}
