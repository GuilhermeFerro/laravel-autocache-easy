<?php

namespace Gsferro\AutoCacheEasy\Services;

use Predis\Client;

class AutoCacheEasyService extends RedisService
{
    private $keyPrefix;
    private $keyPrefixSeparetor;

    /**
     * Package instance
     * AutoCacheEasyService constructor.
     *
     * @param string|null $keyPrefix
     * @param string $keyPrefixSeparetor default ':'
     * @return  $this
     */
    public function __construct(string $keyPrefix = null, string $keyPrefixSeparetor = ':')
    {
        parent::__construct();
        $this->keyPrefix          = $keyPrefix;
        $this->keyPrefixSeparetor = $keyPrefixSeparetor;

        return $this;
    }

    /**
     * Checks if the key exists in the redis cache, saves if it does not exist and returns the value
     * Verifica se existe a chave no cache do redis, salva se não existir e devolve o valor
     *
     * @param string $key
     * @param callable $callback
     * @return mixed 'cache or callable runnig'
     */
    public function remember(string $key, callable $callback)
    {
        $key = $this->mountKey($key);
        return $this->get($key) ?? $this->save($key, $callback);
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
        $key = $this->mountKey($key);
        $this->forget($key, $all);
        return $this->save($key, $callback);
    }

    /**
     * executa a callback e sava no redis
     *
     * @param string $key
     * @param callable $callback
     * @return mixed
     */
    private function save(string $key, callable $callback)
    {
        $cache = call_user_func($callback);
        $this->set($key, $cache);
        return $cache;
    }

    /**
     * montar a key caso aja um prefixo
     *
     * @param $key
     * @return string
     */
    private function mountKey($key): string
    {
        $key = env('REDIS_PREFIX_GLOBAL', null) . $key;

        if (is_null($this->keyPrefix)) {
            return $key;
        }

        return "{$this->keyPrefix}{$this->keyPrefixSeparetor}{$key}";
    }
}
