<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| NOTAS SOBRE LAS RUTAS Y MIDDLEWARES
| Tanto para el rol de admin como para cliente se designaron middlewares para acceder
| a las rutas. En el caso del perfil ferretero se podria decir que es un usuario con rol cliente
| pero con rol_user == 3. Cuando el rol_user es igual a 3, se podria decir que puede acceder a
| visualizar los productos, pero se le van a mostrar los valores como si fuera ferretero,
| el resto de las rutas tendran la misma valencia que para rol de cliente.
*/

Route::get('/', [App\Http\Controllers\PwaHomeController::class, 'index'])->name('inicio');
Route::get('/offline', function () {    
    return view('modules/laravelpwa/offline');
});

//
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// // Páginas estáticas
// Route::get('/quienes-somos', function () { return view('frontend.quienes-somos'); });

// Route::get('ayuda', function () { return view('frontend.contacto'); })->name('contacto');

// Route::post('/contactenos', [App\Http\Controllers\ContactoController::class, 'index'])->name('index');

// Route::get('/marcas', [App\Http\Controllers\AtributoController::class, 'marcas'])->name('atributos.marcas');

// Route::get('/como-comprar', function () { return view('frontend.como-comprar'); });

// Route::get('/garantia-sumy', function () { return view('frontend.garantia-sumy'); })->name('garantia-sumy');

// Route::get('/politica-privacidad', function () { return view('frontend.politica-privacidad'); });

// Route::get('/terminos-y-condiciones', function () { return view('frontend.terminos-y-condiciones'); });

// Route::get('/sumy', function () { return view('frontend.sumy'); });

// Route::get('/venta-empresas', [App\Http\Controllers\HomeController::class, 'ventaempresas'])->name('ventaempresas');

// Route::get('/venta-telefonica', [App\Http\Controllers\HomeController::class, 'ventatelefonica'])->name('ventatelefonica');

// Route::get('/ofertas', [App\Http\Controllers\HomeController::class, 'ofertas'])->name('ofertas');

// Route::get('/insuperables', [App\Http\Controllers\HomeController::class, 'insuperables'])->name('insuperables');

// Route::get('/mas-vendido', [App\Http\Controllers\HomeController::class, 'lomasvendido'])->name('lomasvendido');

// Route::get('/novedades', [App\Http\Controllers\HomeController::class, 'novedades'])->name('novedades');

// Route::get('/categorias/filtrar/{categorias}', [App\Http\Controllers\CategoriaController::class, 'filtrar'])->name('categorias.filtrar')->where('categorias', '.*');

// // Route::get('buscar', [App\Http\Controllers\ProductoController::class, 'buscar'])->name('productos.buscar');

// Route::get('/transportadores/crear', [App\Http\Controllers\TransportadorController::class, 'create'])->name('transportadores.create');

// Route::get('/anadirCupon', [App\Http\Controllers\CuponController::class, 'anadirCupon'])->name('productos.anadir-cupon');

// Route::get('/pedidos/cancelar/{pedido}', [App\Http\Controllers\PedidoController::class, 'cancelar'])->name('pedidos.cancelar');

// Route::get('/productos/buscar', [App\Http\Controllers\ProductoController::class, 'buscar'])->name('productos.buscar');



// Route::group(['middleware' => ['auth','esAdmin']], function () {
//     Route::get('/clientes/exportar', [App\Http\Controllers\ClienteController::class, 'exportar'])->name('clientes.exportar');

//     Route::get('/productos/exportar', [App\Http\Controllers\ProductoController::class, 'exportar'])->name('productos.exportar');

    
//     Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
//     Route::get('/clientes', [App\Http\Controllers\ClienteController::class, 'index'])->name('clientes.index');
//     Route::get('/clientes/{cliente}', [App\Http\Controllers\ClienteController::class, 'show'])->name('clientes.show');
//     Route::patch('/clientes/{cliente}/actualizar', [App\Http\Controllers\ClienteController::class, 'actualizar'])->name('clientes.actualizar');

