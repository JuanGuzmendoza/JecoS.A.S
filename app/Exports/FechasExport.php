<?php

namespace App\Exports;

use App\Models\Fechasentrega;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class FechasExport implements FromView, WithStyles
{
    public function view(): View
    {
        return view('export_fechas', [
            'Fechas' => Fechasentrega::all()
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        // Estilo para los encabezados
        $sheet->getStyle('A1:S1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $sheet->getStyle('A1:S1')->getFill()->getStartColor()->setARGB('0000FF'); // Azul
        $sheet->getStyle('A1:S1')->getFont()->getColor()->setARGB('FFFFFF'); // Blanco
    }
}
