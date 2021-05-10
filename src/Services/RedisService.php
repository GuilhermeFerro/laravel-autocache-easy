<?php

namespace Gsferro\AutoCacheEasy\Services;

use Predis\Client;

/**
 * Class RedisService
 * This Class is copy from amitavroy/rediscache to have access to the predis methods
 *
 * @package Gsferro\AutoCacheEasy\Services
 */
class RedisService
{
    /**
     * @var Predis\Client
     */
    public $redis;

    /**
     * RedisService constructor.
     */
    public function __construct()
    {
        $connections = config('database.redis.cache');
        $this->redis = new Client($connections);
    }

    private static function keyWithPrefix($key)
    {
        return config('cache.prefix') .":{$key}";
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        $key = self::keyWithPrefix($key);
        $data = $this->getExecute($key);

        return json_decode($data[ 0 ]);
    }

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function set($key, $value)
    {
        $key = self::keyWithPrefix($key);
        $value = json_encode($value);

        $this->redis->pipeline()->set($key, $value)->execute();

        return $this->get($key);
    }

    /**
     * @param $key
     * @return mixed
     */
    public function getAll($key)
    {
        $key = self::keyWithPrefix($key);
        $keys = $this->redis->executeRaw(["KEYS", "*{$key}*"]);

        $data = collect();

        foreach ($keys as $key) {
            $data->push([
                $key => $this->getExecute($key)
            ]);
        }

        return $data;
    }

    /**
     * @param $key
     * @param bool $wildcard
     * @return bool
     */
    public function forget($key, $wildcard = false)
    {
        $key = self::keyWithPrefix($key);

        if ($wildcard == true) {
            return $this->clearWildCard($key);
        }

        return $this->clearSingle($key);
    }

    /**
     * @param $key
     * @return mixed
     */
    private function clearSingle($key)
    {
        return $this->redis
            ->pipeline()
            ->del($key)
            ->execute();
    }

    /**
     * @param $key
     * @return bool
     */
    private function clearWildCard($key)
    {
        $keys = $this->redis->executeRaw(["KEYS", "*{$key}*"]);
        if (count($keys) == 0) {
            return false;
        }

        return $this->redis
            ->pipeline()
            ->del($keys)
            ->execute();
    }

    /**
     * @param $key
     * @return array
     * @throws \Exception
     */
    private function getExecute($key): array
    {
        $data = $this->redis
            ->pipeline()
            ->get($key)
            ->execute();
        return $data;
    }
}