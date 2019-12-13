<?php
namespace phpooya\fm\core;

use phpooya\fm\helper\Obj;

trait Initializer
{
    public function initialTraits()
    {
        $class = static::class;

        foreach (Obj::classUsesRecursive($class) as $traits) {
            $method = "initial" . Obj::classBasename($traits);
            if (method_exists($this, $method)) call_user_func([$this, $method]);
        }
    }
}