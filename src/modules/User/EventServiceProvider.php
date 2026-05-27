<?php

namespace Modules\User;

use Illuminate\Auth\Events\Registered;
use Modules\User\Events\PasswordUpdatedEvent;
use Modules\User\Listeners\SendUserRegistrationMail;
use Modules\User\Listeners\SendMailUserUpdatePassword;

class EventServiceProvider extends \Illuminate\Foundation\Support\Providers\EventServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendUserRegistrationMail::class,
        ],
        PasswordUpdatedEvent::class => [
            SendMailUserUpdatePassword::class,
        ],
    ];
}
