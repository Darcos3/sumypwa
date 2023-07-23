<?php

namespace App\Http\Controllers;

use App\Models\Atributo;
use Illuminate\Http\Request;

class AtributoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atributos = Atributo::paginate(15);
        return view('backend.atributos.index', compact('atributos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.atributos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $atributo = Atributo::create([
            'nombre' => $request['nombre'],
            'slug' => \Str::of($request['nombre'])->slug('-'),
        ]);

        foreach ($request['terminos'] as $key => $termino) {

            $imagen = 'generica.png';
            if (!empty($request['imagen_terminos'][$key])) {
                $imagen = $request['imagen_terminos'][$key]->hashName();
                $request['imagen_terminos'][$key]->storeAs('public/terminos', $imagen);
            }

            \App\Models\Termino::create(['nombre' => $termino, 'imagen' => $imagen, 'atributo_id' => $atributo->id]);
        }

        return redirect('/atributos')->with('status', ['success', 'bx bx-check-circle', "La categoría ha sido creada con éxito"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Atributo  $atributo
     * @return \Illuminate\Http\Response
     */
    public function show($nombre)
    {
        $atributos = explode('/', $nombre);
        $atributosSlug = ucfirst(array_shift($atributos));
        $atributo_ = \App\Models\Termino::select('id')->where('nombre', $atributosSlug)->first();
        $idatributo = $atributo_['id'];
        $atributo = \App\Models\Termino::find($idatributo);
        
        $tipoatributo = \App\Models\Atributo::select('nombre')->where('id', $atributo['atributo_id'])->first();
        // dd($atributo->terminos);
        return view('frontend.atributos.show', compact('atributo', 'tipoatributo'));
    }

    public function marcas()
    {
        $marcas = Atributo::where('nombre','Marcas')->first();

        return view('frontend.atributos.marcas', compact('marcas'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Atributo  $atributo
     * @return \Illuminate\Http\Response
     */
    public function edit(Atributo $atributo)
    {
        return view('backend.atributos.edit', compact('atributo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Atributo  $atributo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Atributo $atributo)
    {
        // dd($atributo);

        $atributo->fill([
            'nombre' => $request['nombre'],
            'slug' => \Str::of($request['slug'])->slug('-'),
        ])->save();

        if (isset($request['eliminar_terminos'])) {
            foreach ($request['eliminar_terminos'] as $id) {
                $termino = \App\Models\Termino::find($id);
                $termino->delete();
            }
        }

        if (isset($request['terminos_actual'])) {
            foreach ($request['terminos_actual'] as $id => $nombre) {

                // dd($nombre);

                $termino = \App\Models\Termino::find($id);
                // $termino->nombre = $nombre;
                $termino->fill([
                    'nombre' => $nombre,
                ])->save();

                if (isset($request['eliminar_imagen_actual'][$id])) {
                    $termino->imagen = 'generica.png';
                }
                
                if (isset($request['imagen_actual'][$id])) {
                    $imagen = $request['imagen_actual'][$id]->hashName();
                    $request['imagen_actual'][$id]->storeAs('public/terminos', $imagen);
                    $termino->imagen = $imagen;
                }

                $termino->save();
            }
        }

        if (isset($request['terminos'])) {
            foreach ($request['terminos'] as $key => $termino) {

                $imagen = 'generica.png';
                if (!empty($request['imagen_terminos'][$key])) {
                    $imagen = $request['imagen_terminos'][$key]->hashName();
                    $request['imagen_terminos'][$key]->storeAs('public/terminos', $imagen);
                }
                \App\Models\Termino::create(['nombre' => $termino, 'imagen' => $imagen, 'atributo_id' => $atributo->id]);
            }
        }


        return redirect('/atributos')->with('status', ['success', 'bx bx-check-circle', "El atributo".$request['nombre']." ha sido actualizado con éxito"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Atributo  $atributo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Atributo $atributo)
    {
        //
    }

    public function cargar(Atributo $atributo)
    {
        return ['data' => $atributo->load('terminos')];
    }
}
