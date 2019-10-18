<?php

namespace App\Listeners;

use App\Events\NewFile;
use Illuminate\Support\Facades\Mail;

class SendNewFile
{

    public function handle(NewFile $event)
    {
        Mail::to($event->user)->queue(
            new \App\Mail\NewFile($event->user, $event->file)
        );
    }
}
