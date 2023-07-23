<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificacionFerreteroVencido extends Mailable
{
    use Queueable, SerializesModels;
    public $ferretero;
    public $pedido;
    public $fechavencimiento;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $ferretero, $pedido, $fechavencimiento )
    {
        //
        $this->ferretero = $ferretero;
        $this->pedido = $pedido;
        $this->fechavencimiento = $fechavencimiento;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('frontend.msg-ferretero-plazo-vencido');
    }
}
