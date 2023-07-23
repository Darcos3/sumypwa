<?php

namespace App\Http\Controllers;

use App\Models\Combo;
use Illuminate\Http\Request;

use Image;

class ComboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $combos = Combo::paginate(150);
        return view('backend.combos.index', compact('combos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etiquetas = \App\Models\Etiqueta::where('activa',1)->get();
        $atributos = \App\Models\Atributo::where('activo',1)->get();
        $categorias = \App\Models\Categoria::whereNull('categoria_id')->where('id','>',1)->get();
        $productos = \App\Models\Producto::where('activo',1)->get();

        return view('backend.combos.create', compact('categorias','etiquetas', 'atributos', 'productos'));
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
        $combo = Combo::create([
            'nombre' => $request['nombre'],
            'slug' => \Str::of($request['nombre'])->slug('-'),
            'precio' => $request['precio'],
            'precio_descuento' => $request['precio_descuento'],
            'precio_ferretero' => $request['precio_ferretero'],
            'sku' => $request['sku'],
            'descripcion_corta' => $request['descripcion_corta'],
            'descripcion' => $request['descripcion'],
            'especificaciones' => $request['especificaciones'],
            'categoria_id' => $request['categoria_principal'],
            'imagen' => $request['imagen'],
        ]);

        if ($request['imagen']) {
            $img = Image::make('storage/imagenes_producto/original/' . $request['imagen']);
            $img->resize(700, 700);
            $img->save('storage/imagenes_producto/700x700/' . $request['imagen']);
            $img->resize(212, 212);
            $img->save('storage/imagenes_producto/212x212/' . $request['imagen']);
            $img->resize(75, 75);
            $img->save('storage/imagenes_producto/75x75/' . $request['imagen']);
        }

        if (!empty($request['categorias'])) {
            if (!in_array($request['categoria_principal'], $request['categorias'])) {
                $combo->categorias()->sync(array_merge([$request['categoria_principal']], $request['categorias']));
            } else {
                $combo->categorias()->sync($request['categorias']);
            }
        }

        if (!empty($request['etiquetas'])) {
            $combo->etiquetas()->attach($request['etiquetas']);
        }

        if (!empty($request['productos'])) {
            $combo->productos()->attach($request['productos']);
        }

        return redirect('/combos')->with('status', ['success', 'bx bx-check-circle', "El combo se ha creado con éxito"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Combo  $combo
     * @return \Illuminate\Http\Response
     */
    public function show(Combo $combo)
    {
        return view('frontend.combos.show', compact('combo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Combo  $combo
     * @return \Illuminate\Http\Response
     */
    public function edit(Combo $combo)
    {
        $etiquetas = \App\Models\Etiqueta::where('activa',1)->get();
        $atributos = \App\Models\Atributo::where('activo',1)->get();
        $categorias = \App\Models\Categoria::whereNull('categoria_id')->where('id','>',1)->get();
        $productos = \App\Models\Producto::where('activo',1)->get();

        return view('backend.combos.edit', compact('combo','categorias','etiquetas', 'atributos', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Combo  $combo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Combo $combo)
    {
        $combo->fill([
            'nombre' => $request['nombre'],
            'slug' => \Str::of($request['nombre'])->slug('-'),
            'precio' => $request['precio'],
            'precio_descuento' => $request['precio_descuento'],
            'precio_ferretero' => $request['precio_ferretero'],
            'sku' => $request['sku'],
            'descripcion_corta' => $request['descripcion_corta'],
            'descripcion' => $request['descripcion'],
            'especificaciones' => $request['especificaciones'],
            'categoria_id' => $request['categoria_principal'],
            'imagen' => $request['imagen'],
        ]);

        $combo->categorias()->detach();
        if (!empty($request['categorias'])) {
            if (!in_array($request['categoria_principal'], $request['categorias'])) {
                $combo->categorias()->sync(array_merge([$request['categoria_principal']], $request['categorias']));
            } else {
                $combo->categorias()->sync($request['categorias']);
            }
        }

        $combo->etiquetas()->detach();
        if (!empty($request['etiquetas'])) {
            $combo->etiquetas()->attach($request['etiquetas']);
        }

        $combo->productos()->detach();
        if (!empty($request['productos'])) {
            $combo->productos()->attach($request['productos']);
        }

        $combo->save();
        return redirect('/combos')->with('status', ['success', 'bx bx-check-circle', "El combo se ha modificado con éxito"]);
    }

    public function datosModal(Combo $combo)
    {
        return ['nombre' => $combo->nombre, 'imagen' => $combo->imagen, 'cantidad' => 1 ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Combo  $combo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Combo $combo)
    {
        //
    }
}
