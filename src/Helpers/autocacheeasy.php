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

if ( ! function_exists('autocache')) {
    /**
     * Alias small for autocacheeasy().
     *
     * @return Gsferro\AutoCacheEasy\Services\AutoCacheEasyService
     */
    function autocache()
    {
        return autocacheeasy();
    }
}