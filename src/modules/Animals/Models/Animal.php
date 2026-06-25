<?php

namespace Modules\Animals\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Media\Helpers\FileHelper;

class Animal extends Model
{
    use SoftDeletes;

    public function __construct()
    {
    }

    protected $table = 'bc_animals';

    protected $fillable = [
        'title',
        'content',
        'status',
        'faqs',
        'hotel_id',
    ];

    public static function isEnable(): bool
    {
        return true;
    }

    public function getImageUrl($size = "medium")
    {
        $url = FileHelper::url($this->image_id, $size);
        return $url ? $url : '';
    }
}

