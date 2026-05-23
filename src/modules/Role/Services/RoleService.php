<?php

namespace Modules\Role\Services;

use Modules\Role\Models\Role;
use Illuminate\Database\Eloquent\Collection;

class RoleService
{
    public function roles(): Collection
    {
        return Role::all();
    }

    public function getById($id): ?Role
    {
        return Role::find($id);
    }

    public function getByCode($code): ?Role
    {
        return Role::where('code', $code)->first();
    }
}
