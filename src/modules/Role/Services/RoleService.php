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
            ->where('id', '!=', Role::SUPERADMIN_ID)
            ->get();
    }

    public function getById($id): ?Role
    {
        return Role::query()
            ->where('id', $id)
            ->where('id', '!=', Role::SUPERADMIN_ID)
            ->first();
    }

    public function getByCode($code): ?Role
    {
        return Role::query()
            ->where('code', $code)
            ->where('code', '!=', Role::SUPERADMIN)
            ->first();
    }

    public function getUserRole(User $user)
    {
        return $user->role()->first();
    }
}
