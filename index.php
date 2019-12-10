<?php
require "core/helpers.php";
require "core/Initializer.php";
require "core/Configurable.php";
require "core/TypeHints.php";

use poe\core\Configurable;
use poe\core\Initializer;
use poe\core\TypeHints;

class Book {
    use Initializer, Configurable, TypeHints;

    public $name;

    public function __construct(array $config = [])
    {
        $this->configure($config);
        $this->initialTraits();
    }
}

$b = new Book(['name' => 'Pooya']);
echo json_encode($b);