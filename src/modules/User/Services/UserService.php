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
            ->where('email', $dto->email)
            ->first();

        if ($subscriber) {
            if ($subscriber->trashed()) {
                $subscriber->restore();
                $code = 'subscription_thanks';
            }
        } else {
            $user = User::select('first_name', 'last_name')
                ->where('email', $dto->email)
                ->first();

            $newSubscriber = new Subscriber();
            $newSubscriber->email = $dto->email;

            if ($user) {
                $newSubscriber->first_name = $user?->first_name;
                $newSubscriber->last_name = $user?->last_name;
            }
            $newSubscriber->save();
        }

        return [
            'code' => $code,
            'subscriber' => $subscriber,
        ];
    }
}
