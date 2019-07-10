<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewUserToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $url;

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->url = route('validate.user');
        return $this
            ->subject('Nuevo usuario registrado')
            ->markdown('emails.NewUserToAdmin');

    }
}
