<div class="container" style="background-color: white !important; border-radius:10px; padding: 5px;">
    <div class="mb-5">
        <img src="https://www.sumy.com.co/frontend/assets/images/logo-sumy@2x.png" style="width: 150px; height: 60px">
        <h1 class="text-center">Mensaje Recibido</h1>
    </div>
    <div class="row mb-10">
        <div class="col-lg-7 col-xl-6 mb-8 mb-lg-0">
            <div class="mr-xl-6">
                <div class="border-bottom border-color-1 mb-5">
                    <h3 class="section-title mb-0 pb-2 font-size-25">Mensaje Recibido</h3>
                </div>
                <p class="max-width-830-xl text-gray-90">
                    El cliente {{ $firstName }}, 
                    con correo electrónico {{ $email }}, 
                    ha enviado el siguiente mensaje: </p>
                    <p>{{ $text }}</p>
            </div>
        </div>
        <div class="col-lg-5 col-xl-6">
            <div class="mb-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127450.08829203268!2d-76.6693584492385!3d3.395225124390289!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e30a6f0cc4bb3f1%3A0x1f0fb5e952ae6168!2sCali%2C%20Valle%20del%20Cauca%2C%20Colombia!5e0!3m2!1sen!2sin!4v1674581076135!5m2!1sen!2sin" width="100%" height="288" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835252972956!2d144.95592398991224!3d-37.817327693787625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2sin!4v1575470633967!5m2!1sen!2sin" width="100%" height="288" frameborder="0" style="border:0;" allowfullscreen=""></iframe> --}}
            </div>
            <div class="border-bottom border-color-1 mb-5">
                <h3 class="section-title mb-0 pb-2 font-size-25">Dirección</h3>
            </div>
            <address class="mb-6 text-lh-23">
                Calle 1 # 2 - 3, Cali, Valle del Cauca
                <div class="">(+57) 300 123 45 78</div>
                <div class="">Email: <a class="text-blue text-decoration-on" href="mailto:contacto@sumy.com">contacto@sumy.com</a></div>
            </address>
            <h5 class="font-size-14 font-weight-bold mb-3">Horario</h5>
            <div class="">Lunes a viernes: 8am - 6pm</div>
            <div class="mb-6">Sabados y festivos: 8am - 1pm</div>
        </div>
    </div>
</div>
    