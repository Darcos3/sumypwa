<?php

namespace App\Http\Controllers;

use App\Models\Termino;
use Illuminate\Http\Request;

class TerminoController extends Controller
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
     * @param  \App\Models\Termino  $termino
     * @return \Illuminate\Http\Response
     */
    public function show(Termino $termino)
    {
        return view('frontend.termino.show', compact('termino'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Termino  $termino
     * @return \Illuminate\Http\Response
     */
    public function edit(Termino $termino)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Termino  $termino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Termino $termino)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Termino  $termino
     * @return \Illuminate\Http\Response
     */
    public function destroy(Termino $termino)
    {
        //
    }
}
