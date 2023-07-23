<div class="container" style="background-color: white !important; border-radius:10px; padding: 5px;">
    <div class="mb-5">
        <img src="https://www.sumy.com.co/frontend/assets/images/logo-sumy@2x.png" style="width: 150px; height: 60px">
        <h1 class="text-center text-success">Señor Ferretero Mayorista</h1>
    </div>
    <div class="row mb-10">
        <div class="col-lg-7 col-xl-6 mb-8 mb-lg-0">
            <div class="mr-xl-6">
                <p class="max-width-830-xl text-gray-90">
                    Tenga un buen día, Sr(a) {{ $pedido->user->name }}.<br><br>
                    
                    El plazo de pago de su compra con número de órden {{ $pedido->id }} por un valor de ${{ number_format($pedido->total) }} 
                    está proximo a expirar. Su plazo máximo de pago es {{ $fvf }}, por favor realice el pago de su deuda con Sumy.
                    En caso que ya haya realizado el pago omita este mensaje. 
                </p>
            </div>
        </div>
    </div>
</div>
    