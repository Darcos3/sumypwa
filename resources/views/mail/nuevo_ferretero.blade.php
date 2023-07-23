@component('mail::message')
# Hola,

Ya eres parte del selecto grupo de Clientes Ferreteros

Tu cupo actual es de <strong>${{ number_format($cupo,0,'.','.') }}</strong>.

Atentamente,<br>
El Equipo de Sumy.<br>
@endcomponent
