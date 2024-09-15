<?php

namespace App\Http\Controllers;

use App\Models\portafolio_productos;
use Illuminate\Http\Request;
class PortafolioproductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return view('Portafolio_productos');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Producto = portafolio_productos::create();
        $Producto->save();
        session()->put('open_modal', true);
        return redirect()->route('ver_año', ['mes' => date('m') ,'año' => date('Y')]);
    }

    public function store(Request $request)
    {
        $P=$request->Portafolio;
        foreach ($P as $p) {
            $P = portafolio_productos::find($p[0]);
            $P->update([
                'codigo' => $p[1],
                'nombre' => $p[2],
                'cost_unit' => $p[3],
            ]);
        }
        session()->put('open_modal', true);
        return redirect()->route('ver_año', ['mes' => date('m') ,'año' => date('Y')]);
    }
    /**
     * Display the specified resource.
     */
    public function show(portafolio_productos $portafolio_productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(portafolio_productos $portafolio_productos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, portafolio_productos $portafolio_productos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(portafolio_productos $portafolio_productos)
    {
        //
    }
}
