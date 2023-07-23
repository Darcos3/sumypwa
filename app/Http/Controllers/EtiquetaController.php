<?php

namespace App\Http\Controllers;

use App\Models\Etiqueta;
use Illuminate\Http\Request;

class EtiquetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etiquetas = Etiqueta::paginate(15);
        return view('backend.etiquetas.index', compact('etiquetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('backend.etiquetas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Etiqueta::create([
            'nombre' => $request['nombre'],
            'slug' => \Str::of($request['slug'] ?: $request['nombre'])->slug('-'),
            'activa' => isset($request['activa']) ? 1 : 0,
            'imagen' => $request["imagen"]
        ]);
        return redirect('/etiquetas')->with('status', ['success', 'bx bx-check-circle', "La etiqueta ha sido creada con éxito"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */
    public function show($etiquetas)
    {
        $etiquetas = explode('/', $etiquetas);
        $etiquetasSlug = array_shift($etiquetas);
        $etiqueta_ = Etiqueta::select('id')->where('slug',$etiquetasSlug)->first();
        
        $etiqueta = Etiqueta::find($etiqueta_->id);

        $productos = $etiqueta->productos;

        return view('frontend.etiquetas.show', compact('etiqueta', 'productos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */
    public function edit(Etiqueta $etiqueta)
    {
        return view('backend.etiquetas.edit', compact('etiqueta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etiqueta $etiqueta)
    {
        $etiqueta->fill([
            'nombre' => $request['nombre'],
            'slug' => \Str::of($request['slug'] ?: $request['nombre'])->slug('-'),
            'activa' => isset($request['activa']) ? 1 : 0,
            'imagen' => $request["imagen"]
        ])->save();

        if ($request["imagenBorrar"]) {
            $etiqueta->imagen = 'sin-imagen.png';
        }

        if($etiqueta->activa == 0){
            // Para eliminar la etiqueta a los productos vinculados
            if(count($etiqueta->productos) > 0){
                $productos = $etiqueta->productos()->detach();
            }
            elseif(count($etiqueta->combos) > 0){
                $productos = $etiqueta->combos()->detach();
            }
            else {
                
            }
        }

        return redirect('/etiquetas')->with('status', ['success', 'bx bx-check-circle', "La etiqueta ha sido editada con éxito"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etiqueta $etiqueta)
    {
        //
    }

    public function uploadImage(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('storage/etiquetas/original'),$imageName);
        return response()->json(["status" => "success", "data" => $imageName]);
    }

    public function deleteImage(Request $request)
    {
        $image = $request->file('filename');
        $filename =  $request->get('filename');
        $path = public_path().'/storage/etiquetas/original/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }
}
