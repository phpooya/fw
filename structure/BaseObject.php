<?php
namespace phpooya\fw\structure;

use phpooya\fw\core\Accessor;
use phpooya\fw\core\ArrayJson;
use phpooya\fw\core\Configurable;

class BaseObject
{
    use Configurable, Accessor, ArrayJson;

    public function __construct($options = [])
    {
        $this->configure($options);
    }
}