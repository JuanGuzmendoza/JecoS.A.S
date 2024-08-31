<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    private $trabajos;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->trabajos= [
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
            10=> "admin",
        ];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

       $usuario= Auth::user()->roles->first()->name;
       foreach ($this->trabajos as $t) {
        if ($t==$usuario) {
            return redirect()->route('ver_año_areas', ['mes' => date('m'), 'año' => date('Y')]);
           }
        if($usuario=='admin'){
            return redirect()->route('ver_año', ['mes' => date('m'), 'año' => date('Y')]);
        }

       }
        return 'no tienes rol ';

    }
}
