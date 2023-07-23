<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificacionPedido extends Mailable
{
    use Queueable, SerializesModels;
    public $id_pedido;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $id_pedido )
    {
        //
        $this->id_pedido = $id_pedido;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('frontend.msg-pedido-nuevo');
    }
}
