<?php

namespace Gsferro\AutoCacheEasy\Facades;

use Illuminate\Support\Facades\Facade;

class AutoCacheEasyFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'autocacheeasy';
    }
}
