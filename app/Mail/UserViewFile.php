<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserViewFile extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $file;

    public function __construct($file)
    {
        $this->user = auth()->user();
        $this->file = $file;
    }


    public function build()
    {
        return $this
            ->subject('Documento descargado')
            ->markdown('emails.UserViewedFile');
    }
}
