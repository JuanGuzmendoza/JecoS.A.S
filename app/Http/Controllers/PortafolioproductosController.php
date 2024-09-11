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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
