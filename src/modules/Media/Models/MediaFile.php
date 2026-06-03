<?php

namespace Modules\Media\Models;

use App\Models\BaseModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class MediaFile extends BaseModel
{
    use SoftDeletes;

    protected $table = 'media_files';

    public static function findMediaByName($name)
    {
        return MediaFile::where("file_name", $name)->first();
    }

    public function cacheKey(): string
    {
        return sprintf("%s/%s", $this->getTable(), $this->getKey());
    }

    public function scopeInFolder($query, $folder_id){
        return $query->where('folder_id', $folder_id);
    }

    public function forceDelete()
    {
        Cache::forget($this->cacheKey() . ':' . $this->id);
        return parent::forceDelete();
    }

    public function download($name = '',$headers = [])
    {
        return Storage::disk($this->driver)->download($this->file_path,$name,$headers);
    }
}
