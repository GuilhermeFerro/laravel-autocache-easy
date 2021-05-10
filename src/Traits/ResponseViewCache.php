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
     * @param int $time 60
     */
    private function addDataCache(string $key, callable $value, int $time = 60)
    {
        $this->addData($key, autocacheeasy()->remember($key, $time, $value));
    }

    /**
     * Easily add an item to ResponseView::$data and cache it
     * Adicionar forma fácil um item ao ResponseView::$data e coloca no cache
     *
     * @param string $key
     * @param string $keyCache
     * @param callable $value
     * @param int $time 60
     */
    private function addDataOtherKeyCache(
        string $key,
        string $keyCache,
        callable $value,
        int $time = 60
    ) {
        $this->addData($key, autocacheeasy()->remember($keyCache, $time, $value));
    }

    /**
     * Easily add an item to ResponseView::$mergeData and cache it
     * Adicionar forma fácil um item ao ResponseView::$mergeData e coloca no cache
     *
     * @param string $key
     * @param callable $value
     * @param int $time 60
     */
    private function addMergeDataCache(
        string $key,
        callable $value,
        int $time = 60
    ) {
        $this->addMergeData($key, autocacheeasy()->remember($key, $time, $value));
    }

    /**
     * Easily add an item to ResponseView::$mergeData and cache it
     * Adicionar forma fácil um item ao ResponseView::$mergeData e coloca no cache
     *
     * @param string $key
     * @param string $keyCache
     * @param callable $value
     * @param int $time 60
     */
    private function addMergeDataOtherKeyCache(
        string $key,
        string $keyCache,
        callable $value,
        int $time = 60
    ) {
        $this->addMergeData($key, autocacheeasy()->remember($keyCache, $time, $value));
    }
}