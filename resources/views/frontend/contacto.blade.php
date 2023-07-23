@extends('frontend.layouts.app')

@section('titulo', 'Contacto')

@section('styles')
    <style>
        html {
            scroll-behavior: smooth !important;
        }
        body {
            position: relative;
        }
        .main_active {
            margin-top: -200px;
        }
    </style>
@endsection

@section('content')
    <main id="content" role="main">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Inicio</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Contacto y Ayuda</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->


        <div class="container">

            <div class="my-4 my-xl-8">
                <div class="row cols-ayuda">
                    <div class="col-md-4 text-center mt-5 mb-5">
                        <div class="cont-ayuda">
                            <img src="{{ asset('frontend/assets/images/fav-sumy.png') }}">
                            <h6>Comprar en Sumy.com</h6>
                            <div class="subt-pf">Preguntas frecuentes</div>
                            <ul class="nav1">
                                <li><a href="#hp1s1" class="text-dark" id="menu-hp1s1">¿Cómo puedo hacer un pedido?</a></li>
                                <li><a href="#hp2s1" class="text-dark" id="menu-hp2s1">¿A qué ciudades envían artículos?</a></li>
                                <li><a href="#hp3s1" class="text-dark" id="menu-hp3s1">¿Cuáles son las formas de pago?</a></li>
                                <li><a href="#hp5s1" class="text-dark" id="menu-hp5s1">¿Cómo puedo saber los gastos de envío?</a></li>
                                <li><a href="#hp6s1" class="text-dark" id="menu-hp6s1">¿Cuándo recibiré mi pedido?</a></li>
                                <li><a href="#hp7s1" class="text-dark" id="menu-hp7s1">¿Hay que pagar algo al recibir el pedido?</a></li>
                                <li><a href="#hp4s1" class="text-dark" id="menu-hp4s1">¿Es seguro realizar un pedido on-line?</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 text-center mt-5 mb-5">
                        <div class="cont-ayuda">
                            <img src="{{ asset('frontend/assets/images/fav-sumy.png') }}">
                            <h6>Ya he realizado mi pedido</h6>
                            <div class="subt-pf">Preguntas frecuentes</div>
                            <ul class="nav1">
                                <li><a href="#hp1s2" class="text-dark" id="menu-hp1s2">¿Se enviará mi pedido si hay algún artículo sin stock?</a></li>
                                <li><a href="#hp2s2" class="text-dark" id="menu-hp2s2">¿Cómo puedo cancelar mi pedido?</a></li>
                                <li><a href="#hp3s2" class="text-dark" id="menu-hp3s2">¿Puedo añadir un artículo a un pedido abierto?</a></li>
                                <li><a href="#hp4s2" class="text-dark" id="menu-hp4s2">¿Puedo saber el estado de mi pedido online?</a></li>
                                <li><a href="#hp5s2" class="text-dark" id="menu-hp5s2">¿Cuánto tardará mi pedido en llegar?</a></li>
                                <li><a href="#hp6s2" class="text-dark" id="menu-hp6s2">¿Qué pasa si no estoy en casa cuándo mi paquete ha llegado?</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 text-center mt-5 mb-5">
                        <div class="cont-ayuda">
                            <img src="{{ asset('frontend/assets/images/fav-sumy.png') }}">
                            <h6>Ya he recibido mi pedido</h6>
                            <div class="subt-pf">Preguntas frecuentes</div>
                            <ul class="nav1">
                                <li><a href="#hp1s3" class="text-dark" id="menu-hp1s3">¿Por qué motivos puedo devolver un artículo?</a></li>
                                <li><a href="#hp2s3" class="text-dark" id="menu-hp2s3">¿Hay algún artículo en particular que no pueda devolver?</a></li>
                                <li><a href="#hp3s3" class="text-dark" id="menu-hp3s3">¿Cómo puedo devolver un producto? ¿Puedo cambiarlo por otro?</a></li>
                                <li><a href="#hp4s3" class="text-dark" id="menu-hp4s3">¿Qué debo hacer si he recibido un artículo erróneo?</a></li>
                                <li><a href="#hp5s3" class="text-dark" id="menu-hp5s3">¿Cómo debo preparar el paquete de devolución?</a></li>
                                <li><a href="#hp6s3" class="text-dark" id="menu-hp6s3">¿Cómo recibiré mi reembolso?</a></li>
                            </ul>
                        </div>
                    </div>  
                </div>
            </div>

            <div class="row mb-10">
                <div class="col-lg-7 col-xl-6 mb-8 mb-lg-0">
                    <div class="mr-xl-6">
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title mb-0 pb-2 font-size-25">Déjanos un mensaje</h3>
                        </div>
                        <p class="max-width-830-xl text-gray-90">
                        Resuelve tus dudas, envíanos tus comentarios y/o sugerencias, uno de nuestros asesores te atenderá en el menor tiempo posible!
                        </p>
                        <form class="js-validate" novalidate="novalidate" action="/contactenos" method="post" >
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-4">
                                        <label class="form-label">
                                            Nombres
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="firstName" placeholder="" aria-label="" required="" data-msg="Please enter your frist name." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-4">
                                        <label class="form-label">
                                            Email
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="email" placeholder="" aria-label="" required="" data-msg="Please enter your last name." data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-12">
                                    <!-- Input -->
                                    <div class="js-form-message mb-4">
                                        <label class="form-label">
                                            Tema
                                        </label>
                                        <input type="text" class="form-control" name="Subject" placeholder="" aria-label="" data-msg="Please enter subject." data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <!-- End Input -->
                                </div>
                                <div class="col-md-12">
                                    <div class="js-form-message mb-4">
                                        <label class="form-label">
                                            Mensaje
                                        </label>

                                        <div class="input-group">
                                            <textarea class="form-control p-5" rows="4" name="text" placeholder=""></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary-dark-w px-5">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-6">
                    <div class="mb-6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127450.08829203268!2d-76.6693584492385!3d3.395225124390289!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e30a6f0cc4bb3f1%3A0x1f0fb5e952ae6168!2sCali%2C%20Valle%20del%20Cauca%2C%20Colombia!5e0!3m2!1sen!2sin!4v1674581076135!5m2!1sen!2sin" width="100%" height="288" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="border-bottom border-color-1 mb-5">
                                <h3 class="section-title mb-0 pb-2 font-size-25">Dirección</h3>
                            </div>
                            <address class="mb-6 text-lh-23">
                                Cl 13 # 45-07 av. Pasoancho Cali –Valle
                            </address>
                        </div>
                        <div class="col-md-6">
                            <div class="border-bottom border-color-1 mb-5">
                                <h3 class="section-title mb-0 pb-2 font-size-25">Teléfonos</h3>
                            </div>
                            <address class="mb-6 text-lh-23">
                                <div class=""><strong>Fijo:</strong> <i class="fa fa-phone"></i> <a href="tel:6023359971">(602) 335 9971</a> </div>
                                <div class=""><strong>Celular:</strong> <i class="fa fa-mobile"></i> <a href="tel:3028683818">302 868 3818</a> </div>
                                <div class=""><strong>Whatsapp:</strong> <i class="fa fa-whatsapp"></i> <a href="https://wa.me/573118099969" target="_blank">311 809 9969</a> </div>  
                            </address>
                        </div>
                    </div>    
                </div>
            </div>
            
            <div class="accordion acordeon-ayuda mt-5 mb-5" id="seccionAyuda1" style="margin-top: 90px !important">

                <h4><strong>Preguntas frecuentes:</strong> Realizando el pedido</h4>

                <div class="card" id="hp1s1" data-offset-top="400">
                    <div class="card-header" >
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#p1s1" aria-expanded="true" aria-controls="p1s1">
                                ¿Cómo puedo hacer un pedido?
                            </button>
                        </h2>
                    </div>

                    <div id="p1s1" class="collapse" aria-labelledby="hp1s1" data-parent="#seccionAyuda1">
                        <div class="card-body">
                            Lo primero es encontrar lo que estás buscando, para esto puedes utilizar el menú de la tienda, que te permitirá navegar por categorías de productos y por marcas o usar el buscador que hemos desarrollado para que puedas encontrar rápidamente los artículos que quieres comprar. En caso de que tengas la referencia de producto también puedes introducirlo en el buscador para encontrar más rápidamente el artículo.
                            <br><br>Cuando encuentres el artículo que estabas buscando, das clic al botón AÑADIR AL CARRITO. Puedes hacerlo desde la tabla de visualización de productos (verás que cada producto muestra la opción de "añadir al carrito ") o bien desde dentro de la página con los detalles del artículo. Cuando estés en la página de la cesta de compra, verás la lista de los artículos que has añadido y sus cantidades y precios. Desde la propia cesta de la compra podrás realizar cambios, como, por ejemplo, cambiar la cantidad de un artículo, o eliminar un artículo de tu cesta. Si deseas seguir comprando solo tienes que usar el buscador.
                            <br><br>Una vez que hayas añadido a la cesta de compra todos los artículos que deseas, deberás hacer clic en el botón PROCEDER CON LA COMPRA para poner en marcha el proceso final de compra. En la siguiente página deberás rellenar el "Formulario de Facturación y Envío".
                            <br><br>Si ya has realizado una compra en nuestro portal, sólo debes asegurarte de que tus datos personales y de envío son correctos, puesto que ya están registrados en nuestra base de datos. Ahora bien, también tienes la opción de enviar el pedido a una dirección diferente, para esto das clic en la opción ¿Enviar A Una Dirección Diferente? Y rellenas el formulario que incluye: nombre, dirección, departamento, ciudad (selecciona una población de la lista desplegable), teléfono de contacto, comentarios y das clic en crear dirección. Si quieres conocer nuestra política de protección de datos y tus derechos en relación con los datos que nos proporcionas, haz clic aquí.
                            <br><br>Si eres un nuevo cliente, al finalizar el pedido debes rellenar el "Formulario de Facturación y Envío", que incluye: nombre, apellidos, razón social, dirección, departamento y ciudad (selecciona una población de la lista desplegable) teléfono de contacto y tu email. Después de haber introducido tus datos personales, haz clic en el botón SIGUIENTE para escoger la forma de envío si estas en la ciudad de Cali. 
                            <br><br>Envío xpress, este solo aplica para la ciudad de Cali y se habilita solo si tu pedido cumple con características de dimensiones y peso que permitan llevar el pedido en motocicleta, tiene un costo fijo que se te informa en el formulario y se demora solo 3 horas en llegar, también puedes programar el día de entrega y rango de horario en que deseas recibirlo. 
                            <br><br>En todo caso no te debes desplazar tu pedido llegara a domicilio, te mostraremos los costes del envío, que calculamos en cada pedido en función de sus dimensiones y peso y te diremos cuál es el plazo de entrega estimado. Fácil, ¿verdad? En esta misma pantalla podrás elegir la forma de pago. Una vez hayas completado toda la información (datos personales y de envío + forma de pago), te aparecerá automáticamente en pantalla la confirmación de tu pedido y te enviaremos un email de confirmación con todos los detalles de la compra que acabas de realizar.

                        </div>
                    </div>
                </div>

                <div class="card" id="hp2s1">
                    <div class="card-header">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#p2s1" aria-expanded="false" aria-controls="p2s1">
                                ¿A qué ciudades envían artículos?
                            </button>
                        </h2>
                    </div>
                    <div id="p2s1" class="collapse" aria-labelledby="hp2s1" data-parent="#seccionAyuda1">
                        <div class="card-body">
                            De momento solo enviamos artículos a Colombia, en las ciudades principales como Cali, Bogotá, Medellín, Cartagena….
                        </div>
                    </div>
                </div>

                <div class="card" id="hp3s1">
                    <div class="card-header" >
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#p3s1" aria-expanded="false" aria-controls="p3s1">
                                ¿Cuáles son las formas de pago?
                            </button>
                        </h2>
                    </div>
                    <div id="p3s1" class="collapse" aria-labelledby="hp3s1" data-parent="#seccionAyuda1">
                        <div class="card-body">
                            Tenemos actualmente cuatro formas de pago:<br><br>
                            <ul>
                                <li>Tarjetas de crédito y débito Visa, MasterCard, y Amex. Pago con tus tarjetas de crédito y débito Visa, Mastercard, y American Express de manera segura y rápida.</li>
                                <li>Cuentas de Bancolombia. Si tienes cuenta en Bancolombia puedes realizar el pago directamente en la plataforma de wompi mas fácil y seguro.</li>
                                <li>Pagos con Nequi. Paga con la aplicación de Nequi desde tu celular en pocos pasos con tu dinero digital de tu cuenta de Nequi.</li>
                                <li>Pagos PSE. Paga con cualquier cuenta habilitada para realzar pagos por PSE. Debes tener la cuenta inscrita para poder pagar con el botón de PSE.</li>
                            </ul>
                            Toda la tienda sumy.com está desarrollada en un entorno seguro y cifrado. Para ello se utilizamos el sistema de seguridad 'Secure Socket Layer' (SSL), que permite cifrar la información que circula en la red.
                        </div>
                    </div>
                </div>
                
                <div class="card" id="hp5s1">
                    <div class="card-header" >
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#p5s1" aria-expanded="false" aria-controls="p5s1">
                                ¿Cómo puedo saber los gastos de envío?
                            </button>
                        </h2>
                    </div>
                    <div id="p5s1" class="collapse" aria-labelledby="hp5s1" data-parent="#seccionAyuda1">
                        <div class="card-body">
                            En ciudad de Cali, los gastos serán gratuitos en pedidos a partir de ciento cincuenta mil pesos ($150.000) incluido IVA. En caso de que el importe del pedido sea inferior a ciento cincuenta mil pesos ($150.000), o su destino sea otra ciudad diferente a Cali, se cobrarán gastos de envío a partir de $3.000 (Incluido IVA), pudiendo aumentar el costo del transporte dependiendo del volumen y peso de los productos que has comprado. Te lo indicaremos, en ese caso.
                        </div>
                    </div>
                </div>

                <div class="card" id="hp6s1">
                    <div class="card-header" >
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#p6s1" aria-expanded="false" aria-controls="p6s1">
                                ¿Cuándo recibiré mi pedido?
                            </button>
                        </h2>
                    </div>
                    <div id="p6s1" class="collapse" aria-labelledby="hp6s1" data-parent="#seccionAyuda1">
                        <div class="card-body">
                            La promesa general de entrega de un producto adquirido a través de esta página web será de tres (3) a siete (7) días hábiles, que comenzarán a contar a partir del día siguiente a la generación de facturación. No obstante, ante circunstancias imprevistas, ajenas a la voluntad de CHRISTIAN CAMILO NARVAEZ-SUMY se llegasen a presentar retrasos en las entregas, tales circunstancias serán informadas telefónicamente o por vía electrónica al comprador.
                            <br><br>En el caso de realizar la compra con opción de envío “Express” la promesa de entrega será de 1 día hábil que comenzarán a contar a partir del día siguiente a la generación de facturación, lo cual solo aplica en las ciudades que se encuentre habilitado este servicio. Durante el periodo de rebajas o temporada los pedidos pueden tardar un poco más en ser procesados. Para los pedidos realizados en alguno de estos días, o el día anterior a un festivo, el tiempo de entrega se ampliará en 1 o 2 jornadas hábiles extra.
                        </div>
                    </div>
                </div>

                <div class="card" id="hp7s1">
                    <div class="card-header">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#p7s1" aria-expanded="false" aria-controls="p7s1">
                                ¿Hay que pagar algo al recibir el pedido?
                            </button>
                        </h2>
                    </div>
                    <div id="p7s1" class="collapse" aria-labelledby="hp7s1" data-parent="#seccionAyuda1">
                        <div class="card-body">
                            Nunca. Todos los gastos serán indicados en tu carrito de compra antes de finalizar el pedido e incluirán también los gastos de envío e impuestos. 
                        </div>
                    </div>
                </div>

                <div class="card" id="hp4s1">
                    <div class="card-header">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#p4s1" aria-expanded="true" aria-controls="p4s1">
                                ¿Es seguro realizar un pedido on-line?
                            </button>
                        </h2>
                    </div>

                    <div id="p4s1" class="collapse" aria-labelledby="hp4s1" data-parent="#seccionAyuda1">
                        <div class="card-body">
                            Totalmente. Todas las compras que realices en nuestra tienda on-line son 100% seguras.<br><br>
                            www.sumy.com dedica su máxima atención a la seguridad de su plataforma de comercio electrónico y especialmente a la seguridad del pago por Internet. En el momento del pago, tus datos bancarios están protegidos y encriptados por la tecnología más avanzada gracias al protocolo SSL (Secure Socket Layer). Pagar en la tienda on-line de "sumy.com" es mucho más seguro que cuando entregas tu tarjeta de crédito en una tienda, un restaurante, un peaje o una gasolinera, por ejemplo. Además, y para aumentar al máximo la seguridad, no almacenamos ningún dato relativo a la tarjeta de crédito con la que realizas el pago.
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion acordeon-ayuda mt-6 mb-5" id="seccionAyuda2">

                <h4><strong>Preguntas frecuentes:</strong> Envío de mi pedido</h4>

                <div class="card" id="hp1s2">
                    <div class="card-header">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#p1s2" aria-expanded="true" aria-controls="p1s2">
                                ¿Se enviará mi pedido si hay algún artículo sin stock?
                            </button>
                        </h2>
                    </div>

                    <div id="p1s2" class="collapse" aria-labelledby="hp1s2" data-parent="#seccionAyuda2">
                        <div class="card-body">
                            Si en el momento de preparar el paquete, encontramos un error de stock, actuaremos de la siguiente forma: te lo comunicaremos por correo electrónico, te enviaremos los artículos que tengamos y te realizaremos el abono del artículo que falta en el mismo método de pago utilizado en la compra.
                            <br><br>Si por el motivo que fuese ya no te interesase el pedido al no estar completo podrás devolverlo y, en este caso, nosotros correremos con los costes de devolución.
                        </div>
                    </div>
                </div>

                <div class="card" id="hp2s2">
                    <div class="card-header" >
                            <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#p2s2" aria-expanded="false" aria-controls="p2s2">
                                ¿Cómo puedo cancelar mi pedido?
                            </button>
                        </h2>
                    </div>
                    <div id="p2s2" class="collapse" aria-labelledby="hp2s2" data-parent="#seccionAyuda2">
                        <div class="card-body">
                            Una vez se ha formalizado tu pedido y te hemos enviado el correo electrónico de confirmación del pedido, no hay posibilidad de cancelarlo. La única opción en ese caso es la siguiente:
                            <br><br>Cualquier devolución, deberás tramitarla desde la opción “ayuda con la compra” que hay en cada pedido, dentro del apartado historial de pedidos en MI CUENTA. A partir de ese momento, te guiaremos sobre cómo realizar la cancelación. 
                            <br><br>Deberás tener en cuenta que los costes de devolución van siempre a cargo del Cliente excepto en las siguientes situaciones, en las que nosotros nos haremos cargo de ellos:
                            <ul>
                                <li>Productos incluidos por equivocación en el envío, o envío de pedido incompleto.</li>
                                <li>Productos defectuosos.</li>
                                <li>Productos dañados.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card" id="hp3s2">
                    <div class="card-header">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#p3s2" aria-expanded="false" aria-controls="p3s2">
                                ¿Puedo añadir un artículo a un pedido abierto?
                            </button>
                        </h2>
                    </div>
                    <div id="p3s2" class="collapse" aria-labelledby="hp3s2" data-parent="#seccionAyuda2">
                        <div class="card-body">
                            Para añadir un nuevo artículo en tu carrito de compra escribe la cantidad que deseas desde la página de detalle del producto y a continuación haz clic al botón AÑADIR AL CARRITO. Si deseas cambiar la cantidad de cualquier producto de tu carrito de compra, utiliza los botones - / +. Verás que el precio del artículo cambiará proporcionalmente.
                            <br><br>Para seguir comprando solo tienes que usar el buscador. El carrito de compra te recuerda los artículos que has elegido. Puedes buscar cualquier otro artículo sin perder el contenido de tu carrito de compra. Cuando hayas acabado con la compra, haz clic en el botón PROCEDER CON LA COMPRA
                        </div>
                    </div>
                </div>
                
                <div class="card" id="hp4s2">
                    <div class="card-header">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#p4s2" aria-expanded="true" aria-controls="p4s2">
                                ¿Puedo saber el estado de mi pedido online?
                            </button>
                        </h2>
                    </div>

                    <div id="p4s2" class="collapse" aria-labelledby="hp4s2" data-parent="#seccionAyuda2">
                        <div class="card-body">
                            Sin duda. En cualquier momento puedes consultar el estado de tu pedido en el apartado MI CUENTA.
                            <br><br>Además, cada vez que tu pedido cambie de estado (en preparación, enviado, disponible para recoger en tienda y entregado), te enviaremos un correo electrónico para que sepas, en todo momento, en qué situación se encuentra. En el correo que te notifica el envío incluiremos un enlace con el que podrás hacer el seguimiento del paquete y ver el estado de envío de tu pedido.
                        </div>
                    </div>
                </div>

                <div class="card" id="hp5s2">
                    <div class="card-header">
                            <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#p5s2" aria-expanded="false" aria-controls="p5s2">
                                ¿Cuánto tardará mi pedido en llegar?
                            </button>
                        </h2>
                    </div>
                    <div id="p5s2" class="collapse" aria-labelledby="hp5s2" data-parent="#seccionAyuda2">
                        <div class="card-body">
                            La promesa general de entrega de un producto adquirido a través de esta página web será de tres (3) a siete (7) días hábiles, que comenzarán a contar a partir del día siguiente a la generación de facturación. No obstante, ante circunstancias imprevistas, ajenas a la voluntad de CHRISTIAN CAMILO NARVAEZ-SUMY se llegasen a presentar retrasos en las entregas, tales circunstancias serán informadas telefónicamente o por vía electrónica al comprador.
                            <br><br>En el caso de realizar la compra con opción de envío “Express” la promesa de entrega será de 1 día hábil que comenzarán a contar a partir del día siguiente a la generación de facturación, lo cual solo aplica en las ciudades que se encuentre habilitado este servicio. Durante el periodo de rebajas o temporada los pedidos pueden tardar un poco más en ser procesados. Para los pedidos realizados en alguno de estos días, o el día anterior a un festivo, el tiempo de entrega se ampliará en 1 o 2 jornadas hábiles extra.
                            <br><br>La venta estará sujeta a disponibilidad del inventario, si al realizar el alistamiento del producto no hay disponibilidad del mismo SUMY se comunicará contigo para resolver la situación.
                        </div>
                    </div>
                </div>

                <div class="card" id="hp6s2">
                    <div class="card-header">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#p6s2" aria-expanded="false" aria-controls="p6s2">
                                ¿Qué pasa si no estoy en casa cuándo mi paquete ha llegado?
                            </button>
                        </h2>
                    </div>
                    <div id="p6s2" class="collapse" aria-labelledby="hp6s2" data-parent="#seccionAyuda2">
                        <div class="card-body">
                            En el evento en que se visite el domicilio del comprador y no logré hacerse la entrega del pedido porque él o su autorizado no se encontraban presentes, podrá reprogramarse el nuevo envío, previa comunicación telefónica con el comprador para notificar la novedad y coordinar la nueva entrega, si el cliente no se encuentra y hay que reprogramar una tercera entrega, esta entrega tendrá un costo adicional igual al costo de transporte cobrado en la factura. Para cancelar este valor el cliente deberá comunicarse a la línea telefónica 602 335 9971 Servicio al Cliente.
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion acordeon-ayuda mt-6 mb-5" id="seccionAyuda3">
                <h4><strong>Preguntas frecuentes:</strong> Devoluciones y reembolsos</h4>

                <div class="card" id="hp1s3">
                    <div class="card-header">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#p1s3" aria-expanded="true" aria-controls="p1s3">
                                ¿Por qué motivos puedo devolver un artículo?
                            </button>
                        </h2>
                    </div>

                    <div id="p1s3" class="collapse" aria-labelledby="hp1s3" data-parent="#seccionAyuda3">
                        <div class="card-body">
                            Por supuesto, puedes devolver tu pedido en cualquier caso en que haya un error por nuestra parte, como en los casos de:<br>
                            <ul>
                                <li>Productos incluidos por equivocación en el envío, o envío de pedido incompleto.</li>
                                <li>Productos defectuosos.</li>
                                <li>Productos dañados.</li>
                            </ul>
                            En esos supuestos, todos los costes de la devolución son de nuestra cuenta exclusivamente, sin ningún cargo para ti, y procederemos a devolverte tu dinero cuanto antes en el mismo método de pago utilizado en la compra. 
                            <br><br>El plazo del que dispone para ejercer tu derecho al desistimiento y comunicarnos su voluntad de desistir de la compra es, como máximo, 5 días hábiles contados desde el día de la recepción del pedido para hacer reclamos sobre faltantes, cantidades y averías.  No lo olvides, ya que no podremos admitir desistimientos que no respeten este plazo. Por favor, ten en cuenta también que este plazo viene determinado por la LEY; DERECHO DE RETRACTO (www.sic.gov.co), por lo que, en caso de futura modificación de la Ley, el plazo de desistimiento y demás condiciones aplicables a éste se entenderán adecuados a dicho cambio si tu pedido es posterior a la vigencia del cambio.
                            <br><br>Importante, los productos que quiera devolver no podrán haber sido utilizados (ser nuevos) y deberán estar en perfectas condiciones, el producto debe estar en su empaque original, no se acepta que el empaque se encuentre dañado, rasgado y/o rayado y debe contar con todos sus accesorios y documentación (libro de instrucciones, etc.). sólo aplica la garantía por daños de fabricación y no por el mal uso, instalación del mismo y/o por eventos naturales catastróficos.
                        </div>
                    </div>
                </div>

                <div class="card" id="hp2s3">
                    <div class="card-header">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#p2s3" aria-expanded="false" aria-controls="p2s3">
                                ¿Hay algún artículo en particular que no pueda devolver?
                            </button>
                        </h2>
                    </div>
                    <div id="p2s3" class="collapse" aria-labelledby="hp2s3" data-parent="#seccionAyuda3">
                        <div class="card-body">
                            Por norma general, puedes ejercer tu derecho legal de desistimiento respecto de todos los productos que puedes comprar por medio de nuestra tienda on-line. Sin embargo, existen excepciones, como destacamos a continuación.
                            <br><br>IMPORTANTE: Excepciones al derecho de desistimiento: Conforme a lo previsto por la Ley, no aplica el derecho de desistimiento en los siguientes casos:
                            <ul>
                                <li>En los contratos de suministro de bienes confeccionados conforme a las especificaciones del consumidor o claramente personalizados</li>
                                <li>En los contratos de suministro de bienes que, por su naturaleza, no puedan ser devueltos o puedan deteriorarse o caducar con rapidez.</li>
                            </ul>
                            Por lo anterior no se aceptan devoluciones ni cambios de productos sobre pedido, diseñados, cortados o elaborados a la medida o bajo especificaciones particulares, así como de pinturas, polvos y solventes, productos descontinuados, de baja rotación y que no hayan sido comercializados por la empresa.
                            <br><br>En el caso de que exista duda sobre el tipo de producto a devolver y/o el estado en el que se realiza la devolución, siempre prevalecerá el criterio de nuestros especialistas en ferretería, previa inspección y verificación del/los producto/s.
                        </div>
                    </div>
                </div>

                <div class="card" id="hp3s3">
                    <div class="card-header">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#p3s3" aria-expanded="false" aria-controls="p3s3">
                                ¿Cómo puedo devolver un producto? ¿Puedo cambiarlo por otro?
                            </button>
                        </h2>
                    </div>
                    <div id="p3s3" class="collapse" aria-labelledby="hp3s3" data-parent="#seccionAyuda3">
                        <div class="card-body">
                            Cualquier devolución, deberás tramitarla desde la opción “ayuda con la compra” que hay en cada pedido, dentro del apartado historial de pedidos en MI CUENTA. A partir de ese momento, te guiaremos sobre cómo realizar la cancelación. 
                            <br><br>Deberás tener en cuenta que los costes de devolución van siempre a cargo del Cliente excepto en las siguientes situaciones, en las que nosotros nos haremos cargo de ellos:
                            <ul>
                                <li>Productos incluidos por equivocación en el envío, o envío de pedido incompleto.</li>
                                <li>Productos defectuosos.</li>
                                <li>Productos dañados.</li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
                
                <div class="card" id="hp4s3">
                    <div class="card-header">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#p4s3" aria-expanded="true" aria-controls="p4s3">
                                ¿Qué debo hacer si he recibido un artículo erróneo?
                            </button>
                        </h2>
                    </div>

                    <div id="p4s3" class="collapse" aria-labelledby="hp4s3" data-parent="#seccionAyuda3">
                        <div class="card-body">
                            El equipo de "sumy.com" hace todo lo posible para asegurarse de que recibas todos los artículos que has pedido y que los recibas en perfectas condiciones. Sin embargo, si recibes un artículo que no es el que has pedido o si éste es defectuoso o tiene cualquier daño, o tu pedido está incompleto y optas por devolverlo, por favor, tramita su devolución, según lo indicado. Si se produjese esta situación nosotros correríamos con los gastos de devolución del artículo equivocado.
                        </div>
                    </div>
                </div>
                <div class="card" id="hp5s3">
                    <div class="card-header">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#p5s3" aria-expanded="false" aria-controls="p5s3">
                                ¿Cómo debo preparar el paquete de devolución?
                            </button>
                        </h2>
                    </div>
                    <div id="p5s3" class="collapse" aria-labelledby="hp5s3" data-parent="#seccionAyuda3">
                        <div class="card-body">
                            Has de preparar un nuevo paquete, pegando la etiqueta de devolución (que se habilitará en tu perfil MI CUENTA, después de solicitar la devolución), en el exterior del paquete. Por favor, no pegues cellos ni pegatinas en la caja original de los productos. La caja original debe protegerse con un embalaje externo o caja para evitar daños durante el transporte. Por favor, envíanos los artículos bien protegidos por un embalaje adicional externo, tal como lo recibiste en tu domicilio. Así se evitan posibles daños durante el transporte. Por favor, no pegues ninguna etiqueta ni cinta en la caja original del artículo.
                        </div>
                    </div>
                </div>
                <div class="card" id="hp6s3">
                    <div class="card-header">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#p6s3" aria-expanded="false" aria-controls="p6s3">
                                ¿Cómo recibiré mi reembolso?
                            </button>
                        </h2>
                    </div>
                    <div id="p6s3" class="collapse" aria-labelledby="hp6s3" data-parent="#seccionAyuda3">
                        <div class="card-body">
                            Gestionada la devolución y verificado que ésta cumple con los requisitos fijados, te reembolsaremos el dinero. Te enviaremos un correo electrónico de confirmación.
                            <br><br>La forma de pago será la que hayas utilizado para pagar al realizar el pedido.
                            <br><br>El reembolso se hará efectivo en un plazo máximo de catorce (15) días calendario, contados desde que tenga lugar la devolución efectiva del producto (o, en su caso, en el plazo máximo que fije la Ley).
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection


