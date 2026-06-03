<?php

use Carbon\Carbon;
use Modules\Core\Models\Settings;
use Illuminate\Support\Facades\Cache;


function is_enable_registration(): bool
{
    return !setting_item('user_disable_register');
}

function is_installed(): bool
{
    return file_exists(storage_path('installed'));
}
function setting_item($item, $default = '', $isArray = false)
{
    $res = Settings::item($item, $default);

    if ($isArray and !is_array($res)) {
        $res = (array) json_decode($res, true);
    }

    return $res;
}


