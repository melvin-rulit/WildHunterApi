<?php

namespace Modules\User\Services;

use App\Models\User;

class UserService
{
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
}