//     Route::get('/categorias', [App\Http\Controllers\CategoriaController::class, 'index'])->name('categorias.index');
//     Route::get('/categorias/crear', [App\Http\Controllers\CategoriaController::class, 'create'])->name('categorias.create');
//     Route::post('/categorias', [App\Http\Controllers\CategoriaController::class, 'store'])->name('categorias.store');
//     Route::get('/categorias/{categoria}/editar', [App\Http\Controllers\CategoriaController::class, 'edit'])->name('categorias.edit');
//     Route::patch('/categorias/{categoria}', [App\Http\Controllers\CategoriaController::class, 'update'])->name('categorias.update');
//     Route::post('imagen-categoria/store', [App\Http\Controllers\CategoriaController::class, 'uploadImage'])->name('imagen-categoria.store');
//     Route::post('imagen-categoria/delete', [App\Http\Controllers\CategoriaController::class, 'deleteImage'])->name('imagen-categoria.delete');

//     Route::get('/etiquetas', [App\Http\Controllers\EtiquetaController::class, 'index'])->name('etiquetas.index');
//     Route::get('/etiquetas/create', [App\Http\Controllers\EtiquetaController::class, 'create'])->name('etiquetas.create');
//     Route::post('/etiquetas', [App\Http\Controllers\EtiquetaController::class, 'store'])->name('etiquetas.store');
//     Route::post('imagen-etiqueta/store', [App\Http\Controllers\EtiquetaController::class, 'uploadImage'])->name('imagen-etiqueta.store');
//     Route::get('/etiquetas/{etiqueta}/editar', [App\Http\Controllers\EtiquetaController::class, 'edit'])->name('etiquetas.edit');
//     Route::post('imagen-etiqueta/delete', [App\Http\Controllers\ProductoController::class, 'deleteImage'])->name('imagen-etiqueta.delete');
//     Route::patch('/etiquetas/{etiqueta}', [App\Http\Controllers\EtiquetaController::class, 'update'])->name('etiquetas.update');

//     Route::get('/atributos', [App\Http\Controllers\AtributoController::class, 'index'])->name('atributos.index');
//     Route::get('/atributos/crear', [App\Http\Controllers\AtributoController::class, 'create'])->name('atributos.create');
//     Route::post('/atributos', [App\Http\Controllers\AtributoController::class, 'store'])->name('atributos.store');
//     Route::get('/atributos/{atributo}/editar', [App\Http\Controllers\AtributoController::class, 'edit'])->name('atributos.edit');
//     Route::patch('/atributos/{atributo}', [App\Http\Controllers\AtributoController::class, 'update'])->name('atributos.update');
//     Route::get('/cargar_atributo/{atributo}', [App\Http\Controllers\AtributoController::class, 'cargar'])->name('atributos.cargar');

//     Route::get('/combos', [App\Http\Controllers\ComboController::class, 'index'])->name('combos.index');
//     Route::get('/combos/crear', [App\Http\Controllers\ComboController::class, 'create'])->name('combos.create');
//     Route::post('/combos', [App\Http\Controllers\ComboController::class, 'store'])->name('combos.store');
//     Route::get('/combos/{combo}/editar', [App\Http\Controllers\ComboController::class, 'edit'])->name('combos.edit');
//     Route::patch('/combos/{combo}', [App\Http\Controllers\ComboController::class, 'update'])->name('combos.update');
//     Route::get('/transportes', [App\Http\Controllers\MedioTransporteController::class, 'index'])->name('transportes.index');

//     Route::get('/productos', [App\Http\Controllers\ProductoController::class, 'index'])->name('productos.index');
//     Route::get('/productos/crear', [App\Http\Controllers\ProductoController::class, 'create'])->name('productos.create');
//     Route::get('/productos/importar', [App\Http\Controllers\ProductoController::class, 'importar'])->name('productos.importar');
//     Route::post('/productos/importarProductos', [App\Http\Controllers\ProductoController::class, 'importarProductos'])->name('productos.importar.store');
//     Route::post('/productos', [App\Http\Controllers\ProductoController::class, 'store'])->name('productos.store');
//     Route::get('/productos/{producto}/editar', [App\Http\Controllers\ProductoController::class, 'edit'])->name('productos.edit');
//     Route::patch('/productos/{producto}', [App\Http\Controllers\ProductoController::class, 'update'])->name('productos.update');
//     Route::get('/productos/{producto}', [App\Http\Controllers\ProductoController::class, 'show'])->name('productos.show');
//     Route::get('/productos/{producto:slug}', [App\Http\Controllers\ProductoController::class, 'show'])->name('productos.show');


