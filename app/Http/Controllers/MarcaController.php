<?php

namespace App\Http\Controllers;

use App\Models\Termino;
use App\Models\Producto;
use App\Models\ProductoTermino;
use App\Models\Categoria;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    
    public function show($marca)
    {
        // dd($marca);

        $productos = Producto::join('producto_termino','producto_termino.producto_id', '=', 'productos.id')
            ->join('terminos', 'terminos.id', '=', 'producto_termino.termino_id')
            ->select( 'productos.nombre', 
                'productos.slug', 
                'productos.cantidad', 
                'productos.descripcion_corta', 
                'productos.vendidos', 
                'productos.valoracion', 
                'productos.imagen', 
                'productos.precio', 
                'productos.precio_descuento' )
            ->where('terminos.nombre', 'LIKE', $marca)
            ->paginate(15)
            ;

        $nombreMarca = Termino::select('nombre as marca', 'imagen')->where('nombre', '=', $marca)->get();

        $categoriasPrincipales = Categoria::all();
        // var_dump(json_encode($prods));
        // exit;

        // dd($categoriasPrincipales);

        return view('frontend.marcas.view', compact('productos', 'nombreMarca', 'categoriasPrincipales'));
    }
}
