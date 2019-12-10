<?php
use poe\core\Configurable;
use poe\core\Initializer;
use poe\core\TypeHints;

require "vendor/autoload.php";
require "core/helpers.php";

class BaseObject {
    use Configurable, Initializer, TypeHints;

    public $name;

    public function __construct(array $config = [])
    {
        $this->configure($config);
        $this->initialTraits();
    }

    public function getTypeHints()
    {
        return [
            'name' => 'dir'
        ];
    }
}

$b = new BaseObject(['name' => __DIR__]);
echo json_encode($b);