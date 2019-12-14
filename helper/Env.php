<?php
namespace phpooya\fw\helper;

class Env
{
    private static $env = [];

    public static function get($key, $default = null)
    {
        return isset(static::$env[$key]) ? static::$env[$key] : $default;
    }

    public static function set($key, $value)
    {
        return static::$env[$key] = $value;
    }
}