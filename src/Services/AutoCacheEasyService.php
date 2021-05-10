<?php

namespace Gsferro\AutoCacheEasy\Services;

use Illuminate\Support\Facades\Cache;

class AutoCacheEasyService extends RedisService
{
    public $cache;

    /**
     * Package instance
     * AutoCacheEasyService constructor.
     *
     * @return  $this
     */
    public function __construct()
    {
        parent::__construct();
        $this->cache = cache();

        return $this;
    }

    /**
     * Clear the current cache and save again
     * Limpa o cache atual e salva novamente
     *
     * @param string $key
     * @param callable $callback
     * @param bool $all
     * @return callable runnig
     */
    public function retriver(string $key, callable $callback, $all = false)
    {
        $this->forget($key, $all);
        return $this->add($key, $callback);
    }

    /*
    |---------------------------------------------------
    | Metodos cache() mais usados
    |---------------------------------------------------
    */
    public function has(string $key)
    {
        return $this->cache->has($key);
    }

    public function add(string $key, $value)
    {
        return $this->cache->add($key, $value);
    }

    public function remember(string $key, $ttl, \Closure $callback)
    {
        return $this->cache->remember($key, $ttl, $callback);
    }

    public function rememberForever(string $key, \Closure $callback)
    {
        return $this->cache->rememberForever($key, $callback);
    }
}