@section('scripts')
    <script>
        if ($(window).width() > 1200) {

            $(window).scroll(function(event) {
                var scrollTop = $(window).scrollTop();
                
                if(scrollTop < 1000){
                    $("header").show();
                    if(scrollTop == 0){
                        window.scroll(0, 0);
                    }
                }else {
                    
                }
            });


            {{-- Bloque1 --}}
            $("#menu-hp1s1").click(function(){
                $("#p1s1").addClass("show");
                $("#p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");

                $(window).scroll(function(event) {
                    var scrollTop = $(window).scrollTop();
                    
                    if( scrollTop == 1758 ){
                        let top = scrollTop - 190;
                        window.scroll(0, top);
                    }
                });
            });

            $("#menu-hp2s1").click(function(){
                $("#p2s1").addClass("show");
                $("#p1s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
                $(window).scroll(function(event) {
                    var scrollTop = $(window).scrollTop();
                    
                    if( scrollTop == 1817 ){
                        let top = scrollTop - 190;
                        window.scroll(0, top);
                    }
                });
            });

            $("#menu-hp3s1").click(function(){
                $("#p3s1").addClass("show");
                $("#p1s1, #p2s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
                $(window).scroll(function(event) {
                    var scrollTop = $(window).scrollTop();
                    
                    if( scrollTop == 1875 ){
                        let top = scrollTop - 190;
                        window.scroll(0, top);
                    }
                });
            });

            $("#menu-hp5s1").click(function(){
                $("#p5s1").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
                $(window).scroll(function(event) {
                    var scrollTop = $(window).scrollTop();
                    
                    if( scrollTop == 1998 ){
                        let top = scrollTop - 190;
                        window.scroll(0, top);
                    }
                });
            });

            $("#menu-hp6s1").click(function(){
                $("#p6s1").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
                $(window).scroll(function(event) {
                    var scrollTop = $(window).scrollTop();
                    
                    if( scrollTop == 2057 ){
                        let top = scrollTop - 190;
                        window.scroll(0, top);
                    }
                });
            });

            $("#menu-hp7s1").click(function(){
                $("#p7s1").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
                $(window).scroll(function(event) {
                    var scrollTop = $(window).scrollTop();
                    
                    if( scrollTop == 2115 ){
                        let top = scrollTop - 190;
                        window.scroll(0, top);
                    }
                });
            });

            $("#menu-hp4s1").click(function(){
                $("#p4s1").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
                $(window).scroll(function(event) {
                    var scrollTop = $(window).scrollTop();
                    
                    if( scrollTop == 1940 ){
                        let top = scrollTop - 190;
                        window.scroll(0, top);
                    }
                });
            });

            {{-- Bloque2 --}}
            $("#menu-hp8s1").click(function(){
                $("#p8s1").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
                $(window).scroll(function(event) {
                    var scrollTop = $(window).scrollTop();
                    
                    if( scrollTop == 2251 ){
                        let top = scrollTop - 190;
                        window.scroll(0, top);
                    }
                });
            });

            $("#menu-hp1s2").click(function(){
                $("#p1s2").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
                $(window).scroll(function(event) {
                    var scrollTop = $(window).scrollTop();
                    
                    if( scrollTop == 2310 ){
                        let top = scrollTop - 190;
                        window.scroll(0, top);
                    }
                });
            });

            $("#menu-hp2s2").click(function(){
                $("#p2s2").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
                $(window).scroll(function(event) {
                    var scrollTop = $(window).scrollTop();
                    
                    if( scrollTop == 2368 ){
                        let top = scrollTop - 190;
                        window.scroll(0, top);
                    }
                });
            });

            $("#menu-hp3s2").click(function(){
                $("#p3s2").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
                $(window).scroll(function(event) {
                    var scrollTop = $(window).scrollTop();
                    
                    if( scrollTop == 2433 ){
                        let top = scrollTop - 190;
                        window.scroll(0, top);
                    }
                });
            });

            $("#menu-hp4s2").click(function(){
                $("#p4s2").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
                $(window).scroll(function(event) {
                    var scrollTop = $(window).scrollTop();
                    
                    if( scrollTop == 2492 ){
                        let top = scrollTop - 190;
                        window.scroll(0, top);
                    }
                });
            });

            $("#menu-hp5s2").click(function(){
                $("#p5s2").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
                $(window).scroll(function(event) {
                    var scrollTop = $(window).scrollTop();
                    
                    if( scrollTop == 2550 ){
                        let top = scrollTop - 190;
                        window.scroll(0, top);
                    }
                });
            });

            {{-- Bloque3 --}}
            $("#menu-hp6s2").click(function(){
                $("#p6s2").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
                $(window).scroll(function(event) {
                    var scrollTop = $(window).scrollTop();
                    
                    if( scrollTop == 2551 ){
                        let top = scrollTop - 190;
                        window.scroll(0, top);
                    }
                });
            });

            $("#menu-hp7s2").click(function(){
                $("#p7s2").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
                $(window).scroll(function(event) {
                    var scrollTop = $(window).scrollTop();
                    
                    if( scrollTop == 2751 ){
                        let top = scrollTop - 190;
                        window.scroll(0, top);
                    }
                });
            });

            $("#menu-hp1s3").click(function(){
                $("#p1s3").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
                $(window).scroll(function(event) {
                    var scrollTop = $(window).scrollTop();
                    
                    if( scrollTop == 2686 ){
                        let top = scrollTop - 190;
                        window.scroll(0, top);
                    }
                });
            });

            $("#menu-hp2s3").click(function(){
                $("#p2s3").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
                $(window).scroll(function(event) {
                    var scrollTop = $(window).scrollTop();
                    
                    if( scrollTop == 2744 ){
                        let top = scrollTop - 190;
                        window.scroll(0, top);
                    }
                });
            });

            $("#menu-hp3s3").click(function(){
                $("#p3s3").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
                $(window).scroll(function(event) {
                    var scrollTop = $(window).scrollTop();
                    
                    if( scrollTop == 2809 ){
                        let top = scrollTop - 190;
                        window.scroll(0, top);
                    }
                });
            });

            $("#menu-hp4s3").click(function(){
                $("#p4s3").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p5s3, #p6s3, #p7s3").removeClass("show");
                $(window).scroll(function(event) {
                    var scrollTop = $(window).scrollTop();
                    
                    if( scrollTop == 2868 ){
                        let top = scrollTop - 190;
                        window.scroll(0, top);
                    }
                });
            });

            $("#menu-hp5s3").click(function(){
                $("#p5s3").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p6s3, #p7s3").removeClass("show");
                $(window).scroll(function(event) {
                    var scrollTop = $(window).scrollTop();
                    
                    if( scrollTop == 2926 ){
                        let top = scrollTop - 190;
                        window.scroll(0, top);
                    }
                });
            });

            $("#menu-hp6s3").click(function(){
                $("#p6s3").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p7s3").removeClass("show");
                $(window).scroll(function(event) {
                    var scrollTop = $(window).scrollTop();
                    
                    if( scrollTop == 2985 ){
                        let top = scrollTop - 190;
                        window.scroll(0, top);
                    }
                });
            });

            $("#menu-hp7s3").click(function(){
                $("#p7s3").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3").removeClass("show");
                
            });
        }
        else {
            $("#menu-hp1s1").click(function(){
                $("#p1s1").addClass("show");
                $("#p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
            });

            $("#menu-hp2s1").click(function(){
                $("#p2s1").addClass("show");
                $("#p1s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
            });

            $("#menu-hp3s1").click(function(){
                $("#p3s1").addClass("show");
                $("#p1s1, #p2s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
            });

            $("#menu-hp4s1").click(function(){
                $("#p4s1").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
            });

            $("#menu-hp5s1").click(function(){
                $("#p5s1").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
            });

            $("#menu-hp6s1").click(function(){
                $("#p6s1").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
            });

            $("#menu-hp7s1").click(function(){
                $("#p7s1").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
            });

            $("#menu-hp8s1").click(function(){
                $("#p8s1").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
        
            });

            $("#menu-hp1s2").click(function(){
                $("#p1s2").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
            });

            $("#menu-hp2s2").click(function(){
                $("#p2s2").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
            });

            $("#menu-hp3s2").click(function(){
                $("#p3s2").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
            });

            $("#menu-hp4s2").click(function(){
                $("#p4s2").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
            });

            $("#menu-hp5s2").click(function(){
                $("#p5s2").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
            });

            $("#menu-hp6s2").click(function(){
                $("#p6s2").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
            });

            $("#menu-hp7s2").click(function(){
                $("#p7s2").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
            });

            $("#menu-hp1s3").click(function(){
                $("#p1s3").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
            });

            $("#menu-hp2s3").click(function(){
                $("#p2s3").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p3s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
            });

            $("#menu-hp3s3").click(function(){
                $("#p3s3").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p4s3, #p5s3, #p6s3, #p7s3").removeClass("show");
            });

            $("#menu-hp4s3").click(function(){
                $("#p4s3").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p5s3, #p6s3, #p7s3").removeClass("show");
            });

            $("#menu-hp5s3").click(function(){
                $("#p5s3").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p6s3, #p7s3").removeClass("show");
            });

            $("#menu-hp6s3").click(function(){
                $("#p6s3").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p7s3").removeClass("show");
            });

            $("#menu-hp7s3").click(function(){
                $("#p7s3").addClass("show");
                $("#p1s1, #p2s1, #p3s1, #p4s1, #p5s1, #p6s1, #p7s1, #p8s1, #p1s2, #p2s2, #p3s2, #p4s2, #p5s2, #p6s2, #p7s2, #p1s3, #p2s3, #p3s3, #p4s3, #p5s3, #p6s3").removeClass("show");
            });
        }
    </script>
@endsection