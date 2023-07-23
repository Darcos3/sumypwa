<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use \App\Exports\ClientsExport;
use Maatwebsite\Excel\Facades\Excel;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = User::where('rol_id', 2)->paginate(20);
        return view('backend.clientes.index', compact('clientes'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $cliente)
    {   
        $ciudades = \App\Models\Ciudad::all();

        $pedidosCliente = \App\Models\Pedido::where('user_id', $cliente->id)->orderBy('id', 'desc')->paginate(20);
        return view('backend.clientes.show', compact('cliente','pedidosCliente', 'ciudades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    public function actualizar(Request $request, User $cliente)
    {
        $cliente->fill([
            'name' => $request['nombre'],
            'apellidos' => $request['apellidos'],
            'celular' => $request['celular'],
            'cedula' => $request['cedula'],
            'birthday' => $request['birthday'],
            'id_ciudad' => $request['ciudad'],
            'direccion' => $request['direccion'],
            'forma_pago' =>$request['forma_pago'],
            'estado' => isset($request['estado']) ? 1 : 0
        ]);

        $cliente->save();

        return redirect('/clientes')->with('status', ['success', 'bx bx-check-circle', "El cliente se ha actualizado con éxito"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }

    public function exportar(){
        return Excel::download(new ClientsExport, 'clientes_sumy.xlsx');
    }
}
