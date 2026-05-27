<?php

namespace Modules\User\Listeners;

use Modules\User\Events\PasswordUpdatedEvent;

class SendMailUserUpdatePassword
{
    public function handle(PasswordUpdatedEvent $event): void
    {
        $user = $event->user;
    }
}
