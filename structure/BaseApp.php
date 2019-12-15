<?php
namespace phpooya\fw\structure;

use phpooya\fw\core\Accessor;
use phpooya\fw\core\Configurable;
use phpooya\fw\core\Initializer;

abstract class BaseApp
{
    use Configurable, Initializer, Accessor;

    public function __construct($config = [])
    {
        $this->configure($config);
        $this->initialTraits();
    }
}