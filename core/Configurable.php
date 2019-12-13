<?php
namespace poe\core;

use Exception;

trait Configurable
{
    public function configure(array $config = [])
    {
        $hasSetter = method_exists($this, '__set');

        foreach ($config as $attr => $value) {
            if (!$hasSetter and !property_exists($this, $attr)) {
                throw new Exception(sprintf("attribute '%s' does not exists on '%s'", $attr, static::class));
            }

            $this->$attr = $value;
        }
    }
}