<?php
use phpooya\fm\core\Configurable;
use phpooya\fm\core\Initializer;
use phpooya\fm\core\TypeHints;
use phpooya\fm\core\Accessor;
use phpooya\fm\core\ArrayJson;

require "vendor/autoload.php";
require "core/helpers.php";

/**
 * Class BaseObject
 * @property $rand
 * @property $cap
 */
class BaseObject {
    use Configurable, Initializer, TypeHints, Accessor, ArrayJson;

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

    public function getExtraFields()
    {
        return ['rand'];
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

class FinalObject extends BaseObject {
    public $id;
    public $mobile;
}

$b = new FinalObject(['name' => __DIR__, 'cap' => 'hello world']);
echo $b->toJson(JSON_PRETTY_PRINT);