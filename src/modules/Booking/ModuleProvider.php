<?php

namespace Modules\Booking;

use Modules\Core\Helpers\SitemapHelper;
use Modules\ModuleServiceProvider;


class ModuleProvider extends ModuleServiceProvider
{
    public function boot(SitemapHelper $sitemapHelper)
    {
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->register(RouterServiceProvider::class);
//        $this->app->register(EventServiceProvider::class);
    }

}
