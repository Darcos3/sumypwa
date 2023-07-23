<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DireccionController extends Controller
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
        Direccion::create([
            'tipo' => $request['nombre_direccion'],
            'user_id' => auth()->user()->id,
            'nombres' => $request['nombre_facturacion'],
            'apellidos' => $request['apellido_facturacion'],
            'nombre_empresa' => $request['nombre_empresa_facturacion'],
            'direccion' => $request['direccion_facturacion'],
            'documento' => $request['numero_identificacion_facturacion'],
            'email' => $request['email_facturacion'],
            'telefono' => $request['telefono_facturacion'],
            'ciudad_id' => $request['ciudad_id_facturacion'],
            'comentario' => $request['direccion_adicional_facturacion'],
        ]);

        return redirect('/direcciones')->with('status', ['success', "La dirección ha sido creada con éxito"]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function show(Direccion $direccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Direccion $direccion)
    {
        $departamentos = \App\Models\Departamento::all();
        $ciudades = \App\Models\Ciudad::all();

        return view('frontend.direcciones.edit', compact('direccion', 'departamentos', 'ciudades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Direccion $direccion)
    {
        //
        $direccion->fill([
            'user_id' => auth()->user()->id,
            'nombres' => $request['nombres'],
            'apellidos' => $request['apellidos'],
            'nombre_empresa' => $request['nombre_empresa'],
            'direccion' => $request['direccion'],
            'documento' => $request['documento'],
            'email' => $request['email'],
            'telefono' => $request['telefono'],
            'ciudad_id' => $request['ciudad_id'],
            'comentario' => $request['comentario'],
            'tipo' => $request['tipo']
        ]);
        $direccion->save();

        return redirect('/direcciones')->with('status', ['success', "La dirección ha sido editada con éxito"]);
    }

    public function cargar(Direccion $direccion)
    {
        return array_merge(
            $direccion->toArray(),
            [
                'departamento_id' => $direccion->ciudad->departamento_id,
                'ciudades' => $direccion->ciudad->departamento->ciudades
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \App\Models\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Direccion $direccion)
    {
        $direccion->delete();

        return redirect('/direcciones')->with('success', 'Direccion Eliminada.');
    }
}
