<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;


function is_enable_registration(): bool
{
    return !setting_item('user_disable_register');
}

function is_installed(): bool
{
    return file_exists(storage_path('installed'));
}



