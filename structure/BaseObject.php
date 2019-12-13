<?php
namespace phpooya\fm\structure;

use phpooya\fm\core\Accessor;
use phpooya\fm\core\ArrayJson;
use phpooya\fm\core\Configurable;

class BaseObject
{
    use Configurable, Accessor, ArrayJson;

    public function __construct($options = [])
    {
        $this->configure($options);
    }
}