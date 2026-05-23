<?php

namespace Modules\Role\Models;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    protected $table = 'core_role_permissions';

    protected $fillable = [
        'role_id',
        'permission'
    ];
}
