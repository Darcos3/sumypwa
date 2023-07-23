@component('mail::message')
# Hola, {{auth()->user()->name}} Bienvenido@


Gracias por crear una cuenta en SUMY mayorista digital. Si tienes una empresa y deseas precios al por mayor 
<a href="">sigue este enlace</a>.<br>
Si quieres generar ingresos como domiciliario, <a href=""> sigue este enlace</a>.

Esperamos verte pronto, te obsequiamos este cupón de bienvenida.

<div style="background-color: #f2f2f2; border-radius: 6px; padding: 10px; width: 50%; text-align: center;">
    <div>
        <img src="https://www.sumy.com.co/frontend/assets/images/descuento.png" style="width: 20px; height: 20px">
        Tienes un cupón disponible
    </div>
    <div style="background-color: white; width: 80%; margin: 0 auto; border: 1px solid #999: border-radisu: 6px">
        <b>{{ $cupon }}</b>
    </div>
</div>

Atentamente,<br>
El Equipo de Sumy.<br>
@endcomponent