//     Route::post('/listadobuscar/buscar', [App\Http\Controllers\ProductoController::class, 'buscar_listado'])->name('productos.listadobuscar');


//     Route::post('imagen-productos-sliders/store', [App\Http\Controllers\ProductoController::class, 'uploadImagesSlider'])->name('imagen-productos-slider.store');
//     Route::post('imagen-productos-sliders/delete', [App\Http\Controllers\ProductoController::class, 'deleteImagesSlider'])->name('imagen-productos-slider.delete');
//     Route::post('imagen-producto/store', [App\Http\Controllers\ProductoController::class, 'uploadImage'])->name('imagen-producto.store');
//     Route::post('imagen-producto/delete', [App\Http\Controllers\ProductoController::class, 'deleteImage'])->name('imagen-producto.delete');
//     Route::get('/cargar_producto/{producto}', [App\Http\Controllers\ProductoController::class, 'cargar'])->name('productos.cargar');

//     Route::get('/cupones', [App\Http\Controllers\CuponController::class, 'index'])->name('cupones.index');
//     Route::get('/cupones/crear', [App\Http\Controllers\CuponController::class, 'create'])->name('cupones.create');
//     Route::post('/cupones', [App\Http\Controllers\CuponController::class, 'store'])->name('cupones.store');
//     Route::get('/cupones/{cupon}/editar', [App\Http\Controllers\CuponController::class, 'edit'])->name('cupones.edit');
//     Route::patch('/cupones/{cupon}', [App\Http\Controllers\CuponController::class, 'update'])->name('cupones.update');
//     Route::get('/cupones/{cupon}', [App\Http\Controllers\CuponController::class, 'show'])->name('cupones.show');

//     Route::get('/sliders', [App\Http\Controllers\SliderController::class, 'index'])->name('sliders.index');
//     Route::get('/sliders/crear', [App\Http\Controllers\SliderController::class, 'create'])->name('sliders.create');
//     Route::post('/sliders', [App\Http\Controllers\SliderController::class, 'store'])->name('sliders.store');
//     Route::get('/sliders/{slider}/editar', [App\Http\Controllers\SliderController::class, 'edit'])->name('sliders.edit');
//     Route::patch('/sliders/{slider}', [App\Http\Controllers\SliderController::class, 'update'])->name('sliders.update');
//     Route::delete('/sliders/destroy/{slider}', [App\Http\Controllers\SliderController::class, 'destroy'])->name('sliders.delete');
//     Route::post('imagen-slider/store', [App\Http\Controllers\SliderController::class, 'uploadImage'])->name('imagen-slider.store');
//     Route::post('imagen-slider/delete', [App\Http\Controllers\SliderController::class, 'deleteImage'])->name('imagen-slider.delete');
    
//     Route::get('/ferreteros', [App\Http\Controllers\FerreteroController::class, 'index'])->name('ferreteros.index');
//     Route::get('/ferreteros/{ferretero}', [App\Http\Controllers\FerreteroController::class, 'show'])->name('ferreteros.show');
//     Route::get('/ferreteros/{ferretero}/editar', [App\Http\Controllers\FerreteroController::class, 'edit'])->name('ferreteros.edit');
//     Route::patch('/ferreteros/{ferretero}', [App\Http\Controllers\FerreteroController::class, 'update'])->name('ferreteros.update');

//     Route::get('/pedidos', [App\Http\Controllers\PedidoController::class, 'index'])->name('pedidos.index');
//     Route::get('/pedidos/ordenesencurso', [App\Http\Controllers\PedidoController::class, 'ordenesencurso'])->name('pedidos.ordenesencurso');
//     Route::get('/buscarpedido', [App\Http\Controllers\PedidoController::class, 'buscarpedido'])->name('pedidos.buscarpedido');
//     Route::patch('/asignardomiciliario/{pedido}', [App\Http\Controllers\PedidoController::class, 'asignardomiciliario'])->name('pedidos.asignardomiciliario');
    
