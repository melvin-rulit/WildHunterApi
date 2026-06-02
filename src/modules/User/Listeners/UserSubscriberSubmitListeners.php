<?php

namespace Modules\User\Listeners;

use Modules\User\Events\UserSubscriberSubmit;

class UserSubscriberSubmitListeners
{
    public function handle(UserSubscriberSubmit $event): void
    {
        $subscriber = $event->subscriber;
        $data = [
            'id' =>  $subscriber->id,
            'name' =>  '',
            'type' => 'subscriber',
            'event'=>'UserSubscriberSubmit',
            'to'=>'admin',
            'avatar' =>  '',
            'link' => '',
            'message' => __('admin.notification.subject_new_subscriber'),
        ];
    }
}
