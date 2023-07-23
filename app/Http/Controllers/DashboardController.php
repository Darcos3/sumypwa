<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\User;
use App\Models\Pedido;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $topproductos = Producto::select("productos.nombre", "productos.vendidos", "productos.precio", "productos.imagen")
            ->limit(9)
            ->orderBy("productos.vendidos", "DESC")
            ->get();

        
        $usuarios = User::join("rols", "rols.id", "=", "users.rol_id")
            ->select("rols.nombre", DB::raw('count(*) as cantidad'))
            ->groupBy("users.rol_id")
            ->get();  
        
        $pedidos = Pedido::latest()->limit(6)->get();
        
        $categorias = Categoria::select(DB::raw('count(*) as cantidad'))->get();

        $productos = Producto::select(DB::raw('count(*) as cantidad'))->get();


       return view('backend.dashboard.index', compact(
            'topproductos',
            'usuarios',
            'pedidos',
            "categorias",
            "productos"
        ));
    }
}