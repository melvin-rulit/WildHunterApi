<?php

namespace Modules\User\Services;

use App\Models\User;
use Modules\User\Dto\SubscribeData;
use Modules\User\Models\Subscriber;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    public function searchAl(): Collection
    {
        return User::all();
    }
    public function searchById(string $id): ?User
    {
        return User::find($id);
    }
    public function findByEmail(string $email): ?User
    {
        return User::firstWhere('email', $email);
    }
    public function searchByQuery(string $query)
    {
        return  User::where(function ($q) use ($query) {
        $q->where('user_name', 'LIKE', $query.'%')
            ->orWhere('first_name', 'LIKE', $query.'%')
            ->orWhere('last_name', 'LIKE', $query.'%')
            ->orWhere('email', 'LIKE', $query.'%')
            ->orWhere('id', 'LIKE', $query.'%');
    })
            ->select(['id', 'user_name', 'first_name', 'last_name'])
            ->get();
    }

    public function subscribe(SubscribeData $dto): array
    {
        $code = 'subscription_success';

        $subscriber = Subscriber::withTrashed()
            ->with(['user'])
            ->where('email', $dto->email)
            ->first();

        if ($subscriber) {
            if ($subscriber->trashed()) {
                $subscriber->restore();
                $code = 'subscription_thanks';
            }
        } else {
            $subscriber = new Subscriber();
            $subscriber->email = $dto->email;
            $subscriber->save();
        }

        return [
            'code' => $code,
            'subscriber' => $subscriber,
        ];
    }
}
