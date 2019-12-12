<?php
namespace poe\core;

use Exception;

trait Configurable
{
    public function configure(array $config = [])
    {
        $isAccessor = in_array(Accessor::class, trait_uses_recursive(static::class));

        foreach ($config as $attr => $value) {
            if (!$isAccessor and !property_exists($this, $attr)) {
                throw new Exception(sprintf("attribute '%s' does not exists on '%s'", $attr, static::class));
            }

            $this->$attr = $value;
        }
    }
}