<?php

namespace Gsferro\AutoCacheEasy\Traits;

use Gsferro\ResponseView\Traits\ResponseView;

trait ResponseViewCache
{
    use ResponseView;

    /**
     * Easily add an item to ResponseView::$data and cache it
     * Adicionar forma fácil um item ao ResponseView::$data e coloca no cache
     *
     * @param string $key
     * @param callable $value
     * @param string $action
     */
    private function addDataCache(string $key, callable $value, string $action = "remember")
    {
        $this->addData($key, autocacheeasy()->$action($key, $value));
    }

    /**
     * Easily add an item to ResponseView::$data and cache it
     * Adicionar forma fácil um item ao ResponseView::$data e coloca no cache
     *
     * @param string $key
     * @param string $keyCache
     * @param callable $value
     * @param string $action
     */
    private function addDataOtherKeyCache(
        string $key,
        string $keyCache,
        callable $value,
        string $action = "remember"
    ) {
        $this->addData($key, autocacheeasy()->$action($keyCache, $value));
    }

    /**
     * Easily add an item to ResponseView::$mergeData and cache it
     * Adicionar forma fácil um item ao ResponseView::$mergeData e coloca no cache
     *
     * @param string $key
     * @param callable $value
     * @param string $action
     */
    private function addMergeDataCache(string $key, callable $value, string $action = "remember")
    {
        $this->addMergeData($key, autocacheeasy()->$action($key, $value));
    }

    /**
     * Easily add an item to ResponseView::$mergeData and cache it
     * Adicionar forma fácil um item ao ResponseView::$mergeData e coloca no cache
     *
     * @param string $key
     * @param string $keyCache
     * @param callable $value
     * @param string $action
     */
    private function addMergeDataOtherKeyCache(
        string $key,
        string $keyCache,
        callable $value,
        string $action = "remember"
    ) {
        $this->addMergeData($key, autocacheeasy()->$action($keyCache, $value));
    }
}