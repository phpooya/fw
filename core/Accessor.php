<?php
namespace poe\core;

use Exception;

trait Accessor
{
    public function __get($name)
    {
        $method = "get" . ucfirst($name) . "Attribute";
        if (method_exists($this, $method)) {
            return call_user_func([$this, $method]);
        }

        $method = "set" . ucfirst($name) . "Attribute";
        if (method_exists($this, $method)) {
            throw new Exception(sprintf("attribute '%s' is write-only", $name));
        }

        throw new Exception(sprintf("attribute '%s' does not exists on '%s'", $name, static::class));
    }

    public function __set($name, $value)
    {
        $method = "set" . ucfirst($name) . "Attribute";
        if (method_exists($this, $method)) {
            return call_user_func([$this, $method], $value);
        }

        $method = "get" . ucfirst($name) . "Attribute";
        if (method_exists($this, $method)) {
            throw new Exception(sprintf("attribute '%s' is read-only", $name));
        }

        throw new Exception(sprintf("attribute '%s' does not exists on '%s'", $name, static::class));
    }
}