<?php

namespace App\Listeners;

use App\Events\ViewedFile;
use App\Mail\UserViewFile;
use App\User;
use Illuminate\Support\Facades\Mail;

class SendViewedFileAdmin
{

    public function handle(ViewedFile $event)
    {
        $admins = User::role('SuperAdmin')->get();
        Mail::to($admins)->queue(new UserViewFile($event->file));
    }
}
