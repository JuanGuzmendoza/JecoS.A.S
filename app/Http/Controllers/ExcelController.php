<?php

namespace App\Http\Controllers;

use App\Exports\MesesExport;
use App\Exports\FechasExport;
use App\Models\Fechasentrega;
use Illuminate\Http\Request;
use  App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{

    public function form()
    {
        return view('formulario');
    }
    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new DataImport, $file);//pasa el archivo para el controlador de Dataimport
        $mes = date('m');
        $año = date('Y');
        return redirect()->route('ver_año', ['mes' => $mes, 'año' => $año]);
    }

    public function export(Request $r, $mes, $año)
    {
        $fileName = 'fechas' . $año . '.xlsx';
        return Excel::download(new MesesExport($r->meses,$año),$fileName);
    }
}

