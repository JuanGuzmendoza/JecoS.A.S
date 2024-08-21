<?php

namespace App\Imports;

use App\Models\Fechasentrega;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataImport implements ToCollection,WithHeadingRow
{

    public function collection(Collection $rows)
    {
        unset($rows[0]);
        unset($rows[1]);
        $mes = date('m');
        $año = date('Y');
        $año2 = date('Y');
        $año3 = date('Y');
        $mes2=$mes+1;
        $mes3=$mes+2;
      if ($mes == 11) {
            $mes3=1;
            $año3++;
       }
      if($mes >=12){
            $mes2=1;
            $año2++;
            $mes3=2;
            $año3++;
       }

             foreach($rows as $row) {
            Fechasentrega::create( [
               'cliente'=>$row[0],
               'codigo'=>$row[1],
               'nombre'=>$row[2],
               'cant'=>$row[3],
               'mes'=>$mes,
               'año'=>$año
            ]);
            Fechasentrega::create( [
                'cliente'=>$row[0],
                'codigo'=>$row[1],
                'nombre'=>$row[2],
                'cant'=>$row[4],
                'mes'=>$mes2,
                'año'=>$año2
             ]);
             Fechasentrega::create( [
                'cliente'=>$row[0],
                'codigo'=>$row[1],
                'nombre'=>$row[2],
                'cant'=>$row[5],
                'mes'=>$mes3,
                'año'=>$año3
             ]);
           }
    }
}
