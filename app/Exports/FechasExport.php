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
    private $indice= [
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
    private $trabajos = [
        0 => "c_tela",
        1 => "cost",
        2 => "c_mad",
        3 => "arm",
        4 => "emparr",
        5 => "c_esp",
        6 => "p_blan",
        7 => "tapic",
        8 => "ensam",
        9 => "despa",
        10 => "nieves",
    ];

    public function __construct($mes, $año)
    {
        $this->mes = $mes;
        $this->año = $año;
    }

    public function view(): View
    {
        $total=0;
        $F=Fechasentrega::where([['mes', '=', $this->indice[$this->mes]], ['año', '=', $this->año]])->orderBy('entrega', 'ASC')->get();
        foreach ($F as $Fechas) {
            $total += $Fechas->cost_total;
        }
        //cambiar la parte de mandar meses y año para solo usar la propia coleccion del modelo de fechas
        return view('export_fechas', [
            'Fechas' => Fechasentrega::where([['mes', '=', $this->indice[$this->mes]], ['año', '=', $this->año]])->orderBy('entrega', 'ASC')->get(),
            'mes' => $this->mes,
            'año' => $this->año,
            'total'=>$total,
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:S' . $sheet->getHighestRow())->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        // Agregar sombreado a la tabla
        $sheet->getStyle('A1:S' . $sheet->getHighestRow())->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $sheet->getStyle('A1:S' . $sheet->getHighestRow())->getFill()->getStartColor()->setARGB('FFFFFF'); // Blanco

        // Agregar sombreado a las celdas pares
        $sheet->getStyle('A2:S' . $sheet->getHighestRow())->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $sheet->getStyle('A2:S' . $sheet->getHighestRow())->getFill()->getStartColor()->setARGB('F2F2F2'); // Gris claro
        // Estilo para los encabezados
        $sheet->getStyle('A1:S1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $sheet->getStyle('A1:S1')->getFill()->getStartColor()->setARGB('0000FF'); // Azul
        $sheet->getStyle('A1:S1')->getFont()->getColor()->setARGB('FFFFFF'); // Blanco
        $Fechas = Fechasentrega::where([['mes', '=', $this->indice[$this->mes]], ['año', '=', $this->año]])->orderBy('entrega', 'ASC')->get();
        $fila = 3; // suponiendo que la primera fila es la de encabezados
        $i = 0;
        $columna=9;
        foreach ($Fechas as $f) {// suponiendo que la columna 2 es la que deseas pintar
            $celda = $sheet->getCellByColumnAndRow($columna, $fila);
            foreach ($this->trabajos as $t) {
                $celda = $sheet->getCellByColumnAndRow($columna, $fila);
                $tt = $t;
                if ($f->$tt >= 70) {
                    $celda->getStyle()->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                    $celda->getStyle()->getFill()->getStartColor()->setARGB('00FF00'); // Verde
                }
                if ($f->$tt >= 25 and $f->$tt < 70) {
                    $celda->getStyle()->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                    $celda->getStyle()->getFill()->getStartColor()->setARGB('FFA07A'); // Naranjoso
                }
                if ($f->$tt < 25 and $f->$tt >0) {
                    $celda->getStyle()->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                    $celda->getStyle()->getFill()->getStartColor()->setARGB('FF0000'); // Rojo

                }
                if($f->$tt == null){
                    $celda->getStyle()->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                    $celda->getStyle()->getFill()->getStartColor()->setARGB('C0C0C0');
                }
                $columna++;
            }
            $columna=9;
            $fila++;
        }

    }
    public function title(): string
    {
        return $this->mes;
    }
}



