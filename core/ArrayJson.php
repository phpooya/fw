<?php
namespace phpooya\fw\core;

use phpooya\fw\helper\Obj;
use ReflectionClass;
use ReflectionProperty;

trait ArrayJson
{
    public function toArray()
    {
        $r = new ReflectionClass($this);
        $attrs = $r->getProperties(ReflectionProperty::IS_PUBLIC);
        $return = $fields = [];
        foreach ($attrs as $attr) {
            if ($attr->isStatic()) continue;
            $fields[] = $attr->name;
        }
        foreach (array_merge($fields, $this->getExtraFields()) as $extra) {
            $value = $this->$extra;
            $isArrayJson = (is_object($value) and in_array(ArrayJson::class, Obj::classUsesRecursive($value)));
            if ($isArrayJson) {
                /** @var ArrayJson $value */
                //@todo: check recursive loop
                $return[$extra] = $value->toArray();
            } else {
                $return[$extra] = $value;
            }
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