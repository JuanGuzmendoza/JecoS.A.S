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
        return redirect()->route('Fechas.show',$mes);
    }
    public function mes($mes)
    {
        $Fechas = Fechasentrega::where('mes', '=', $mes)->get();
        return view('Fechas',compact('mes','Fechas'));
    }
    public function update(Request $request,$id)
    {
        // $request->validate([
        //     'documento'=>'required|max:225',
        //     'nombre'=>'required|max:225',
        //     'apellido'=>'required|max:225',
        //     'correo'=>'required|max:225',
        //     'telefono'=>'required|max:225',
        //     'ficha_id'=>'required',
        // ]);
        $F= Fechasentrega::find($id);
        $cost_total=$request->cant*$request->cost_unit;
        $F->update([
            // 'cliente' => $request->documento,
            'entrega' => $request->entrega,
            // 'oc' => $request->apellido,
            // 'codigo' => $request->correo,
            // 'nombre' => $request->telefono,
            'cant' => $request->cant,
            'cost_unit' => $request->cost_unit,
            'cost_total' => $cost_total,
            'c_tela' => $request->c_tela,
            'cost' => $request->cost,
            'c_mad' => $request->c_mad,
            'arm' => $request->arm,
            'emparr' => $request->emparr,
            'c_esp' => $request->c_esp,
            'p_blan' => $request->p_blan,
            'tapic' => $request->tapic,
            'ensam' => $request->ensam,
            'despa' => $request->despa,
            'nieves' => $request->nieves,

        ]);
        return redirect()->route('Fechas.show',$F->mes);
    }
}
