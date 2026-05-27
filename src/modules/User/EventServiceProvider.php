<?php

namespace Modules\User;

use Illuminate\Auth\Events\Registered;
use Modules\User\Listeners\SendUserRegistrationMail;

class EventServiceProvider extends \Illuminate\Foundation\Support\Providers\EventServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendUserRegistrationMail::class,
        ],
    ];
}
