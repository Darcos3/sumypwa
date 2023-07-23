<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificacionFerreteroProximaVencerse extends Mailable
{
    use Queueable, SerializesModels;
    public $ferretero;
    public $pedido;
    public $fvf;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $ferretero, $pedido, $fvf )
    {
        //
        $this->ferretero = $ferretero;
        $this->pedido = $pedido;
        $this->fvf = $fvf;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('frontend.msg-ferretero-plazo-proxima-vencerse');
    }
}
