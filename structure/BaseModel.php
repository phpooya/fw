<?php
namespace phpooya\structure;

use phpooya\fm\core\Accessor;
use phpooya\fm\core\ArrayJson;
use phpooya\fm\core\Configurable;
use phpooya\fm\core\Initializer;

class BaseModel
{
    use Configurable, Initializer, Accessor, ArrayJson;

    public function __construct($config = [])
    {
        $this->configure($config);
        $this->initialTraits();
    }
}