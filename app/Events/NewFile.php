<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewFile
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $file;

    public function __construct($user, $file)
    {
        $this->user = $user;
        $this->file = $file;
    }

}
