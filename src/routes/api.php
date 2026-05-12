<?php

use Illuminate\Support\Facades\Route;


$modulesPath = base_path('Modules');

foreach (glob($modulesPath . '/*', GLOB_ONLYDIR) as $modulePath) {

    $apiRoutes = $modulePath . '/Routes/api.php';

    if (file_exists($apiRoutes)) {

        Route::middleware('api')
            ->group($apiRoutes);
    }
}
