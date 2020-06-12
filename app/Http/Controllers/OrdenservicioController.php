<?php

namespace App\Http\Controllers;

use App\ordenservicio;
use Illuminate\Http\Request;

class OrdenservicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ordenservicio  $ordenservicio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('servicio.ordenservicio');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ordenservicio  $ordenservicio
     * @return \Illuminate\Http\Response
     */
    public function edit(ordenservicio $ordenservicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ordenservicio  $ordenservicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ordenservicio $ordenservicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ordenservicio  $ordenservicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(ordenservicio $ordenservicio)
    {
        //
    }
}
