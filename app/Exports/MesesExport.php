<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MesesExport implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $meses;
    public function __construct($meses)
    {        $this->meses =$meses;
        return $this;

    }
    public function sheets(): array
    {
        $año=date('Y');
        $sheets=[];
        $indice_mes=0;
        foreach ($this->meses as $mes) {
                $indice_mes++;
            $sheets[]=new FechasExport($mes,$año,$indice_mes);
        }
        return $sheets;
    }
}
