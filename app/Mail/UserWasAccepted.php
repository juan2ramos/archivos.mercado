<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserWasAccepted extends Mailable
{
    use Queueable, SerializesModels;


    public function build()
    {
        return $this
            ->subject('Usuario verificado')
            ->markdown('emails.UserWasAccepted');
    }
}
