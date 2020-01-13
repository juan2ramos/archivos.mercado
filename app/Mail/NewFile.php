<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewFile extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $file;
    public $url;

    public function __construct($user, $file)
    {
        $this->user = $user;
        $this->file = $file;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->url = route('home');
        return $this
            ->subject('Se ha subido un nuevo archivo en Mercado y Bolsa S.A.')
            ->markdown('emails.NewFile');

    }
}
