<?php

namespace App\Http\Controllers;

use App\Models\Fechasentrega;
use Illuminate\Http\Request;

class FechasentregaController extends Controller
{
    public function ver_año($mes, $año)
    {
        $F = Fechasentrega::where([['mes', '=', $mes], ['año', '=', $año]])->orderBy('entrega', 'ASC')->get();
        $total = 0;

        foreach ($F as $Fechas) {
            $total += $Fechas->cost_total;
        }
        return view('Fechas', ['Fechas' => $F, 'mes' => $mes, 'año' => $año, 'total' => $total]);
    }
    public function index()
    {
        $mes = 1;
        $F = Fechasentrega::where('mes', '=', $mes)->get();
        return view('Fechas', ['Fechas' => $F, 'mes' => $mes,'']);
    }
    public function store(Request $request, $mes, $año)
    {
        $Fecha = Fechasentrega::create(['cliente' => $request->cliente, 'mes' => $mes, 'año' => $año]);
        $Fecha->save();
        return redirect()->route('ver_año', ['mes' => $mes, 'año' => $año]);
    }
    public function mes($mes)
    {
        $Fechas = Fechasentrega::where('mes', '=', $mes)->get();
        return view('Fechas', compact('mes', 'Fechas'));
    }
    public function update(Request $request, $mes, $año)
    {
        $FM = $request->Fechas;
        foreach ($FM as $fm) {

            $cost_total = $fm[7] * $fm[6];
            $F = Fechasentrega::find($fm[0]);
            $F->update([
                'entrega' => $fm[1],
                'cant' => $fm[6],
                'cost_unit' => $fm[7],
                'cost_total' => $cost_total,
                'c_tela' =>  $fm[8],
                'cost' =>  $fm[9],
                'c_mad' => $fm[10],
                'arm' =>  $fm[11],
                'emparr' =>  $fm[12],
                'c_esp' =>  $fm[13],
                'p_blan' =>  $fm[14],
                'tapic' =>  $fm[15],
                'ensam' =>  $fm[16],
                'despa' =>  $fm[17],
                'nieves' =>  $fm[18],
            ]);
        }
        return redirect()->route('ver_año', ['mes' => $mes, 'año' => $año]);
    }
}
