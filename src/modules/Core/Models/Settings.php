<?php

namespace Modules\Core\Models;

use App\Models\BaseModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Concerns\HasEvents;

class Settings extends BaseModel
{
    use HasEvents;

    protected $table = 'core_settings';
    protected $fillable = ['name','group','val'];

    public static function getSettings($group = '', $locale = ''): array
    {
        if ($group) {
            static::where('group', $group);
        }

        $all = static::groupBy('name')->get();
        $res = [];

        foreach ($all as $row) {
            $res[$row->name] = $row->val;
        }
        return $res;
    }

    public static function item($item, $default = false)
    {
        $value = Cache::rememberForever('setting_' . $item, function () use ($item ,$default) {
            $val = Settings::where('name', $item)->first();
            return $val?$val['val']:'';
        });

        return (empty($value) and strlen($value)===0)?$default:$value;
    }

    public static function store($key, $data): void
    {
        $check = Settings::where('name', $key)->first();

        if($check){
            $check->val = $data;
        }else{
            $check = new self();
            $check->val = $data;
            $check->name = $key;
        }
        $check->save();

        Cache::forget('setting_' . $key);
    }
}
