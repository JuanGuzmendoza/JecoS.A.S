<?php

namespace App\Http\Controllers;

use App\Models\Fechasentrega;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\portafolio_productos;
use Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\DB;
class FechasentregaController extends Controller
{
    public $total=0;
    public function Modelo_fecha($mes, $año)
    {
        $Fecha_modelo = Fechasentrega::query()->where([['mes', '=', $mes], ['año', '=', $año]])->orderBy('entrega', 'ASC')->get();
        return $Fecha_modelo;
    }

    public function ver_año($mes, $año)
    {
        $F = $this->Modelo_fecha($mes, $año);
        $P = portafolio_productos::query()->select('*')->get();
        foreach ($F as $Fechas) {
            $this->total += $Fechas->cost_total;
        }
        $F->sum('cost_total');
        $Entregados = Fechasentrega::query()
            ->where('mes', $mes)
            ->where('año', $año)
            ->where('estado', 1)
            ->count();
        return view('Fechas', ['Portafolio' => $P, 'Fechas' => $F, 'mes' => $mes, 'año' => $año, 'total' => $this->total, 'Entregados' => $Entregados]);
    }
    public function index() {}
    public function store(Request $request, $mes, $año)
    {
        $Fecha_registro = Fechasentrega::create(['cliente' => $request->cliente, 'mes' => $mes, 'año' => $año]);
        $Fecha_registro->save();
        return redirect()->route('ver_año', ['mes' => $mes, 'año' => $año]);
    }
    public function mes($mes)
    {
        $Fechas = Fechasentrega::where('mes', '=', $mes)->get();
        return view('Fechas', compact('mes', 'Fechas'));
    }


    public function update(Request $request, $mes, $año)
    {//uso de transaction con funcion anonima 
        $Fechas_matric_admin = $request->Fechas;
        // $startTime = microtime(true);
        DB::transaction(function () use ($Fechas_matric_admin) {
            foreach ($Fechas_matric_admin as $fm) {
                $c_u = (float) str_replace(array('.', ','), '', $fm[7]);
                $cost_total =  $c_u * $fm[6];
                $estado = 0;
                $estado = isset($fm[19]) && $fm[19];
        
                $data = [
                    'entrega' => $fm[1],
                    'oc' => $fm[2],
                    'codigo' => $fm[3],
                    'nombre' => $fm[4],
                    'cant' => $fm[6],
                    'cost_unit' => $c_u,
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
                    'estado' =>  $estado,
                ];
        
                Fechasentrega::where('id', $fm[0])->update($data);
            }
     
        });
    //     $endTime = microtime(true);
    //     $timeTaken = $endTime - $startTime;
    //     $tiempoDeEjecucion = "El tiempo de ejecución fue de " . number_format($timeTaken, 4) . " segundos";
    //    dd($tiempoDeEjecucion);
        return redirect()->route('ver_año', ['mes' => $mes, 'año' => $año,]);
    }

    //PASAR CODIGO A OTRO CONTROLADOR Y REFACTORIZAR EL WEB
    public function update_area(Request $request, $mes, $año, $area)
    {
        //Refactorizacion del codigo con funcion de js guardando en la matric solo las filas cambiadas

        $Fechas_matric_area = $request->Fechas;
        foreach ($Fechas_matric_area as $fm) {
            $F = Fechasentrega::where('id',$fm[0])->update([
                $area =>  $fm[7],
            ]);
        }
        return redirect()->route('ver_año_areas', ['mes' => $mes, 'año' => $año]);
    }

    public function ver_año_areas($mes, $año)
    {
        $Fechas_entrega_asc=$this->Modelo_fecha($mes,$año);
        return view('FechaTrabajos', ['Fechas' => $Fechas_entrega_asc, 'mes' => $mes, 'año' => $año, ]);
    }
    public function destroy($mes, $año, $id)
    {
        $F = Fechasentrega::find($id);
        $F->delete();
        return redirect()->route('ver_año', ['mes' => $mes, 'año' => $año]);
    }
}
