<?php

namespace App\Http\Controllers;

use App\Models\Fechasentrega;
use Illuminate\Http\Request;

class FechasentregaController extends Controller
{
   public function ver_año($mes,$año){
    $F = Fechasentrega::where([['mes', '=', $mes],['año', '=', $año]])->orderBy('entrega','ASC')->get();
    $total=0;
    foreach ($F as $Fechas) {
        $total+=$Fechas->cost_total;
    }
    return view('Fechas', ['Fechas' => $F,'mes'=>$mes,'año'=>$año,'total'=>$total]);
   }
    public function index()
    {
        $mes=1;
        $F = Fechasentrega::where('mes', '=', $mes)->get();
        return view('Fechas', ['Fechas' => $F,'mes'=>$mes]);
    }
    public function store(Request $request,$mes,$año)
    {
        $Fecha = Fechasentrega::create(['cliente' => $request->cliente,'mes' => $mes,'año'=>$año]);
        $Fecha->save();
        return redirect()->route('ver_año',['mes'=>$mes,'año'=>$año]);
    }
    public function mes($mes)
    {
        $Fechas = Fechasentrega::where('mes', '=', $mes)->get();
        return view('Fechas',compact('mes','Fechas'));
    }
    public function update(Request $request,$id)
    {

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
        return redirect()->route('ver_año',['mes'=>$F->mes,'año'=>$F->año]);
    }
}
