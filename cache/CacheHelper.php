<?php
namespace app\cache;

use DateInterval;
use Exception;
use DateTime;

class CacheHelper
{
    /**
     * @param string $key the unique name of cache which you want to access
     * @param callable $func the base algorithm which create your data
     * @param DateInterval|DateTime|integer $interval the time which cache will expire
     * @return mixed if cache is available and not expired then it will return otherwise your function will execute
     * @throws Exception if some error occur
     */
    public static function remember(string $key, callable $func, $interval)
    {
        if (is_int($interval)) {
            $interval = (new DateTime())->modify("+$interval minute");
        }

        if ($interval instanceof DateInterval) {
            $interval = (new DateTime())->add($interval);
        }


        $cache = new Cache($key);
        if ($cache->isAvailable()) {
            return $cache->get();
        }
        $data = call_user_func($func);
        $cache->set($data);
        return $data;
    }

    /**
     * @param string $key the unique name of cache which you want to access
     * @param callable $func the base algorithm which create your data
     * @return mixed if cache is available then it will return otherwise your function will execute
     */
    public static function rememberForever(string $key, callable $func)
    {
        $cache = new Cache($key);
        if ($cache->isAvailable()) {
            return $cache->get();
        }

        $data = call_user_func($func);
        $cache->set($data);
        return $data;
    }

    /**
     * @param string $key the unique name of cache which you want to access
     * @param callable $func the base algorithm which create your data
     * @param mixed $condition a callable or binary data which represent validity of cache
     * @return mixed if condition is true then cache data will return otherwise your function will execute
     */
    public static function rememberIf(string $key, callable $func, $condition)
    {
        if (is_callable($condition)) {
            $condition = call_user_func($condition);
        }

        $cache = new Cache($key);
        if ($condition and $cache->isAvailable()) {
            return $cache->get();
        }

        $data = call_user_func($func);
        $cache->set($data);
        return $data;
    }
}