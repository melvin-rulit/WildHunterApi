<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $dateFormat    = 'Y-m-d H:i:s';

    public static function getModelName()
    {

    }
    public function findById($id)
    {
        return $this->find($id);
    }
}
