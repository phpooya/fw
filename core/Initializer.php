<?php
namespace phpooya\fm\core;

trait Initializer
{
    public function initialTraits()
    {
        $class = static::class;

        foreach (class_uses_recursive($class) as $traits) {
            $method = "initial" . class_basename($traits);
            if (method_exists($this, $method)) call_user_func([$this, $method]);
        }
    }
}