//     Route::get('/transportadores', [App\Http\Controllers\TransportadorController::class, 'index'])->name('transportadores.index');
//     Route::get('/transportadores/{transportador}', [App\Http\Controllers\TransportadorController::class, 'show'])->name('transportadores.show');
//     Route::post('/transportador', [App\Http\Controllers\TransportadorController::class, 'store'])->name('transportadores.store');
//     Route::patch('/transportadores/{transportador}/actualizar', [App\Http\Controllers\TransportadorController::class, 'update'])->name('transportadores.update');

    
//     Route::get('/pedidos/{pedido}', [App\Http\Controllers\PedidoController::class, 'update'])->name('pedidos.update');
//     Route::get('/pedidos_pago/{pedido}', [App\Http\Controllers\PedidoController::class, 'update_pago'])->name('pedidos.update-pago');
//     Route::post('/pedidos_pago/{pedido}', [App\Http\Controllers\PedidoController::class, 'reembolsar_pago'])->name('pedidos.reembolsar-pago');
//     Route::get('/pedidos-update/{pedido}', [App\Http\Controllers\PedidoController::class, 'show'])->name('pedidos.show');

    
//     Route::get('/pedidos_vencimiento', [App\Http\Controllers\PedidoController::class, 'index_vencimiento'])->name('pedidos.pvencimiento');
//     Route::get('/pedidos_vencimientod', [App\Http\Controllers\PedidoController::class, 'index_vencimiento_down'])->name('pedidos.pvencimientod');
//     Route::get('/pedidos_total', [App\Http\Controllers\PedidoController::class, 'index_total'])->name('pedidos.ptotal');
//     Route::get('/pedidos_totald', [App\Http\Controllers\PedidoController::class, 'index_total_down'])->name('pedidos.ptotald');
//     Route::post('/buscarpedidos', [App\Http\Controllers\PedidoController::class, 'buscar'])->name('pedidos.buscar');
// });

// Route::group(['middleware' => ['auth', 'esCliente']], function () {
//     Route::get('/departamentos/{departamento}', [App\Http\Controllers\DepartamentoController::class, 'ciudades'])->name('departamentos.ciudades');

//     Route::get('/anadircarrito', [App\Http\Controllers\ProductoController::class, 'anadirCarrito'])->name('productos.anadir-carrito');
//     Route::get('/productos/eliminarcarrito/{producto}', [App\Http\Controllers\ProductoController::class, 'eliminarCarrito'])->name('productos.eliminar-carrito');
//     Route::get('/productos/favorito/{producto}', [App\Http\Controllers\ProductoController::class, 'favorito'])->name('productos.favorito');
//     Route::get('/productos/{producto:slug}', [App\Http\Controllers\ProductoController::class, 'show'])->name('productos.show');

//     Route::get('/pagos/wompi/respuesta', [App\Http\Controllers\PedidoController::class, 'respuesta'])->name('pedidos.respuesta');
//     Route::get('/pagos/ferretero/respuesta/{pedido}', [App\Http\Controllers\PedidoController::class, 'respuestaFerretero'])->name('pedidos.respuesta-ferretero');
//     Route::get('/pagos/ferretero/respuestacontado/{pedido}', [App\Http\Controllers\PedidoController::class, 'respuestaFerreteroContado'])->name('pedidos.respuesta-ferretero-contado');

//        Route::get('/ferretero', [App\Http\Controllers\Auth\RegisteredUserController::class, 'ferretero'])->name('usuarios.ferretero');
//     Route::post('/ferretero', [App\Http\Controllers\FerreteroController::class, 'store'])->name('usuarios.ferretero.guardar');
//     Route::get('datos-ferretero', function () {
//         return view('frontend.usuarios.cuenta');
//     })->name('ferretero.datos-ferretero');

