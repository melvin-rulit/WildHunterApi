<?php
namespace Modules\User\Events;

use App\Models\User;
use Illuminate\Queue\SerializesModels;

class PasswordUpdatedEvent
{
    use SerializesModels;

    public User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
