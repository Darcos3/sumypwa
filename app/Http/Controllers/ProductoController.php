<?php

namespace App\Http\Controllers;
error_reporting (E_ALL ^ E_NOTICE);

use App\Models\Producto;
use App\Models\Combo;
use Illuminate\Http\Request;

use Image;

use function PHPUnit\Framework\isEmpty;

use Illuminate\Support\Facades\Log;

use Debugbar;

use \App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use Session;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::orderByDesc('id')->paginate(15);
        return view('backend.productos.index', compact('productos'));
    }


    public function buscar_listado(Request $request){

        $productos = Producto::
        where('productos.nombre', 'LIKE', '%'.$request['termino'].'%')
        ->orderByDesc('id')->paginate(15);
        return view('backend.productos.index', compact('productos'));
    }   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = \App\Models\Categoria::whereNull('categoria_id')->where('id','>',1)->get();
        $etiquetas = \App\Models\Etiqueta::where('activa',1)->get();
        $atributos = \App\Models\Atributo::where('activo',1)->get();
        return view('backend.productos.create', compact('categorias','etiquetas', 'atributos'));
    }

    public function importar()
    {
        return view('backend.productos.importar');
    }

    public function importarProductos(Request $request)
    {
        // $data = array_map('str_getcsv', file($request->file('archivo')->getRealPath()));
        // $data = array_map('str_getcsv', file($request->file('archivo')->getRealPath()));

        $longitudDeLinea = 1000;
        $delimitador = ",";
        $caracterCircundante = '"';
        $handle = fopen($request->file('archivo')->getRealPath(), "r"); // nombre de archivo
        
        $datos = [];
        while (($data = fgetcsv($handle, $longitudDeLinea, $delimitador, $caracterCircundante)) !== FALSE) {
            $datos[] = $data;
        }

        $datos = array_slice($datos, 1);
        // dd($datos);

        $items = \App\Models\Producto::get();
      
        
        foreach ($datos as $dato) {
            if( $dato[0] != ''){    
                $prod = Producto::where('sku',$dato[0])->get();

                // dd(intval($dato[6]));
                if(count($prod) > 0){
                    
                    // dd($dato[1]);
                    $producto = Producto::updateOrCreate(
                        ['sku' => $dato[0]],
                        [
                            'nombre' => utf8_encode($dato[1]),
                            'precio' => $dato[2],
                            'precio_descuento' => $dato[3],
                            'precio_ferretero' => $dato[4],
                            'destacado' => isset($dato[5]) ? 1 : 0,
                            'cantidad' => intval($dato[6]) + $prod[0]['cantidad'],
                            'ancho' => $dato[7],
                            'alto' => $dato[8],
                            'largo' => $dato[9],
                            'peso' => $dato[10],
                            'descripcion_corta' => str_replace("\n", "<br>", utf8_encode($dato[11])),
                            'descripcion' => str_replace("\n", "<br>", utf8_encode($dato[12])),
                            'categoria_id' => 1,
                            'imagen' => 'sin-imagen.png',
                            'activo' => isset($dato[18]) ? 1 : 0
                        ]
                    );
                }
                else {
                    $producto = Producto::create(
                        [
                            'sku' => $dato[0],
                            'nombre' => utf8_encode($dato[1]),
                            'precio' => $dato[2],
                            'precio_descuento' => $dato[3],
                            'precio_ferretero' => $dato[4],
                            'destacado' => isset($dato[5]) ? 1 : 0,
                            'cantidad' => $dato[6],
                            'ancho' => $dato[7],
                            'alto' => $dato[8],
                            'largo' => $dato[9],
                            'peso' => $dato[10],
                            'descripcion_corta' => str_replace("\n", "<br>", utf8_encode($dato[11])),
                            'descripcion' => str_replace("\n", "<br>", utf8_encode($dato[12])),
                            'categoria_id' => 1,
                            'imagen' => 'sin-imagen.png',
                            'activo' => isset($dato[18]) ? 1 : 0
                        ]
                    );
                }
                
                // Imagen
                if (!empty($dato[13])) {
                    $imagenes = explode(",", $dato[13]);

                    $url = $imagenes[0];
                    // dd($url);
                    // $contents = file_get_contents($url);
                    $url_new = str_replace(" ", "%20", $url);
                    try {
                        $contents = file_get_contents($url_new);
                        
                        // Realiza alguna acción con el contenido obtenido
                        
                    } catch (Exception $e) {
                        // Captura la excepción y manejarla
                        
                        // Puedes mostrar un mensaje de error
                        echo "Ocurrió un error: " . $e->getMessage().', '. $url_new;
                        
                        // También puedes registrar el error en el log
                        Log::error('Excepción: ' . $e->getMessage().', '. $url_new);
                        
                        // Realizar cualquier otra acción necesaria para manejar la excepción
                    }

                    $name = substr($url_new, strrpos($url_new, '/') + 1);
                    \Storage::put('public/imagenes_producto/original/'.$name, $contents);
                    $producto->imagen = $name;

                    $img = Image::make('storage/imagenes_producto/original/'.$name);
                    $img->resize(700, 700);
                    $img->save('storage/imagenes_producto/700x700/'.$name);
                    $img->resize(212, 212);
                    $img->save('storage/imagenes_producto/212x212/'.$name);
                    $img->resize(75, 75);
                    $img->save('storage/imagenes_producto/75x75/'.$name);

                    // foreach ($imagenes as $imagen) {
                    //
                    //     $imagenRegistro = \App\Models\ImagenProducto::find($imagen);
                    //     $imagenRegistro->producto_id = $producto->id;
                    //     $imagenRegistro->save();
                    //
                    //     $img = Image::make('storage/imagenes_producto/original/'.$imagenRegistro->nombre);
                    //     $img->resize(700, 700);
                    //     $img->save('storage/imagenes_producto/700x700/'.$imagenRegistro->nombre);
                    //
                    //
                    // }

                }

                // Categoría principal
                if (!empty($dato[14])) {

                    $categoria = \App\Models\Categoria::firstOrCreate(
                        ['nombre' => $dato[14]],
                        [
                            'slug' => \Str::of($dato[14])->slug('-'),
                            'categoria_id' => null,
                        ]
                    );
                    $producto->categoria_id = $categoria->id;
                }

                // Categorías
                if (!empty($dato[15])) {
                    $categoriasGeneral = explode(",", $dato[16]);

                    foreach ($categoriasGeneral as $categorias) {

                        $cats = explode(">", $categorias);
                        $catPadre = null;
                        $len = count($cats);
                        foreach ($cats as $key => $value) {

                            if ($key == $len - 1) {
                                $categoria = \App\Models\Categoria::firstOrCreate(
                                    [
                                        'nombre' => $value,
                                        'categoria_id' => $catPadre == null ? null : $catPadre->id
                                    ],
                                    [
                                        'slug' => \Str::of($value)->slug('-'),
                                        'categoria_id' => $catPadre == null ? null : $catPadre->id,
                                    ]
                                );
                                $producto->categoria_id = $categoria->id;
                            } else {
                                $catPadre = \App\Models\Categoria::firstOrCreate(
                                    [
                                        'nombre' => $value,
                                        'categoria_id' => $catPadre == null ? null : $catPadre->id
                                    ],
                                    [
                                        'slug' => \Str::of($value)->slug('-'),
                                        'categoria_id' => $catPadre == null ? null : $catPadre->id,
                                    ]
                                );
                            }
                        }

                    }
                }

                // Atributos
                if (!empty($dato[16])) {

                    $atributosGeneral = explode(",", $dato[16]);
                    
                    foreach ($atributosGeneral as $atributos) {
                        
                        $atrs = explode(":", $atributos);

                        // $atributo = \App\Models\Atributo::firstOrCreate(
                        //     [
                        //         'nombre' => $atrs[0],
                        //     ],
                        //     [
                        //         'slug' => \Str::of($atrs[0])->slug('-'),
                        //         ]
                            
                        //     );
                            
                            $terminos = explode("-", $atrs[0]);
                        foreach ($terminos as $termino) {
                            $term = \App\Models\Termino::firstOrCreate(
                                // ['nombre' => $termino, 'atributo_id' => $atributo->id],
                                // ['nombre' => $termino, 'atributo_id' => $atributo->id]
                                ['nombre' => $termino, 'atributo_id' => 1],
                                ['nombre' => $termino, 'atributo_id' => 1]

                            );
                            $producto->terminos()->attach($term->id);
                        }

                    }
                }

                // Etiquetas
                if (!empty($dato[17])) {
                    $etiquetas = explode(",", $dato[15]);
                    foreach ($etiquetas as $nombreEtiqueta) {
                        $etiqueta = \App\Models\Etiqueta::firstOrCreate(
                            ['nombre' => $nombreEtiqueta],
                            [
                                'slug' => \Str::of($nombreEtiqueta)->slug('-'),
                            ]
                        );
                        if(count($prod) > 0){

                        }
                        else {
                            $producto->etiquetas()->attach($etiqueta->id);
                        }
                    }
                }


                $producto->save();
            }

        }

        Session::flash('message', 'Has importado nuevos productos o cantidades nuevas al sistema!');

        return redirect()->route('productos.index');
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
        $producto = Producto::create([
            'nombre' => $request['nombre'],
            // 'slug' => \Str::of($request['nombre'])->slug('-'),
            'descripcion_corta' => $request['descripcion_corta'],
            'sku' => $request['sku'],
            'precio' => $request['precio'],
            'precio_descuento' => $request['precio_descuento'],
            'precio_ferretero' => $request['precio_ferretero'],
            'ancho' => $request['ancho'],
            'alto' => $request['alto'],
            'largo' => $request['largo'],
            'peso' => $request['peso'],
            'cantidad' => $request['cantidad'],
            'destacado' => isset($request['destacado']) ? 1 : 0,
            'categoria_id' => $request['categoria_principal'],
            'descripcion' => $request['descripcion'],
            'especificaciones' => $request['especificaciones'],
            'imagen' => $request['imagen'],
            'nuevo' => isset($request['nuevo']) ? 1 : 0,
            'nuevo_vencimiento' => $request['nuevo_vencimiento'],
            'facturar_sinexistencias' => isset($request['facturar_sinexistencias']) ? 1 : 0,
        ]);

        if ($request['imagenes']) {
            foreach ($request['imagenes'] as $key) {
                $imagenRegistro = \App\Models\ImagenProducto::find($key);
                $imagenRegistro->producto_id = $producto->id;
                $imagenRegistro->save();

                $img = Image::make('storage/imagenes_producto/original/'.$imagenRegistro->nombre);
                $img->resize(700, 700);
                $img->save('storage/imagenes_producto/700x700/'.$imagenRegistro->nombre);
            }
        }

        if (!empty($request['categorias'])) {
            if (!in_array($request['categoria_principal'], $request['categorias'])) {
                $producto->categorias()->sync(array_merge([$request['categoria_principal']], $request['categorias']));
            } else {
                $producto->categorias()->sync($request['categorias']);
            }
        }

        if (!empty($request['etiquetas'])) {
            $producto->etiquetas()->attach($request['etiquetas']);
        }

        if (!empty($request['terminos'])) {
            $producto->terminos()->attach($request['terminos']);
        }

        if ($request['imagen']) {
            $img = Image::make('storage/imagenes_producto/original/'.$request['imagen']);
            $img->resize(700, 700);
            $img->save('storage/imagenes_producto/700x700/'.$request['imagen']);
            $img->resize(212, 212);
            $img->save('storage/imagenes_producto/212x212/'.$request['imagen']);
            $img->resize(75, 75);
            $img->save('storage/imagenes_producto/75x75/'.$request['imagen']);
        }

        return redirect('/productos')->with('status', ['success', 'bx bx-check-circle', "El producto se ha creado con éxito"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        $atributosSel = $producto->terminos->unique('atributo_id');
        return view('frontend.productos.show', compact('producto', 'atributosSel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $categorias = \App\Models\Categoria::whereNull('categoria_id')->where('id','>',1)->get();
        $etiquetas = \App\Models\Etiqueta::where('activa',1)->get();
        $atributos = \App\Models\Atributo::where('activo',1)->get();

        $atributosSel = $producto->terminos->unique('atributo_id');

        return view('backend.productos.edit', compact('producto','categorias','etiquetas', 'atributos', 'atributosSel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        // dd($request->all());
        $producto->fill([
            'nombre' => $request['nombre'],
            // 'slug' => \Str::of($request['nombre'])->slug('-'),
            'descripcion_corta' => $request['descripcion_corta'],
            'sku' => $request['sku'],
            'precio' => $request['precio'],
            'precio_descuento' => $request['precio_descuento'],
            'precio_ferretero' => $request['precio_ferretero'],
            'ancho' => $request['ancho'],
            'alto' => $request['alto'],
            'largo' => $request['largo'],
            'peso' => $request['peso'],
            'cantidad' => $request['cantidad'],
            'destacado' => isset($request['destacado']) ? 1 : 0,
            'activo' => isset($request['activo']) ? 1 : 0,
            'categoria_id' => $request['categoria_principal'],
            'descripcion' => $request['descripcion'],
            'especificaciones' => $request['especificaciones'],
            'nuevo' => isset($request['nuevo']) ? 1 : 0,
            'nuevo_vencimiento' => $request['nuevo_vencimiento'],
            'facturar_sinexistencias' => isset($request['facturar_sinexistencias']) ? 1 : 0,
        ]);


        if ($request["imagenBorrar"]) {
            $producto->imagen = 'sin-imagen.png';
        }
        if ($request["imagen"]) {
            $producto->imagen = $request["imagen"];
            $img = Image::make('storage/imagenes_producto/original/'.$request['imagen']);
            $img->resize(700, 700);
            $img->save('storage/imagenes_producto/700x700/'.$request['imagen']);
            $img->resize(212, 212);
            $img->save('storage/imagenes_producto/212x212/'.$request['imagen']);
            $img->resize(75, 75);
            $img->save('storage/imagenes_producto/75x75/'.$request['imagen']);
        }

        if (!empty($request['etiquetas'])) {
            $producto->etiquetas()->sync($request['etiquetas']);
        }

        if (!empty($request['terminos'])) {
            $producto->terminos()->sync($request['terminos']);
        }

        if (!empty($request['categorias'])) {
            if (!in_array($request['categoria_principal'], $request['categorias'])) {
                $producto->categorias()->sync(array_merge([$request['categoria_principal']], $request['categorias']));
            } else {
                $producto->categorias()->sync($request['categorias']);
            }
        }

        if ($request['imagenes']) {
            foreach ($request['imagenes'] as $key) {
                $imagenRegistro = \App\Models\ImagenProducto::find($key);
                $imagenRegistro->producto_id = $producto->id;
                $imagenRegistro->save();

                $img = Image::make('storage/imagenes_producto/original/'.$imagenRegistro->nombre);
                $img->resize(700, 700);
                $img->save('storage/imagenes_producto/700x700/'.$imagenRegistro->nombre);
            }
        }

        if ($request['imagenesBorrar']) {
            foreach ($request['imagenesBorrar'] as $key) {
                $imagenRegistro = \App\Models\ImagenProducto::find($key);
                $imagenRegistro->delete();
            }
        }

        $producto->save();
        return redirect('/productos')->with('status', ['success', 'bx bx-check-circle', "El producto se ha actualizado con éxito"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }

    public function favorito(Producto $producto)
    {
        if (auth()->check()) {
            $estado = auth()->user()->productos()->toggle([$producto->id]);
            return ['cantidad' =>auth()->user()->productos->count(), 'estado' => sizeof($estado["attached"]) > 0 ? 1 : 0];
        }
    }

    public function anadirCarrito(Request $request)
    {
        // return 'algo';
        if (auth()->check()) {
            $id = $_GET['id'];
            $cantidad = $_GET['cantidad'];
            // $estado = auth()->user()->carrito()->toggle([$id]);
            //
            if ($_GET['escombo']) {
                \Debugbar::info( 'es un combo');
                auth()->user()->carrito->combos()->syncWithoutDetaching([$id => ['cantidad' => $cantidad]]);
            } else {

                auth()->user()->carrito->productos()->syncWithoutDetaching([$id => ['cantidad' => $cantidad]]);
            }

            auth()->user()->carrito->actualizarTotalCarrito();
            
            return [
                'cantidad' => auth()->user()->carrito->productos->count() + auth()->user()->carrito->combos->count(), 
                'total' => auth()->user()->carrito->total
            ];
        // } else {
        //     \Cookie::queue('nameeee', 'algo desde carrito', 10);
        //     \Cookie::queue('name2', 'algo desde carrito e imprime ahí', 10);
        //     \Debugbar::info( \Cookie::get('name2'));
        //     return 'cookies';
        }
    }

    public function eliminarCarrito(Producto $producto)
    {
        if (auth()->check()) {

            auth()->user()->carrito->productos()->detach($producto->id);
            $total = 0;
            foreach (auth()->user()->carrito->productos as $prod) {
                $total += $prod->pivot->cantidad * ($prod->tieneDescuento() ? $prod->precioDescuento() : $prod->precio );
            }
            auth()->user()->carrito->total = $total;
            auth()->user()->carrito->save();

            return ['estado' => 1, 'cantidad' => auth()->user()->carrito->productos->count(), 'total' => auth()->user()->carrito->total];
        }
    }

    public function datosModal(Producto $producto)
    {   
        $b = [];
        if( auth()->user()->carrito->productos->count() > 0){
            foreach (auth()->user()->carrito->productos as $prods) {
                if( $prods->id == $producto->id ){
                    $cant = $prods->pivot->cantidad + 1;

                    $b = [
                        'pivot' => $cant
                    ];
                }
                // else {
                //     return [
                //         'nombre' => $producto->nombre, 
                //         'imagen' => $producto->imagen, 
                //         'cantidad' => $producto->cantidad
                //     ];
                // }
            }
        }
        else {
            $b = [
                    'pivot' => 1
                ];
        }

        $a = [
            'nombre' => $producto->nombre, 
            'imagen' => $producto->imagen, 
            'cantidad' => $producto->cantidad, 
        ];

        return $array =[
            "a" => $a,
            "b" => $b
        ];
    }

    public function buscar()
    {
        // Log::debug('An informational message1111.');
        // dd($_GET);

        $termino = $_GET['buscarproductos'];
        $categoriaId = $_GET['categoria'] ?? 0;
        $precioMinimo =  $_GET['precio_minimo'] ?? 0;
        $precioMaximo =  $_GET['precio_maximo'] ?? 3000000;
        $resultados   = $_GET['resultados'] ?? 20;
        $orden   = $_GET['orden'] ?? 'defecto';

        // var_dump($resultados);
        // exit;

        $terminosSeleccionados = [];
        if ( isset($_GET['terminos'])) {
            $terminosSeleccionados = array_keys( $_GET['terminos']);
        }

        \Debugbar::info($terminosSeleccionados);

        if ($categoriaId == '0') {
            \Debugbar::info('sin cat '.$categoriaId);
            \Debugbar::info('minimo '.$precioMinimo);
            \Debugbar::info('maximo '.$precioMaximo);
            \Debugbar::info('termino '.$termino);


            if( $orden == 'defecto' ){

                // dd($precioMinimo);
                $productos = \App\Models\Producto::where('nombre', 'like', '%'.$termino.'%')
                // ->whereBetween('precio', [$precioMinimo, $precioMaximo])
                // ->orWhere('precio_descuento', '<=', $precioMaximo)
                // ->where('precio', '>', $precioMinimo)
                // ->where('precio', '<=', $precioMaximo)
                ->where(function($query) use ($precioMinimo, $precioMaximo) {
                    $query->whereBetween('precio', [$precioMinimo, $precioMaximo])
                        ->orwhere('precio_descuento', '<', $precioMaximo);
                })
                
                ->paginate($resultados);

            }
            else if( $orden == 'mas_vendidos'){
                $productos = \App\Models\Producto::where('nombre', 'like', '%'.$termino.'%')
                ->where(function($query) use ($precioMinimo, $precioMaximo) {
                    $query->whereBetween('precio', [$precioMinimo, $precioMaximo])
                        ->orwhere('precio_descuento', '<', $precioMaximo);
                })
                ->orderByDesc('vendidos')

                // $productos = \App\Models\Producto::search($termino)
                // ->within('productos_mas_vendidos')

                // ->query(function($query) use($precioMinimo, $precioMaximo) {
                //     return $query->precioDescuentoAndFerretero($precioMinimo, $precioMaximo);
                // })

                // // ->query(function($query) use($terminosSeleccionados) {
                // //     return $query->tieneTermino($terminosSeleccionados);
                // // })

                ->paginate($resultados);
            }
            else if( $orden == 'mejor_valorados' ){
                $productos = \App\Models\Producto::where('nombre', 'like', '%'.$termino.'%')
                ->where(function($query) use ($precioMinimo, $precioMaximo) {
                    $query->whereBetween('precio', [$precioMinimo, $precioMaximo])
                        ->orwhere('precio_descuento', '<', $precioMaximo);
                })
                ->orderByDesc('valoracion')
                // $productos = \App\Models\Producto::search($termino)
                // ->within('productos_mejor_valorados')

                // ->query(function($query) use($precioMinimo, $precioMaximo) {
                //     return $query->precioDescuentoAndFerretero($precioMinimo, $precioMaximo);
                // })

                // // ->query(function($query) use($terminosSeleccionados) {
                // //     return $query->tieneTermino($terminosSeleccionados);
                // // })

                ->paginate($resultados);
            }
            else if( $orden == 'menor_precio' ){
                $productos = \App\Models\Producto::where('nombre', 'like', '%'.$termino.'%')
                ->where(function($query) use ($precioMinimo, $precioMaximo) {
                    $query->whereBetween('precio', [$precioMinimo, $precioMaximo])
                        ->orwhere('precio_descuento', '<', $precioMaximo);
                })
                ->orderBy('precio', 'asc')
                // $productos = \App\Models\Producto::search($termino)
                // ->within('productos_precio_asc')

                // ->query(function($query) use($precioMinimo, $precioMaximo) {
                //     return $query->precioDescuentoAndFerretero($precioMinimo, $precioMaximo);
                // })

                // // ->query(function($query) use($terminosSeleccionados) {
                // //     return $query->tieneTermino($terminosSeleccionados);
                // // })

                ->paginate($resultados);
            }
            else if( $orden == 'mayor_precio'){
                $productos = \App\Models\Producto::where('nombre', 'like', '%'.$termino.'%')
                ->where(function($query) use ($precioMinimo, $precioMaximo) {
                    $query->whereBetween('precio', [$precioMinimo, $precioMaximo])
                        ->orwhere('precio_descuento', '<', $precioMaximo);
                })
                ->orderBy('precio', 'desc')
                // $productos = \App\Models\Producto::search($termino)
                // ->within('productos_precio_desc')

                // ->query(function($query) use($precioMinimo, $precioMaximo) {
                //     return $query->precioDescuentoAndFerretero($precioMinimo, $precioMaximo);
                // })

                // // ->query(function($query) use($terminosSeleccionados) {
                // //     return $query->tieneTermino($terminosSeleccionados);
                // // })

                ->paginate($resultados);
            }
            // $combos = Combo::search($termino)->get();
            $combos = Combo::where('nombre', 'like', '%'.$termino.'%');
        } else {
            \Debugbar::info('con cat '.$categoriaId);
            \Debugbar::info('minimo '.$precioMinimo);
            \Debugbar::info('maximo '.$precioMaximo);
            // $productos = \App\Models\Producto::search($termino)->where('categoria_id', $categoriaId)
            // ->query(function($query) use($precioMinimo, $precioMaximo) {
            //     // return $query->precio($precioMinimo, $precioMaximo);
            //     return $query->precioDescuentoAndFerretero($precioMinimo, $precioMaximo, $orden);
            // })
            // ->query(function($query) use($terminosSeleccionados) {
            //     return $query->tieneTermino($terminosSeleccionados);
            // })
            // ->paginate();
            if( $orden == 'defecto' ){
                $productos = \App\Models\Producto::where('nombre', 'like', '%'.$termino.'%')
                ->where(function($query) use ($precioMinimo, $precioMaximo) {
                    $query->whereBetween('precio', [$precioMinimo, $precioMaximo])
                        ->orwhere('precio_descuento', '<', $precioMaximo);
                })
                ->orWhere('categoria_id', $categoriaId)

                // $productos = \App\Models\Producto::search($termino)->where('categoria_id', $categoriaId)
                // ->query(function($query) use($precioMinimo, $precioMaximo) {
                //     return $query->precioDescuentoAndFerretero($precioMinimo, $precioMaximo);
                // })

                // ->query(function($query) use($terminosSeleccionados) {
                //     return $query->tieneTermino($terminosSeleccionados);
                // })

                ->paginate($resultados);
            }
            else if( $orden == 'mas_vendidos'){
                $productos = \App\Models\Producto::where('nombre', 'like', '%'.$termino.'%')
                ->where(function($query) use ($precioMinimo, $precioMaximo) {
                    $query->whereBetween('precio', [$precioMinimo, $precioMaximo])
                    ->orwhere('precio_descuento', '<', $precioMaximo);
                })
                ->orWhere('categoria_id', $categoriaId)
                ->orderByDesc('vendidos')

                // $productos = \App\Models\Producto::search($termino)->where('categoria_id', $categoriaId)
                // ->query(function($query) use($precioMinimo, $precioMaximo) {
                //     return $query->precioDescuentoAndFerretero($precioMinimo, $precioMaximo);
                // })

                // ->query(function($query) use($terminosSeleccionados) {
                //     return $query->tieneTermino($terminosSeleccionados);
                // })

                ->paginate($resultados);
            }
            else if( $orden == 'mejor_valorados' ){
                $productos = \App\Models\Producto::where('nombre', 'like', '%'.$termino.'%')
                ->where(function($query) use ($precioMinimo, $precioMaximo) {
                    $query->whereBetween('precio', [$precioMinimo, $precioMaximo])
                    ->orwhere('precio_descuento', '<', $precioMaximo);
                })
                ->orWhere('categoria_id', $categoriaId)
                ->orderByDesc('valoracion')

                // $productos = \App\Models\Producto::search($termino)->where('categoria_id', $categoriaId)
                // ->query(function($query) use($precioMinimo, $precioMaximo) {
                //     return $query->precioDescuentoAndFerretero($precioMinimo, $precioMaximo);
                // })

                // ->query(function($query) use($terminosSeleccionados) {
                //     return $query->tieneTermino($terminosSeleccionados);
                // })

                ->paginate($resultados);
            }
            else if( $orden == 'menor_precio' ){
                $productos = \App\Models\Producto::where('nombre', 'like', '%'.$termino.'%')
                ->where(function($query) use ($precioMinimo, $precioMaximo) {
                    $query->whereBetween('precio', [$precioMinimo, $precioMaximo])
                    ->orwhere('precio_descuento', '<', $precioMaximo);
                })
                ->orWhere('categoria_id', $categoriaId)
                ->orderBy('precio', 'asc')

                // $productos = \App\Models\Producto::search($termino)->where('categoria_id', $categoriaId)
                // ->query(function($query) use($precioMinimo, $precioMaximo) {
                //     return $query->precioDescuentoAndFerretero($precioMinimo, $precioMaximo);
                // })

                // ->query(function($query) use($terminosSeleccionados) {
                //     return $query->tieneTermino($terminosSeleccionados);
                // })

                ->paginate($resultados);

            }
            else if( $orden == 'mayor_precio'){
                $productos = \App\Models\Producto::where('nombre', 'like', '%'.$termino.'%')
                ->where(function($query) use ($precioMinimo, $precioMaximo) {
                    $query->whereBetween('precio', [$precioMinimo, $precioMaximo])
                    ->orwhere('precio_descuento', '<', $precioMaximo);
                })
                ->orWhere('categoria_id', $categoriaId)
                ->orderByDesc('precio')

                // $productos = \App\Models\Producto::search($termino)->where('categoria_id', $categoriaId)
                // ->query(function($query) use($precioMinimo, $precioMaximo) {
                //     return $query->precioDescuentoAndFerretero($precioMinimo, $precioMaximo);
                // })

                // ->query(function($query) use($terminosSeleccionados) {
                //     return $query->tieneTermino($terminosSeleccionados);
                // })

                ->paginate($resultados);
            }

            // $combos = Combo::search($termino)->get();
            $combos = Combo::where('nombre', 'like', '%'.$termino.'%');

        }

        $atributos = [];
        $terminos = [];

        foreach ($productos as $producto) {
            foreach ($producto->terminos as $ter) {
                $atributos[$ter->atributo->id] = \App\Models\Atributo::find($ter->atributo->id);
                $terminos[$ter->id] = $ter->id;
            }
        }

        return view('frontend.productos.buscar', compact('productos', 'combos','termino', 'atributos', 'terminos'));
    }

    public function uploadImage(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('storage/imagenes_producto/original'),$imageName);
        return response()->json(["status" => "success", "data" => $imageName]);
    }

    public function deleteImage(Request $request)
    {
        $image = $request->file('filename');
        $filename =  $request->get('filename');
        $path = public_path().'/storage/imagenes_producto/original/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }

    public function uploadImagesSlider(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('storage/imagenes_producto/original'),$imageName);
        $data  =   \App\Models\ImagenProducto::create(['nombre' => $imageName]);
        return response()->json(["status" => "success", "data" => $data]);
    }

    public function deleteImageSlider(Request $request)
    {
        $image = $request->file('filename');
        $filename =  $request->get('filename');
        \App\Models\ImagenProducto::where('nombre', $filename)->delete();
        $path = public_path().'/storage/imagenes_producto/original/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }

    public function cargar(Producto $producto)
    {
        return ['data' => $producto];
    }

    public function exportar(){
        return Excel::download(new ProductsExport, 'productos_sumy.xlsx');
    }
}
