<?php

namespace Modules\User\Models;

use App\Models\BaseModel;

class UserWishList extends BaseModel
{
    protected $table = 'user_wishlist';
    protected $fillable = [
        'object_id',
        'object_model',
        'user_id',
        'create_user'
    ];
}
