<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::paginate(150);
        return view('backend.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slider = Slider::create([
            'nombre' => $request['nombre'],
            'imagen' => $request['imagen'],
            'imagen_movil' => $request['imagen_movil'],
            'enlace' => $request['enlace'],
            // 'boton' => $request['boton'],
            // 'titulo' => $request['titulo'],
            // 'descripcion' => $request['descripcion']
        ]);

        return redirect('/sliders')->with('status', ['success', 'bx bx-check-circle', "El slider ha sido creado con éxito"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        \Debugbar::info($slider);
        return view('backend.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $imagen = str_replace(' ','%20',$request['imagen']);

        if($request['activo'] == null){
            $slider->fill([
                'nombre' => $request['nombre'],
                'imagen' => $imagen,
                'enlace' => $request['enlace'],
                // 'boton' => $request['boton'],
                // 'titulo' => $request['titulo'],
                'activo' => 0,
                // 'descripcion' => $request['descripcion']
            ]);
            $slider->save();
        }
        else {
            $slider->fill([
                'nombre' => $request['nombre'],
                'imagen' => $imagen,
                'enlace' => $request['enlace'],
                // 'boton' => $request['boton'],
                // 'titulo' => $request['titulo'],
                'activo' => 1,
                // 'descripcion' => $request['descripcion']
            ]);
            $slider->save();
        }

        

        return redirect('/sliders')->with('status', ['success', 'bx bx-check-circle', "El slider ha sido editado con éxito"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        //
        $slider->delete();
        return redirect('/sliders')->with('success', 'Slider Eliminado.');

    }

    public function uploadImage(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('storage/imagenes_slider/original'),$imageName);
        return response()->json(["status" => "success", "data" => $imageName]);
    }

    public function deleteImage(Request $request)
    {
        $image = $request->file('filename');
        $filename =  $request->get('filename');
        $path = public_path().'/storage/imagenes_slider/original/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }
}
