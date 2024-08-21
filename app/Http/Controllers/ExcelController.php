<?php

namespace App\Http\Controllers;

use App\Models\Fechasentrega;
use Illuminate\Http\Request;
use  App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;
class ExcelController extends Controller
{

 public function form(){

   return view('formulario');
 }
 public function import(Request $request){
    // dd('imp');
     $file =$request->file('file');
     Excel::import(new DataImport ,$file);
     $mes=date('m');
     $año=date('Y');
     return redirect()->route('ver_año',['mes'=>$mes,'año'=>$año]);
 }


}
