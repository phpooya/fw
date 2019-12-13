<?php
use poe\core\Configurable;
use poe\core\Initializer;
use poe\core\TypeHints;
use poe\core\Accessor;

require "vendor/autoload.php";
require "core/helpers.php";

/**
 * Class BaseObject
 * @property $rand
 * @property $cap
 */
class BaseObject {
    use Configurable, Initializer, TypeHints, Accessor;

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

    public function getRandAttribute()
    {
        return rand(1, 1000);
    }

    private $_cap;
    public function setCapAttribute($value)
    {
        $this->_cap = strtoupper($value);
    }
}

$b = new BaseObject(['name' => __DIR__, 'cap' => 'hello world']);
var_dump($b, $b->rand);