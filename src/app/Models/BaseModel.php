<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class BaseModel extends Model
{
    protected $dateFormat    = 'Y-m-d H:i:s';

    public static function getModelName()
    {

    }
    public function findById($id)
    {
        return Cache::rememberForever($this->cacheKey() . ':' . $id, function () use ($id) {
            return $this->find($id);
        });
    }
}
