<?php

namespace Modules\User\Services;

use App\Models\User;
use Modules\User\Dto\SubscribeData;
use Modules\User\Models\Subscriber;
use Modules\User\Dto\ProfileUpdateData;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    public function searchAl(): Collection
    {
        return User::with(['role', 'weapons', 'weapons.type', 'weapons.caliber'])->all();
    }
    public function searchById(string $id): ?User
    {
        return User::with(['role', 'weapons', 'weapons.type', 'weapons.caliber'])->find($id);
    }
    public function findByEmail(string $email): ?User
    {
        return User::with(['role', 'weapons', 'weapons.type', 'weapons.caliber'])->firstWhere('email', $email);
    }
    public function searchByQuery(string $query): Collection
    {
        return  User::with(['role', 'weapons', 'weapons.type', 'weapons.caliber'])->where(function ($q) use ($query) {
        $q->where('user_name', 'LIKE', $query.'%')
            ->orWhere('first_name', 'LIKE', $query.'%')
            ->orWhere('last_name', 'LIKE', $query.'%')
            ->orWhere('email', 'LIKE', $query.'%')
            ->orWhere('id', 'LIKE', $query.'%');
    })
            ->select(['id', 'user_name', 'first_name', 'last_name'])
            ->get();
    }

    public function update($user, ProfileUpdateData $dto): array
    {
        $user->fill(array_filter([
            'first_name' => $dto->first_name,
            'last_name' => $dto->last_name,
            'user_name' => $dto->nik,
            'email' => $dto->email,
            'phone' => $dto->phone,
            'city' => $dto->city,
            'address' => $dto->address,
            'birthday' => date("Y-m-d", strtotime($dto->birthday)),
            'hunter_billet_number' => $dto->hunter_billet_number,
        ], fn($v) => $v !== null));

        $user->bio = $dto->bio ? clean($dto->bio) : null;
        $user->updateFullName();
        $user->save();

        return [
            'code' => 'update_success',
            'user' => $user,
        ];
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
