<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Image;

class CategoriaController extends Controller
{
    /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $categorias = Categoria::where('categoria_id', null)->get();
            return view('backend.categorias.index', compact('categorias'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            $categorias = Categoria::whereNull('categoria_id')->where('id','>',1)->get();
            return view('backend.categorias.create', compact('categorias'));
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            Categoria::create([
                'nombre' => $request['nombre'],
                'slug' => \Str::of($request['slug'])->slug('-'),
                'categoria_id' => $request['categoria_padre'],
                'imagen' => $request['imagen']
            ]);

            if ($request['imagen']) {
                $img = Image::make('storage/imagenes_categoria/original/'.$request['imagen']);
                $img->resize(300, 300);
                $img->save('storage/imagenes_categoria/300x300/'.$request['imagen']);
            }

            return redirect('/categorias')->with('status', ['success', 'bx bx-check-circle', "La categoría ha sido creada con éxito"]);
        }

        /**
         * Display the specified resource.
         *
         * @param  \App\Models\Categoria  $categoria
         * @return \Illuminate\Http\Response
         */
        public function show($categorias)
        {
            $categorias = explode('/', $categorias);
            $categoriaSlug = array_shift($categorias);
            $categoria = Categoria::where('slug',$categoriaSlug)->whereNull('categoria_id')->first();
            if (!$categoria) {
                abort(404);
            }
            $categoriaId = Categoria::buscarId($categoria,$categorias);


            $categoria = Categoria::find($categoriaId);
            if ($categoria->subcategorias->count() > 0) {
                $destacados = \App\Models\Producto::where('categoria_id', $categoriaId)->where('destacado',1)->get();

                // return view('frontend.categorias.show-subs', compact('categoria','destacados'));
            }

            $destacados = \App\Models\Producto::where('categoria_id', $categoriaId)->where('destacado',1)->get();
            
            \Debugbar::info($destacados);
            
            $resultados   = $_GET['resultados'] ?? 20;
            $orden   = $_GET['orden'] ?? 'defecto';
            $precioMinimo =  $_GET['precio_minimo'] ?? 0;
            $precioMaximo =  $_GET['precio_maximo'] ?? 3000000;
            $marca = $_GET['marca'] ?? 'sin categoria';

            if( $orden == 'defecto' ){

                \Debugbar::info('Categoria_id '.$categoriaId);
                $productos = \App\Models\Producto::where('categoria_id', $categoriaId)
                ->where(function($query) use ($precioMinimo, $precioMaximo) {
                    $query->whereBetween('precio', [$precioMinimo, $precioMaximo])
                        ->orwhere('precio_descuento', '<', $precioMaximo);
                })
                

                // $productos = \App\Models\Producto::search($categoriaId)
                // ->query(function($query) use($precioMinimo, $precioMaximo) {
                //     $query->precioDescuentoAndFerretero($precioMinimo, $precioMaximo);
                //     return $query;
                // })

                ->paginate($resultados);
            }
            else if( $orden == 'mas_vendidos'){
                $productos = \App\Models\Producto::where('categoria_id', $categoriaId)
                ->where(function($query) use ($precioMinimo, $precioMaximo) {
                    $query->whereBetween('precio', [$precioMinimo, $precioMaximo])
                        ->orwhere('precio_descuento', '<', $precioMaximo);
                })
                ->orderByDesc('vendidos')
                // $productos = \App\Models\Producto::search($categoriaId)
                // ->within('productos_mas_vendidos')
                // ->query(function($query) use($precioMinimo, $precioMaximo) {
                //     return $query->precioDescuentoAndFerretero($precioMinimo, $precioMaximo);
                // })
                ->paginate($resultados);
            }
            else if( $orden == 'mejor_valorados' ){
                $productos = \App\Models\Producto::where('categoria_id', $categoriaId)
                ->where(function($query) use ($precioMinimo, $precioMaximo) {
                    $query->whereBetween('precio', [$precioMinimo, $precioMaximo])
                        ->orwhere('precio_descuento', '<', $precioMaximo);
                })
                ->orderByDesc('valoracion')
                // $productos = \App\Models\Producto::search($categoriaId)
                // // ->where('categoria_id', $categoriaId)
                // ->within('productos_mas_vendidos')
                // ->query(function($query) use($precioMinimo, $precioMaximo) {
                //     return $query->precioDescuentoAndFerretero($precioMinimo, $precioMaximo);
                // })
                ->paginate($resultados);
            }
            else if( $orden == 'menor_precio' ){
                $productos = \App\Models\Producto::where('categoria_id', $categoriaId)
                ->where(function($query) use ($precioMinimo, $precioMaximo) {
                    $query->whereBetween('precio', [$precioMinimo, $precioMaximo])
                        ->orwhere('precio_descuento', '<', $precioMaximo);
                })
                ->orderBy('precio','asc')
                // $productos = \App\Models\Producto::search($categoriaId)
                // // ->where('categoria_id', $categoriaId)
                // ->within('productos_precio_asc')
                // ->query(function($query) use($precioMinimo, $precioMaximo) {
                //     return $query->precioDescuentoAndFerretero($precioMinimo, $precioMaximo);
                // })
                ->paginate($resultados);
            }
            else if( $orden == 'mayor_precio' ){
                $productos = \App\Models\Producto::where('categoria_id', $categoriaId)
                ->where(function($query) use ($precioMinimo, $precioMaximo) {
                    $query->whereBetween('precio', [$precioMinimo, $precioMaximo])
                        ->orwhere('precio_descuento', '<', $precioMaximo);
                })
                ->orderByDesc('precio')
                // $productos = \App\Models\Producto::search($categoriaId)
                // // ->where('categoria_id', $categoriaId)
                // ->within('productos_precio_desc')
                // ->query(function($query) use($precioMinimo, $precioMaximo) {
                //     return $query->precioDescuentoAndFerretero($precioMinimo, $precioMaximo);
                // })
                ->paginate($resultados);
            }
            
            $terminosSeleccionados = [];
            if ( isset($_GET['terminos'])) {
                $terminosSeleccionados = array_keys( $_GET['terminos']);
            }

            $atributos = [];
            $terminos = [];
            foreach ($productos as $producto) {
                foreach ($producto->terminos as $ter) {

                    $atributos[$ter->atributo->id] = \App\Models\Atributo::find($ter->atributo->id);
                    $terminos[$ter->id] = $ter->id;
                    // dd($terminos);
                }
            }



            return view('frontend.categorias.show-productos', compact('categoria', 'productos', 'atributos', 'terminos', 'orden', 'resultados', 'destacados'));
        }

        public function filtrar($categorias){
            $categorias = explode('/', $categorias);
            $categoriaSlug = array_shift($categorias);
            $categoria = Categoria::where('slug',$categoriaSlug)->whereNull('categoria_id')->first();
            // if (!$categoria) {
            //     abort(404);
            // }
            $categoriaId = Categoria::buscarId($categoria,$categorias);


            $categoria = Categoria::find($categoriaId);
            if ($categoria->subcategorias->count() > 0) {
                $destacados = \App\Models\Producto::where('categoria_id', $categoriaId)->where('destacado',1)->get();

                // return view('frontend.categorias.show-subs', compact('categoria','destacados'));
            }

            $destacados = \App\Models\Producto::where('categoria_id', $categoriaId)->where('destacado',1)->get();
            
            \Debugbar::info($destacados);
            
            $resultados   = $_GET['resultados'] ?? 20;
            $orden   = $_GET['orden'] ?? 'defecto';
            $precioMinimo =  $_GET['precio_minimo'] ?? 0;
            $precioMaximo =  $_GET['precio_maximo'] ?? 3000000;
            $marca = $_GET['marca'] ?? 'sin categoria';
            $termino = $_GET['termino'][0];

            
            $ref = \App\Models\Termino::find($termino);
            $referencia = $ref->nombre;
            // dd($ref->nombre);
            

            if( $orden == 'defecto' ){
                $productos = \App\Models\Producto::where('categoria_id', $categoriaId)
                ->where(function($query) use ($precioMinimo, $precioMaximo) {
                    $query->whereBetween('precio', [$precioMinimo, $precioMaximo])
                        ->orwhere('precio_descuento', '<', $precioMaximo);
                })
                // $productos = \App\Models\Producto::search($categoriaId)
                // ->query(function($query) use($precioMinimo, $precioMaximo) {
                //     $query->precioDescuentoAndFerretero($precioMinimo, $precioMaximo);
                //     return $query;
                // })
                ->paginate($resultados);
            }
            else if( $orden == 'mas_vendidos'){
                $productos = \App\Models\Producto::where('categoria_id', $categoriaId)
                ->where(function($query) use ($precioMinimo, $precioMaximo) {
                    $query->whereBetween('precio', [$precioMinimo, $precioMaximo])
                        ->orwhere('precio_descuento', '<', $precioMaximo);
                })
                ->orderByDesc('vendidos')
                // $productos = \App\Models\Producto::search($categoriaId)
                // // ->where('categoria_id', $categoriaId)
                // ->within('productos_mas_vendidos')
                // ->query(function($query) use($precioMinimo, $precioMaximo) {
                //     return $query->precioDescuentoAndFerretero($precioMinimo, $precioMaximo);
                // })
                ->paginate($resultados);
            }
            else if( $orden == 'mejor_valorados' ){
                $productos = \App\Models\Producto::where('categoria_id', $categoriaId)
                ->where(function($query) use ($precioMinimo, $precioMaximo) {
                    $query->whereBetween('precio', [$precioMinimo, $precioMaximo])
                        ->orwhere('precio_descuento', '<', $precioMaximo);
                })
                ->orderByDesc('valoracion')
                // $productos = \App\Models\Producto::search($categoriaId)
                // // ->where('categoria_id', $categoriaId)
                // ->within('productos_mas_vendidos')
                // ->query(function($query) use($precioMinimo, $precioMaximo) {
                //     return $query->precioDescuentoAndFerretero($precioMinimo, $precioMaximo);
                // })
                ->paginate($resultados);
            }
            else if( $orden == 'menor_precio' ){
                $productos = \App\Models\Producto::where('categoria_id', $categoriaId)
                ->where(function($query) use ($precioMinimo, $precioMaximo) {
                    $query->whereBetween('precio', [$precioMinimo, $precioMaximo])
                        ->orwhere('precio_descuento', '<', $precioMaximo);
                })
                ->orderBy('precio','asc')
                // $productos = \App\Models\Producto::search($categoriaId)
                // // ->where('categoria_id', $categoriaId)
                // ->within('productos_precio_asc')
                // ->query(function($query) use($precioMinimo, $precioMaximo) {
                //     return $query->precioDescuentoAndFerretero($precioMinimo, $precioMaximo);
                // })
                ->paginate($resultados);
            }
            else if( $orden == 'mayor_precio' ){
                $productos = \App\Models\Producto::where('categoria_id', $categoriaId)
                ->where(function($query) use ($precioMinimo, $precioMaximo) {
                    $query->whereBetween('precio', [$precioMinimo, $precioMaximo])
                        ->orwhere('precio_descuento', '<', $precioMaximo);
                })
                ->orderByDesc('precio')
                // $productos = \App\Models\Producto::search($categoriaId)
                // // ->where('categoria_id', $categoriaId)
                // ->within('productos_precio_desc')
                // ->query(function($query) use($precioMinimo, $precioMaximo) {
                //     return $query->precioDescuentoAndFerretero($precioMinimo, $precioMaximo);
                // })
                ->paginate($resultados);
            }
            
            $terminosSeleccionados = [];
            if ( isset($_GET['terminos'])) {
                $terminosSeleccionados = array_keys( $_GET['terminos']);
            }

            $atributos = [];
            $terminos = [];
            foreach ($productos as $producto) {
                foreach ($producto->terminos as $ter) {
                    $atributos[$ter->atributo->id] = \App\Models\Atributo::find($ter->atributo->id);
                    $terminos[$ter->id] = $ter->id;
                }
            }


            // dd($productos);
            return view('frontend.categorias.show-productos-terminos', compact('categoria', 'productos', 'precioMinimo', 'precioMaximo', 'referencia', 'atributos', 'termino', 'terminos', 'orden', 'resultados', 'destacados'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Models\Categoria  $categoria
         * @return \Illuminate\Http\Response
         */
        public function edit(Categoria $categoria)
        {
            $categorias = Categoria::whereNull('categoria_id')->where('id','>',1)->get();
            return view('backend.categorias.edit', compact('categoria','categorias'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Models\Categoria  $categoria
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Categoria $categoria)
        {
            $categoria->fill([
                'nombre' => $request['nombre'],
                'slug' => \Str::of($request['slug'])->slug('-'),
                'categoria_id' => $request['categoria_padre'],
                'activa' => isset($request['activa']) ? 1 : 0,
                'destacada' => isset($request['destacada']) ? 1 : 0
            ]);

            if ($request["imagenBorrar"]) {
                $categoria->imagen = 'sin-imagen.png';
            }
            if ($request["imagen"]) {
                $categoria->imagen = $request["imagen"];
                $img = Image::make('storage/imagenes_categoria/original/'.$request['imagen']);
                $img->resize(300, 300);
                $img->save('storage/imagenes_categoria/300x300/'.$request['imagen']);
            }
            $categoria->save();

            return redirect('/categorias')->with('status', ['success', 'bx bx-check-circle', "La categoría ha sido editada con éxito"]);
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Models\Categoria  $categoria
         * @return \Illuminate\Http\Response
         */
        public function destroy(Categoria $categoria)
        {
            //
        }

        public function uploadImage(Request $request) {
            $image = $request->file('file');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('storage/imagenes_categoria/original'),$imageName);
            return response()->json(["status" => "success", "data" => $imageName]);
        }

        public function deleteImage(Request $request) {
            $image = $request->file('filename');
            $filename =  $request->get('filename');
            $path = public_path().'/storage/imagenes_categoria/original/'.$filename;
            if (file_exists($path)) {
                unlink($path);
            }
            return $filename;
        }
}
