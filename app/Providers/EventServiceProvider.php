<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\UserWasCreated' => [
            'App\Listeners\SendEmailAdmin',
            'App\Listeners\SendEmailUserRegister'
        ],
        'App\Events\ViewedFile' => [
            'App\Listeners\SendViewedFileAdmin',
        ],
        'App\Events\NewFile' => [
            'App\Listeners\SendNewFile',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
