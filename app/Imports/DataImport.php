<?php

namespace App\Imports;

use App\Models\Fechasentrega;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;
use App\Models\portafolio_productos;
class DataImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        //ARREGLAR ERROR DE DICIEMBRE Y FILTRO DE LOS CAMBIOS DE AÑO
        unset($rows[0]);
        $mes_actual = date('m');
        $año_actual= date('Y');
        $cant_meses = -1;
        $meses_excel = [];
        $indice = 0;
        $meses = [
            'ene' => 1,
            'feb' => 2,
            'mar' => 3,
            'abr' => 4,
            'may' => 5,
            'jun' => 6,
            'jul' => 7,
            'ago' => 8,
            'sep' => 9,
            'oct' => 10,
            'nov' => 11,
            'dic' => 12
        ];
        $meses_full = [
            'enero' => 1,
            'febrero' => 2,
            'marzo' => 3,
            'abril' => 4,
            'mayo' => 5,
            'junio' => 6,
            'julio' => 7,
            'agosto' => 8,
            'septiembre' => 9,
            'octubre' => 10,
            'noviembre' => 11,
            'diciembre' => 12
        ];
        for ($i = 0; $i >= -10; $i++) {
            $cant_meses++;
            if (!isset($rows[1][$cant_meses])) {
                break;
            }
            $texto = $rows[1][$cant_meses];
            $pattern = '/\b(?:COMPRA\s+MES\s+DE\s+)?(?:Adicional\s+)?(' . implode('|', array_keys($meses)) . '|' . implode('|', array_keys($meses_full)) . ')\b/iu';
            preg_match($pattern, $texto, $match);
            if ($match) {
                $mes = strtolower($match[1]);
                if (isset($meses[$mes])) {
                    $mesNumero = $meses[$mes];
                } elseif (isset($meses_full[$mes])) {
                    $mesNumero = $meses_full[$mes];
                }
                $fecha = Carbon::createFromDate(null, $mesNumero, 1);
                $meses_excel[$indice] = $fecha->month;
                $indice++;
            }
        }

        $indice = 0;
        $cant_meses -= 2;
        unset($rows[1]);
        foreach ($rows as $row) {
            $i = 3;
            $indice = 0;
            foreach ($meses_excel as $m) {
                if ($m<$mes_actual){
                    $año_actual++;
                }
                if ($row[$i] >= 1) {
                    $Similitud=portafolio_productos::select('oc',
                    'codigo',
                    'nombre',
                    'cost_unit',)->where('codigo','=',$row[1])->get();
                    if($Similitud->isEmpty()){
                        Fechasentrega::create([
                            'cliente' => 'JAMAR',
                            'codigo' => $row[1],
                            'nombre' => $row[2],
                            'cant' => $row[$i],
                            'mes' =>  $m,
                            'año' => $año_actual
                        ]);
                    }else{
                        Fechasentrega::create([
                            'cliente' => 'JAMAR',
                            'codigo' => $row[1],
                            'nombre' => $row[2],
                            'cant' => $row[$i],
                            'cost_unit' => $Similitud[0]->cost_unit,
                            'cost_total' => $Similitud[0]->cost_unit*$row[$i],
                            'mes' =>  $m,
                            'año' => $año_actual
                        ]);
                    }
                }
                $año_actual= date('Y');
                $indice++;
                $i++;
            }
        }
    }
}
