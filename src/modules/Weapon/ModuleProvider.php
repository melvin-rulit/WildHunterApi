<?php

namespace Modules\Weapon;

use Modules\Weapon\Models\WeaponType;
use Modules\Core\Helpers\SitemapHelper;
use Modules\ModuleServiceProvider;

class ModuleProvider extends ModuleServiceProvider
{

    public function boot(SitemapHelper $sitemapHelper): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');

//        if(is_installed() and WeaponType::isEnable()){
//
//            $sitemapHelper->add("weapon",[app()->make(WeaponType::class),'getForSitemap']);
//        }
    }
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->register(RouterServiceProvider::class);
    }
}
