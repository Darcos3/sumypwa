<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contacto extends Mailable
{
    use Queueable, SerializesModels;
    public $firstName;
    public $email;
    public $Subject;
    public $text;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $firstName, $email, $Subject, $text )
    {
        //
        $this->firstName = $firstName;
        $this->email = $email;
        $this->Subject = $Subject;
        $this->text = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('frontend.contacto-msg-enviado');
    }
}
