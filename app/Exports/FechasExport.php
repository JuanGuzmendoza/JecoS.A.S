<?php

namespace App\Exports;

use App\Models\Fechasentrega;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class FechasExport implements FromView, WithStyles
{
    private $mes;
    private $año;

    public function __construct($mes, $año)
    {
        $this->mes = $mes;
        $this->año = $año;
    }
    public function view(): View
    {

        return view('export_fechas', [
            'Fechas' =>Fechasentrega::where([['mes', '=', $this->mes],['año', '=', $this->año]])->orderBy('entrega','ASC')->get()
        ,'mes'=>$this->mes,'año'=>$this->año]);
    }

    public function styles(Worksheet $sheet)
    {
        // Estilo para los encabezados
        $sheet->getStyle('A1:S1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $sheet->getStyle('A1:S1')->getFill()->getStartColor()->setARGB('0000FF'); // Azul
        $sheet->getStyle('A1:S1')->getFont()->getColor()->setARGB('FFFFFF'); // Blanco
    }
}
