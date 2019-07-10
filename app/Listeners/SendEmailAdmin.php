<?php

namespace App\Listeners;

use App\Events\UserWasCreated;
use App\Mail\NewUserToAdmin;
use App\User;
use Illuminate\Support\Facades\Mail;

class SendEmailAdmin
{

    public function handle(UserWasCreated $event)
    {
        $admins = User::role('SuperAdmin')->get();

        Mail::to($admins)->queue(
            new NewUserToAdmin($event->user)
        );
    }
}
