<?php

namespace App\Http\Controllers;

use App\Models\Cupon;
use App\Models\CuponUsuario;
use Illuminate\Http\Request;

class CuponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $cupones = Cupon::all();
       return view('backend.cupones.index', compact('cupones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.cupones.create');
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
        Cupon::create([
            'nombre' => $request['nombre'],
            'codigo' => $request['codigo'],
            'usos' => $request['usos'],
            'vencimiento' => $request['vencimiento'],
            'descuento_dinero' => is_null($request['descuento_dinero']) ? 0.0 : $request['descuento_dinero'],
            'descuento_porcentaje' =>is_null( $request['descuento_porcentaje']) ? 0.0 : $request['descuento_porcentaje'],
            'dto_pesos' => isset($request['dto_pesos']) ? 1 : 0,
            'dto_porcentaje' => isset($request['dto_porcentaje']) ? 1 : 0
        ]);

        return redirect('/cupones')->with('status', ['success', 'bx bx-check-circle', "Cupón creado con éxito"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cupon  $cupon
     * @return \Illuminate\Http\Response
     */
    public function show(Cupon $cupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cupon  $cupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Cupon $cupon)
    {
        return view('backend.cupones.edit', compact('cupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cupon  $cupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cupon $cupon)
    {
        $cupon->fill([
            'nombre' => $request['nombre'],
            'codigo' => $request['codigo'],
            'usos' => $request['usos'],
            'vencimiento' => $request['vencimiento'],
            'descuento_dinero' => is_null($request['descuento_dinero']) ? 0.0 : $request['descuento_dinero'],
            'descuento_porcentaje' =>is_null( $request['descuento_porcentaje']) ? 0.0 : $request['descuento_porcentaje'],
            'estado' => isset($request['estado']) ? 1 : 0,
            'dto_pesos' => isset($request['dto_pesos']) ? 1 : 0,
            'dto_porcentaje' => isset($request['dto_porcentaje']) ? 1 : 0
        ]);
        $cupon->save();

        return redirect('/cupones')->with('status', ['success', 'bx bx-check-circle', "Cupón modificado con éxito"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cupon  $cupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cupon $cupon)
    {
        //
    }

    public function anadirCupon()
    {
        $codigo = $_GET['cupon'];

        if (auth()->check()) {

            $cupon = Cupon::where('codigo', $codigo)->first();
            
            $conocer_cupouser = CuponUsuario::where('id_user', auth()->user()->id)
                ->where('id_cupon', $cupon->id)
                ->first();

                $fa = date('d-m-Y'); 
                $fc = date("d-m-Y",strtotime($cupon->vencimiento));

                
                if( $conocer_cupouser != null ){}
                else {
                    if ($cupon && $cupon->usos > 0 && $cupon->estado == 1) {
                        // $fv = date("d-m-Y",strtotime($conocer_cupouser->vencimiento));
                        if( $fc >= $fa  ){
                            $cupon->usos = $cupon->usos-1;
                            $cupon->save();
            
                            auth()->user()->carrito->cupon_id = $cupon->id;
                            auth()->user()->carrito->save();
                            
                            if($cupon->dtopesos == 1){
                                return [
                                    'exito' => 200,
                                    'tipo' => 'dto_pesos',
                                    'valor' => $cupon->descuento_dinero
                                ];
                            }
                            else if($cupon->dtoporcentaje == 1){
                                return [
                                    'exito' => 200,
                                    'tipo' => 'dto_porcentaje',
                                    'valor' => $cupon->descuento_porcentaje / 100
                                ];
                            }
                        }
                        
                    }
                }
            
        }
        return ['exito' => 500];
    }
}
