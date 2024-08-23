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
    private $año;
    public function __construct($meses, $año)
    {
        $this->meses = $meses;
        $this->año = $año;

    }
    public function sheets(): array
    {
        $sheets = [];
        $indice_mes = 0;
        foreach ($this->meses as $mes) {
            $indice_mes++;
            $sheets[] = new FechasExport($mes, $this->año, $indice_mes);
        }
        return $sheets;
    }
}
