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
        foreach ($this->meses as $mes) {
            $sheets[] = new FechasExport($mes, $this->año);
        }
        return $sheets;
    }
}
