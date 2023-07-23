<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NuevoCliente extends Mailable
{
    use Queueable, SerializesModels;
    public $cupon;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $cupon )
    {
        //
        $this->cupon = $cupon;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build( )
    {
        return $this->subject('Bienvenid@ a Sumy')
        ->markdown('mail.nuevo_cliente');
    }
}
