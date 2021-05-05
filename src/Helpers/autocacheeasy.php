<?php

if ( ! function_exists('autocacheeasy')) {
    /**
     * Initiate autocacheeasy hook.
     *
     * @return Gsferro\AutoCacheEasy\Services\AutoCacheEasyService
     */
    function autocacheeasy()
    {
        return app('autocacheeasy');
    }
}