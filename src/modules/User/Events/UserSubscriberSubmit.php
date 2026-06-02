<?php

namespace Modules\User\Events;

use Modules\User\Models\Subscriber;
use Illuminate\Queue\SerializesModels;

class UserSubscriberSubmit
{
    use SerializesModels;

    public function __construct(public Subscriber $subscriber)
    {
    }
}
