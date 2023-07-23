<div class="container" style="background-color: white !important; border-radius:10px; padding: 5px;">
    <div class="mb-5">
        <img src="https://www.sumy.com.co/frontend/assets/images/logo-sumy@2x.png" style="width: 150px; height: 60px">
        <h1 class="text-center text-success">Tienes una nueva orden</h1>
    </div>
    <div class="row mb-10">
        <div class="col-lg-7 col-xl-6 mb-8 mb-lg-0">
            <div class="mr-xl-6">
                <p class="max-width-830-xl text-gray-90">
                    ID Orden: {{ $id_pedido }} 
                    Recuerda atender a tiempo las ordenes.<br><br><br>
                    <a style="background-color:#5cb85c; color: #333; padding: 10px; border-radius: 8px;" href="#">Entendido</a>  |   
                    <a style="background-color:#5cb85c; color: #333; padding: 10px; border-radius: 8px;" href="http://sumy.test/pedidos/{{$id_pedido}}">Ver orden</a>
                </p>
            </div>
        </div>
    </div>
</div>
    