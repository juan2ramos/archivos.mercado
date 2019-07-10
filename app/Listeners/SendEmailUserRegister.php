<?php

namespace App\Listeners;

use App\Events\UserWasCreated;
use App\Mail\UserRegister;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailUserRegister
{

    public function handle(UserWasCreated $event)
    {

        Mail::to($event->user)->queue(
            new UserRegister($event->user)
        );
    }
}