//     Route::get('/favoritos', [App\Http\Controllers\Auth\RegisteredUserController::class, 'favoritos'])->name('usuarios.favoritos');
//     Route::get('/carrito', [App\Http\Controllers\Auth\RegisteredUserController::class, 'carrito'])->name('usuarios.carrito');
//     Route::post('/carrito/{carrito}', [App\Http\Controllers\CarritoController::class, 'update'])->name('carrito.actualizar');
//     Route::get('/envio', [App\Http\Controllers\Auth\RegisteredUserController::class, 'envio'])->name('usuarios.envio');
//     Route::post('/envio', [App\Http\Controllers\Auth\RegisteredUserController::class, 'envioGuardar'])->name('usuarios.envio-guardar');
//     Route::get('/checkout', [App\Http\Controllers\Auth\RegisteredUserController::class, 'checkout'])->name('usuarios.checkout');
//     Route::get('/direcciones', [App\Http\Controllers\Auth\RegisteredUserController::class, 'direcciones'])->name('usuarios.direcciones');
//     Route::get('/direcciones/{direccion}', [App\Http\Controllers\DireccionController::class, 'cargar'])->name('usuarios.direcciones.cargar');
//     // RUTAS DE DIRECCIONES
//     Route::post('/direcciones/crear/', [App\Http\Controllers\DireccionController::class, 'store'])->name('usuarios.direcciones.store');

//     Route::get('/direcciones/edit/{direccion}', [App\Http\Controllers\DireccionController::class, 'edit'])->name('usuarios.direcciones.edit');
//     Route::patch('/direcciones/update/{direccion}', [App\Http\Controllers\DireccionController::class, 'update'])->name('usuarios.direcciones.update');
//     Route::delete('/direcciones/destroy/{direccion}', [App\Http\Controllers\DireccionController::class, 'destroy'])->name('usuarios.direcciones.destroy');

//     Route::get('/detalles', [App\Http\Controllers\Auth\RegisteredUserController::class, 'detalles'])->name('usuarios.detalles');
//     Route::post('/detalles', [App\Http\Controllers\Auth\RegisteredUserController::class, 'guardarDetalles'])->name('usuarios.detalles.guardar');
//     Route::get('/historial-pedidos', [App\Http\Controllers\Auth\RegisteredUserController::class, 'historialPedidos'])->name('usuarios.pedidos');
//     Route::get('/historial-pedidos/{pedido}', [App\Http\Controllers\Auth\RegisteredUserController::class, 'historialPedidosShow'])->name('usuarios.pedidos.show');

//     Route::get('/cambiocontrasena', [App\Http\Controllers\Auth\RegisteredUserController::class, 'cambiocontrasena'])->name('usuarios.cambiocontrasena');
//     Route::post('/cambiarcontrasena', [App\Http\Controllers\Auth\RegisteredUserController::class, 'cambiarcontrasena'])->name('usuarios.cambiarcontrasena');

//     Route::get('/mi-cuenta', [App\Http\Controllers\Auth\RegisteredUserController::class, 'micuenta'])->name('mi-cuenta');

// });

// Route::get('/categorias/{categorias}', [App\Http\Controllers\CategoriaController::class, 'show'])->name('categorias.show')->where('categorias', '.*');


// Route::get('/atributos/{atributo:slug}', [App\Http\Controllers\AtributoController::class, 'show'])->name('atributos.show')->where('atributo', '.*');
// Route::get('/termino/{atributo:slug}/{termino:slug}', [App\Http\Controllers\TerminoController::class, 'show'])->name('terminos.show');

// Route::get('/combos/{combo:slug}', [App\Http\Controllers\ComboController::class, 'show'])->name('combos.show');


// Route::get('/productos/datos-modal/{producto}', [App\Http\Controllers\ProductoController::class, 'datosModal'])->name('productos.datos-modal');
// Route::get('/combos/datos-modal/{combo}', [App\Http\Controllers\ComboController::class, 'datosModal'])->name('combos.datos-modal');

// Route::get('/etiquetas/{etiqueta}', [App\Http\Controllers\EtiquetaController::class, 'show'])->name('etiquetas.show');

// Route::post('/subscribe', [App\Http\Controllers\SubscribeController::class, 'index'])->name('subscribe.index');
// Route::get('/validaremail', [App\Http\Controllers\TransportadorController::class, 'validaremail'])->name('transportadores.validaremail');

// Route::get('/marcas/marca/{marca}', [App\Http\Controllers\MarcaController::class, 'show'])->name('marcas.show');
