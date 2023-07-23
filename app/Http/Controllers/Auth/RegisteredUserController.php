<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pedido;
use App\Models\Transporte\TestBox;  // use your own `Box` implementation
use App\Models\Transporte\TestItem; // use your own `Item` implementation

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use \App\Models\CuponUsuario;

use DVDoug\BoxPacker\Packer;
use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificacionPedido;



class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // dd(auth()->user()->id);

        
        \App\Models\Carrito::create([
            'user_id' => $user->id
        ]);
        
        event(new Registered($user));
        
        Auth::login($user);
        
        $cupon = \App\Models\Cupon::where('nombre', 'Registro')->where('estado', 1)->first();

        \Mail::to($user->email)->send(new \App\Mail\NuevoCliente( $cupon->codigo ) );
        // return redirect(RouteServiceProvider::HOME);
        return redirect('/detalles');

    }

    public function favoritos()
    {
        $productos = auth()->user()->productos;
        return view('frontend.usuarios.favoritos', compact('productos'));
    }

    public function carrito()
    {
        $productos = auth()->user()->carrito->productos;
        $combos = auth()->user()->carrito->combos;

        $packer = new Packer();
        $mediosTransporte = \App\Models\MedioTransporte::all();
        foreach ($mediosTransporte as $medio) {
            $packer->addBox(new TestBox(
                $medio->id,
                $medio->ancho,
                $medio->alto,
                $medio->largo,
                0,
                $medio->ancho,
                $medio->alto,
                $medio->largo,
                $medio->peso
            ));
        }

        $total = 0;
        foreach ($productos as $producto) {
            $total += $producto->menorPrecio() * $producto->pivot->cantidad;

            $packer->addItem(new TestItem(
                $producto->nombre,
                $producto->ancho ?? 1000,
                $producto->alto ?? 1000,
                $producto->largo ?? 1000,
                $producto->peso ?? 1000,
                false), $producto->pivot->cantidad);
        }

        foreach ($combos as $combo) {
            $total += $combo->menorPrecio() * $combo->pivot->cantidad;
            foreach ($combo->productos as $prodComb) {
                $packer->addItem(new TestItem(
                    $prodComb->nombre,
                    $prodComb->ancho ?? 1000,
                    $prodComb->alto ?? 1000,
                    $prodComb->largo ?? 1000,
                    $prodComb->peso ?? 1000,
                    false), $combo->pivot->cantidad);
                }
        }

        $packedBoxes = $packer->pack();

        $medioSeleccionado = null;
        foreach ($packedBoxes as $packedBox) {
            $boxType = $packedBox->getBox(); // your own box object, in this case TestBox
            $medioSeleccionado = \App\Models\MedioTransporte::find($boxType->getReference());
            $packedItems = $packedBox->getItems();
        }

        $subtotal = $total;

        // dd($subtotal);

        $total += $medioSeleccionado->precio;

        return view('frontend.usuarios.carrito', compact('productos', 'combos','subtotal','total', 'medioSeleccionado'));
    }

    public function ferretero()
    {
        return view('frontend.usuarios.ferretero');
    }

    public function envio()
    {
        $productos = auth()->user()->carrito->productos;
        $combos = auth()->user()->carrito->combos;

        $departamentos = \App\Models\Departamento::all();
        $ciudades = \App\Models\Ciudad::all();
        $direcciones = auth()->user()->direcciones;

        $total = 0;
        $ahorrado = 0;
        $iva1 = 0;
        $iva2 = 0;

        $envio = 10000;

        foreach ($productos as $producto) {
            $total += $producto->menorPrecio() * $producto->pivot->cantidad;
            if ($producto->tieneDescuento()) {
                // $ahorrado += ($producto->precio - $producto->menorPrecio() ) * $producto->pivot->cantidad;
            }
            $iva1 += $producto->precio * 0.19;
        }

        foreach ($combos as $combo) {
            $total += $combo->menorPrecio() * $combo->pivot->cantidad;
            $iva2 += $combo->precio * 0.19;
        }

        $subtotal = $total;
        // $iva = $iva1 + $iva2;

        // dd($sub);

        $cupon = 0;
        if (auth()->user()->carrito->cupon_id) {
            $cupon = auth()->user()->carrito->cupon;
            if ($cupon->descuento_dinero != 0.0) {
                $precio = $cupon->descuento_dinero;
                $sub = $subtotal;
                
                $descuento = $sub - $precio;
                $iva =  $descuento * 0.19;

                $tot = $descuento +$iva + $envio;

                $total -= $cupon->descuento_dinero;
                $cupon = $cupon->descuento_dinero;
            } elseif ($cupon->descuento_porcentaje != 0.0) {
                // $desc = ($total * $cupon->descuento_porcentaje) ;
                $porcentaje = $cupon->descuento_porcentaje / 100;
                $sub = $subtotal;
                
                $desc = ($sub * $cupon->descuento_porcentaje) ;
                $cupon = $desc / 100;
                $descuento = $sub - $cupon;
                $iva =  $descuento * 0.19;

                // dd($iva);
                $tot = $descuento +$iva + $envio;
                // dd($tot);
            }
        }

        // dd($total);

        return view('frontend.usuarios.envio', compact('productos','combos','departamentos','ciudades', 'direcciones', 'cupon', 'subtotal', 'total', 'ahorrado', 'envio', 'iva', 'tot'));
    }

    public function envioGuardar(Request $request)
    {
        // crea una nueva dirección si escoge casilla nueva, o si no selecciona una de la lista
        if ( isset($request['crear_nueva_facturacion']) || is_null($request['direccion_facturacion_id'])){
            \App\Models\Direccion::create([
                'tipo' => $request['nombre_direccion'],
                'user_id' => auth()->user()->id,
                'nombres' => $request['nombre_facturacion'],
                'apellidos' => $request['apellido_facturacion'],
                'nombre_empresa' => $request['nombre_empresa_facturacion'],
                'direccion' => $request['direccion_facturacion'],
                'documento' => $request['numero_identificacion_facturacion'],
                'email' => $request['email_facturacion'],
                'telefono' => $request['telefono_facturacion'],
                'ciudad_id' => $request['ciudad_id_facturacion'],
                'comentario' => $request['direccion_adicional_facturacion'],
            ]);
        } else {
            // modifica una dirección si no ecescoge casilla nueva, o si no selecciona una de la lista
            \App\Models\Direccion::updateOrCreate(
                ['id' => $request['direccion_facturacion_id']],
                [
                    'tipo' => $request['nombre_direccion'],
                    'user_id' => auth()->user()->id,
                    'nombres' => $request['nombre_facturacion'],
                    'apellidos' => $request['apellido_facturacion'],
                    'nombre_empresa' => $request['nombre_empresa_facturacion'],
                    'direccion' => $request['direccion_facturacion'],
                    'documento' => $request['numero_identificacion_facturacion'],
                    'email' => $request['email_facturacion'],
                    'telefono' => $request['telefono_facturacion'],
                    'ciudad_id' => $request['ciudad_id_facturacion'],
                    'comentario' => $request['direccion_adicional_facturacion'],
                ]
            );
        }

        if (isset($request['envio_diferente'])) {
            // crea una nueva dirección si escoge casilla nueva, o si no selecciona una de la lista
            if ( isset($request['crear_nueva_envio']) || is_null($request['direccion_envio_id'])){
                \App\Models\Direccion::create([
                    'tipo' => $request['nombre_direccion2'],
                    'user_id' => auth()->user()->id,
                    'nombres' => $request['nombre2'],
                    'apellidos' => $request['apellido2'],
                    'nombre_empresa' => $request['nombre_empresa2'],
                    'direccion' => $request['direccion2'],
                    'documento' => $request['numero_identificacion2'],
                    'email' => $request['email2'],
                    'telefono' => $request['telefono2'],
                    'ciudad_id' => $request['ciudad_id2'],
                    'comentario' => $request['direccion_adicional2'],
                ]);
            } else {
                // modifica una dirección si no ecescoge casilla nueva, o si no selecciona una de la lista
                \App\Models\Direccion::updateOrCreate(
                    ['id' => $request['direccion_envio_id']],
                    [
                        'tipo' => $request['nombre_direccion2'],
                        'user_id' => auth()->user()->id,
                        'nombres' => $request['nombre2'],
                        'apellidos' => $request['apellido2'],
                        'nombre_empresa' => $request['nombre_empresa2'],
                        'direccion' => $request['direccion2'],
                        'documento' => $request['numero_identificacion2'],
                        'email' => $request['email2'],
                        'telefono' => $request['telefono2'],
                        'ciudad_id' => $request['ciudad_id2'],
                        'comentario' => $request['direccion_adicional2'],
                    ]
                );
            }
        }

        $productos = auth()->user()->carrito->productos;
        $combos = auth()->user()->carrito->combos;

        $packer = new Packer();
        $mediosTransporte = \App\Models\MedioTransporte::all();
        foreach ($mediosTransporte as $medio) {
            $packer->addBox(new TestBox(
                $medio->id,
                $medio->ancho,
                $medio->alto,
                $medio->largo,
                0,
                $medio->ancho,
                $medio->alto,
                $medio->largo,
                $medio->peso
            ));
        }

        $pedido =  \App\Models\Pedido::create([
            'numero' => 0,
            'user_id' => auth()->user()->id,
            'estado_pedido_id' => 1,
            'total' => 0
        ]);

        $pedido->nombre = $request['nombre_facturacion'];
        $pedido->apellido = $request['apellido_facturacion'];
        $pedido->nombre_empresa = $request['nombre_empresa_facturacion'];
        $pedido->numero_identificacion = $request['numero_identificacion_facturacion'];
        $pedido->direccion = $request['direccion_facturacion'];
        $pedido->direccion_adicional = $request['direccion_adicional_facturacion'];
        $pedido->ciudad_id = $request['ciudad_id_facturacion'];
        $pedido->email = $request['mail_facturacion'];
        $pedido->telefono = $request['telefono_facturacion'];
        $pedido->comentario = $request['comentario'];

        if (isset($request['envio_diferente'])) {
            $pedido->nombre_envio = $request['nombre2'];
            $pedido->apellido_envio = $request['apellido2'];
            $pedido->nombre_empresa_envio = $request['nombre_empresa2'];
            $pedido->numero_identificacion_envio = $request['numero_identificacion2'];
            $pedido->direccion_envio = $request['direccion2'];
            $pedido->direccion_adicional_envio = $request['direccion_adicional2'];
            $pedido->ciudad_envio_id = $request['ciudad_id2'];
            $pedido->email_envio = $request['email2'];
            $pedido->telefono_envio = $request['telefono2'];
        } else {
            $pedido->nombre_envio = $request['nombre_facturacion'];
            $pedido->apellido_envio = $request['apellido_facturacion'];
            $pedido->nombre_empresa_envio = $request['nombre_empresa_facturacion'];
            $pedido->numero_identificacion_envio = $request['numero_identificacion_facturacion'];
            $pedido->direccion_envio = $request['direccion_facturacion'];
            $pedido->direccion_adicional_envio = $request['direccion_adicional_facturacion'];
            $pedido->ciudad_envio_id = $request['ciudad_id_facturacion'];
            $pedido->email_envio = $request['mail_facturacion'];
            $pedido->telefono_envio = $request['telefono_facturacion'];
        }


        $total = 0;
        $ahorrado = 0;
        $iva1 = 0;
        $iva2 = 0;

        foreach ($productos as $producto) {
            $total += $producto->menorPrecio() * $producto->pivot->cantidad;
            $iva1 += $producto->precio * 0.19;

            if ($producto->tieneDescuento()) {
                // $ahorrado += ($producto->precio - $producto->menorPrecio()) * $producto->pivot->cantidad;
            }

            $pedido->productos()->attach($producto->id, [
                'precio' => $producto->menorPrecio(),
                'cantidad' => $producto->pivot->cantidad
            ]);

            $packer->addItem(new TestItem(
                $producto->nombre,
                $producto->ancho ?? 1000,
                $producto->alto ?? 1000,
                $producto->largo ?? 1000,
                $producto->peso ?? 1000,
                false
            ), $producto->pivot->cantidad);
        }

        foreach ($combos as $combo) {
            $total += $combo->menorPrecio() * $combo->pivot->cantidad;
            $iva2 += $combo->precio * 0.19;
            
            $pedido->combos()->attach($combo->id, [
                'precio' => $combo->menorPrecio(),
                'cantidad' => $combo->pivot->cantidad
            ]);

            foreach ($combo->productos as $prodComb) {
                $packer->addItem(new TestItem(
                    $prodComb->nombre,
                    $prodComb->ancho ?? 1000,
                    $prodComb->alto ?? 1000,
                    $prodComb->largo ?? 1000,
                    $prodComb->peso ?? 1000,
                    false
                ), $combo->pivot->cantidad);
            }
        }

        $packedBoxes = $packer->pack();

        $medioSeleccionado = null;
        foreach ($packedBoxes as $packedBox) {
            $boxType = $packedBox->getBox(); // your own box object, in this case TestBox
            $medioSeleccionado = \App\Models\MedioTransporte::find($boxType->getReference());
            $packedItems = $packedBox->getItems();
        }

        $pedido->envio = $medioSeleccionado->precio;
        $pedido->medio_transporte_id = $medioSeleccionado->id;

        $subtotal = $total;
        $iva = $iva1 + $iva2;
        $sub = $subtotal;

        // dd($total);

        $cupon = 0;
        if (auth()->user()->carrito->cupon_id) {
            $cupon = auth()->user()->carrito->cupon;
            if ($cupon->descuento_dinero != 0.0) {
                $precio = $cupon->descuento_dinero;
                $sub = $subtotal;
                
                $descuento = $sub - $precio;
                $iva =  $descuento * 0.19;

                $total = $descuento +$iva;

                // $total -= $cupon->descuento_dinero;
                $cupon = $cupon->descuento_dinero;
            } elseif ($cupon->descuento_porcentaje != 0.0) {
                $desc = ($sub * $cupon->descuento_porcentaje) ;
                $cupon = $desc / 100;
                $descuento = $sub - $cupon;
                $iva =  $descuento * 0.19;
                // dd($cupon);
                $total = $descuento + $iva;

            }
            $pedido->cupon_descuento = $cupon;
            $pedido->cupon_id = auth()->user()->carrito->cupon_id;

            $conocer_cupouser = CuponUsuario::where('id_user', auth()->user()->id)
                ->where('id_cupon', $pedido->cupon_id)
                ->first();

            // dd($conocer_cupouser);

            if( $conocer_cupouser !=  null ){}
            else {
                // Se añade el cupon a la tabla cupon usuario
                $cuponuser = CuponUsuario::create([
                    "id_user" => auth()->user()->id,
                    "id_cupon" => $pedido->cupon_id
                ]);
                $cuponuser->save();
            }
        }

        
        // Suma el envío
        $total += $medioSeleccionado->precio;
        // dd($total);

        $pedido->total = $total;
        $pedido->save();

        $response = Mail::to('mercadeo@sumy.com.co')->send(new NotificacionPedido($pedido->id));
        // $response = Mail::to('danielarcos2011@gmail.com')->send(new NotificacionPedido($pedido->id));

        // $cadena = <Referencia><Monto><Moneda><SecretoIntegridad>
        $WOMPI_INTEGRIDAD = 'test_integrity_1Kvy3S6BcOM73ZFiQ3XvIkNly5OP11zt';

        $cadena = $pedido->id . ($total * 100) . "COP" . $WOMPI_INTEGRIDAD;
        
        // dd($WOMPI_INTEGRIDAD);

        $signature = hash("sha256", $cadena);



        return view('frontend.usuarios.checkout', compact('cupon', 'iva', 'subtotal', 'ahorrado', 'signature', 'pedido'));
        // return redirect('/checkout')->with('status', ['success', "Cupón creado con éxito"]);
    }


    public function checkout()
    {
        $productos = auth()->user()->carrito->productos;
        $combos = auth()->user()->carrito->combos;

        $packer = new Packer();
        $mediosTransporte = \App\Models\MedioTransporte::all();
        foreach ($mediosTransporte as $medio) {
            $packer->addBox(new TestBox(
                $medio->id,
                $medio->ancho,
                $medio->alto,
                $medio->largo,
                0,
                $medio->ancho,
                $medio->alto,
                $medio->largo,
                $medio->peso
            ));
        }

        $pedido =  \App\Models\Pedido::create([
            'numero' => 0,
            'user_id' => auth()->user()->id,
            'estado_id' => 1,
            'total' => 0
        ]);

        $total = 0;
        $ahorrado = 0;
        foreach ($productos as $producto) {
            $total += $producto->menorPrecio() * $producto->pivot->cantidad;
            if ($producto->tieneDescuento()) {
                $ahorrado += ($producto->precio - $producto->menorPrecio()) * $producto->pivot->cantidad;
            }

            $pedido->productos()->attach($producto->id, [
                'precio' => $producto->menorPrecio(),
                'cantidad' => $producto->pivot->cantidad
            ]);

            $packer->addItem(new TestItem(
                $producto->nombre,
                $producto->ancho ?? 1000,
                $producto->alto ?? 1000,
                $producto->largo ?? 1000,
                $producto->peso ?? 1000,
                false
            ), $producto->pivot->cantidad);
        }

        foreach ($combos as $combo) {
            $total += $combo->menorPrecio() * $combo->pivot->cantidad;

            $pedido->combos()->attach($combo->id, [
                'precio' => $combo->menorPrecio(),
                'cantidad' => $combo->pivot->cantidad
            ]);

            foreach ($combo->productos as $prodComb) {
                $packer->addItem(new TestItem(
                    $prodComb->nombre,
                    $prodComb->ancho ?? 1000,
                    $prodComb->alto ?? 1000,
                    $prodComb->largo ?? 1000,
                    $prodComb->peso ?? 1000,
                    false
                ), $combo->pivot->cantidad);
            }
        }

        $packedBoxes = $packer->pack();

        $medioSeleccionado = null;
        foreach ($packedBoxes as $packedBox) {
            $boxType = $packedBox->getBox(); // your own box object, in this case TestBox
            $medioSeleccionado = \App\Models\MedioTransporte::find($boxType->getReference());
            $packedItems = $packedBox->getItems();
        }

        $pedido->envio = $medioSeleccionado->precio;
        $pedido->medio_transporte_id = $medioSeleccionado->id;

        $subtotal = $total;

        $cupon = 0;
        if (auth()->user()->carrito->cupon_id) {
            $cupon = auth()->user()->carrito->cupon;
            if ($cupon->descuento_dinero != 0.0) {
                $total -= $cupon->descuento_dinero;
                $cupon = $cupon->descuento_dinero;
            } elseif ($cupon->descuento_porcentaje != 0.0) {
                $desc = ($total * $cupon->descuento_porcentaje) / 100;
                $total -= $desc;
                $cupon = $desc;
            }
            $pedido->cupon_descuento = $cupon;
            $pedido->cupon_id = auth()->user()->carrito->cupon_id;
        }

        // Suma el envío
        $total += $medioSeleccionado->precio;

        $pedido->total = $total;
        $pedido->save();

        $response = Mail::to('mercadeo@sumy.com.co')->send(new NotificacionPedido($pedido->id));
        // $response = Mail::to('danielarcos2011@gmail.com')->send(new NotificacionPedido($pedido->id));


        // $cadena = <Referencia><Monto><Moneda><SecretoIntegridad>
        // $cadena = $pedido->id . ($total * 100) . "COP" . env('WOMPI_INTEGRIDAD');
        $WOMPI_INTEGRIDAD = 'test_integrity_1Kvy3S6BcOM73ZFiQ3XvIkNly5OP11zt';

        $cadena = $pedido->id . ($total * 100) . "COP" . $WOMPI_INTEGRIDAD;
          
        $signature = hash("sha256", $cadena);


        return view('frontend.usuarios.checkout', compact('productos', 'combos', 'departamentos', 'ciudades', 'direcciones', 'cupon', 'subtotal', 'total', 'ahorrado', 'signature', 'pedido', 'medioSeleccionado'));
    }

    public function direcciones()
    {
        $departamentos = \App\Models\Departamento::all();
        $ciudades = \App\Models\Ciudad::all();

        // $departamentos = \App\Models\Departamento::all();
        // $ciudades = \App\Models\Ciudad::all();

        $direcciones = auth()->user()->direcciones;
        return view('frontend.usuarios.direcciones', compact('direcciones', 'departamentos', 'ciudades'));
    }

    public function detalles()
    {
        $fecha_actual = strtotime(date("Y-m-d"));

        $cupones = \App\Models\Cupon::get();

        foreach ($cupones as $cupon) {
            
            if($cupon->nombre = 'Registro'){
                if(auth()->check()){
                    if(auth()->user()->rol_id == 2){
                        $fecharegistro = auth()->user()->created_at;
                        $fechavencimientocupon_registro = date("Y-m-d",strtotime($fecharegistro."+ 2 months"));;
                        
                        if(strtotime($fechavencimientocupon_registro) < $fecha_actual){
                            $cuponuser = \App\Models\CuponUsuario::create([
                                "id_user" => auth()->user()->id,
                                "id_cupon" => $cupon->id
                            ]);
                        }
                    }
                }
            }else {
                $fechavencimientocupon = strtotime($cupon->vencimiento);

                if( $fechavencimientocupon < $fecha_actual ){
                    $cupon->fill([
                        "estado" => 0
                    ]);
                    $cupon->save();
                }
            }
        }
        
        $ciudades = \App\Models\Ciudad::all();

        return view('frontend.usuarios.detalles', compact('ciudades'));
    }

    public function historialPedidos()
    {
        $coduser = auth()->user()->id;

        // dd($coduser);

        $pedidos = Pedido::where("user_id", $coduser)->orderByDesc('id')->get();

        return view('frontend.usuarios.historial-pedidos', compact('pedidos'));
    }

    public function historialPedidosShow(Pedido $pedido)
    {
        $cadena = $pedido->id.($pedido->total*100)."COP".env('WOMPI_INTEGRIDAD');
        $signature = hash ("sha256", $cadena);
        return view('frontend.usuarios.pedido-show', compact('pedido','signature'));
    }

    public function guardarDetalles(Request $request)
    {
        $usuario = auth()->user();
        $usuario->fill([
            'name' => $request['name'],
            'apellidos' => $request['apellidos'],
            'celular' => $request['celular'],
            'cedula' => $request['cedula'],
            'birthday' => $request['birthday'],
            'id_ciudad' => $request['ciudad'],
            'direccion' => $request['direccion'],
            'forma_pago' => $request['forma_pago']
        ]);
        $usuario->save();

        $ciudades = \App\Models\Ciudad::all();

        return view('frontend.usuarios.detalles', compact('ciudades'));
    }

    public function cambioContrasena(Request $request){
        $msg = '';        
        
        return view('frontend.usuarios.cambio-password', compact('msg'));

    }

    public function cambiarContrasena(Request $request){
        $usuario = auth()->user();

        $password = $request->password;

        // dd($usuario->password);

        if($password != ''){
            if(Hash::check($password, $usuario->password )){

                if($request->newpassword == $request->confirmarnewpassword){
                    $usuario->fill([
                        'password' => Hash::make($request->newpassword),
                    ]);
                    $usuario->save();
    
                    $msg = 'success';
                }
                else {
                    $msg = 'error-new-password';
                }
            }
            else {
                $msg = 'error';
            }
        }
        else {
            $msg = '';
        }
        
        
        return view('frontend.usuarios.cambio-password', compact('msg'));
    }

    public function micuenta(){
        $cupon = \App\Models\Cupon::where('nombre', 'Registro')->first();

        $conocer_cupouser = \App\Models\CuponUsuario::where('id_user', auth()->user()->id)
            ->where('id_cupon', 1)
            ->first();

            // dd($cupon);
            
        if( $conocer_cupouser == null ){
            $tienecupon = true;
            return view('frontend.usuarios.cuenta', compact('cupon', 'tienecupon'));
        }
        else {
            $tienecupon = false;
            return view('frontend.usuarios.cuenta', compact('cupon', 'tienecupon'));
        }
    }
}
