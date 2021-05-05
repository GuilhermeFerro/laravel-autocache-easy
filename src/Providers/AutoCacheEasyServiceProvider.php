<?php

namespace Gsferro\AutoCacheEasy\Providers;

use Gsferro\AutoCacheEasy\Services\AutoCacheEasyService;
use Illuminate\Support\ServiceProvider;

class AutoCacheEasyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // em minusculo
        app()->bind('autocacheeasy', function () {
            return new AutoCacheEasyService();
        });
    }

    public function register() { }
}
