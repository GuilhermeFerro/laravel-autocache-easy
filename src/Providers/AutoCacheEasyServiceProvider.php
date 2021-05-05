<?php

namespace Gsferro\AutoCacheEasy\Providers;

use Gsferro\AutoCacheEasy\Services\AutoCacheEasyService;
use Illuminate\Support\ServiceProvider;

class AutoCacheEasyServiceProvider extends ServiceProvider
{
    public function boot() { }

    public function register()
    {
        // em minusculo
        app()->bind('autocacheeasy', function () {
            return new AutoCacheEasyService();
        });
    }
}
