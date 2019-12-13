<?php
namespace poe\core;

use ReflectionClass;
use ReflectionProperty;

trait ArrayJson
{
    public function toArray()
    {
        $r = new ReflectionClass($this);
        $attrs = $r->getProperties(ReflectionProperty::IS_PUBLIC);
        $return = [];
        foreach ($attrs as $attr) {
            if ($attr->isStatic()) continue;
            $return[$attr->name] = $this->{$attr->name};
        }
        foreach ($this->getExtraFields() as $extra) {
            $return[$extra] = $this->$extra;
        }
        return $return;
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }

    public function getExtraFields()
    {
        return [];
    }
}