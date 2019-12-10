<?php
namespace poe\core;

use Exception;

trait Configurable
{
    public function configure(array $config = [])
    {
        foreach ($config as $attr => $value) {
            if (!property_exists($this, $attr)) {
                throw new Exception(sprintf("attribute '%s' does not exists on '%s'", $attr, static::class));
            }

            $this->$attr = $value;
        }
    }
}