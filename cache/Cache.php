<?php
namespace app\cache;

use app\cache\validation\CacheValidationInterface;

class Cache
{
    private $key;

    private $function;

    private $cacheValidation;

    public function __construct(string $key)
    {
        $this->key = $key;
        $this->function = $func;
        $this->cacheValidation = $cacheValidation;
    }

    public function get()
    {
        if (!isset($_SESSION[$this->key]) or !$this->cacheValidation->validate($_SESSION[$this->key][1]->data())) {
            $_SESSION[$this->key] = [call_user_func($this->function), $this->cacheValidation];
        }

        return $_SESSION[$this->key][0];
    }

    public function set($data)
    {
        $_SESSION[$this->key] = [call_user_func($this->function), $this->cacheValidation];
    }

    public function isAvailable()
    {
        return false;
    }

    public function isValid()
    {
        return false;
    }
}