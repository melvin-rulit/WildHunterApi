<?php

namespace Modules\Role\Services;

use App\Models\User;
use Modules\Role\Models\Role;
use Illuminate\Database\Eloquent\Collection;

class RoleService
{
    public function roles(): Collection
    {
        return Role::query()
            ->withoutSuperadmin()
            ->get();
    }

    public function getById($id): ?Role
    {
        return Role::query()
            ->withoutSuperadmin()
            ->where('id', $id)
            ->first();
    }

    public function getByCode($code): ?Role
    {
        return Role::query()
            ->withoutSuperadmin()
            ->where('code', $code)
            ->first();
    }

    public function getUserRole(User $user)
    {
        return $user->role()->first();
    }
}
