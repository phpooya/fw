<?php
namespace app\cache\validation;

abstract class Base implements CacheValidationInterface
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
}