<?php

namespace App\Exports;

use App\Models\Fechasentrega;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Carbon\Carbon;

class FechasExport implements FromView, WithStyles, WithTitle
{
    private $mes;
    private $año;
    private $indice_mes;
    public function __construct($mes, $año, $indice_mes)
    {
        $this->indice_mes = $indice_mes;
        $this->mes = $mes;
        $this->año = $año;
    }

    public function view(): View
    {
        $indice = [
            "enero" => 1,
            "febrero" => 2,
            "marzo" => 3,
            "abril" => 4,
            "mayo" => 5,
            "junio" => 6,
            "julio" => 7,
            "agosto" => 8,
            "septiembre" => 9,
            "octubre" => 10,
            "noviembre" => 11,
            "diciembre" => 12,
        ];


        //cambiar la parte de mandar meses y año para solo usar la propia coleccion del modelo de fechas
        return view('export_fechas', [
            'Fechas' => Fechasentrega::where([['mes', '=',$indice[$this->mes]], ['año', '=', $this->año]])->orderBy('entrega', 'ASC')->get(),
            'mes' => $this->mes,
            'año' => $this->año
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        // Estilo para los encabezados
        $sheet->getStyle('A1:S1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $sheet->getStyle('A1:S1')->getFill()->getStartColor()->setARGB('0000FF'); // Azul
        $sheet->getStyle('A1:S1')->getFont()->getColor()->setARGB('FFFFFF'); // Blanco
    }
    public function title(): string
    {
        return $this->mes;
    }
}
