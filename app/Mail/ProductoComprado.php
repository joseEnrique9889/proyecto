<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProductoComprado extends Mailable
{
    use Queueable, SerializesModels;
     

    public $subject = 'Postulante Nuevo';

    public $msg;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($registro)
    {
        $this->msg = $registro;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.mensajes');
    }
}
