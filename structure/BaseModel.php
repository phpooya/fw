<?php
namespace phpooya\fw\structure;

use phpooya\fw\core\Accessor;
use phpooya\fw\core\ArrayJson;
use phpooya\fw\core\Configurable;
use phpooya\fw\core\Initializer;

abstract class BaseModel
{
    use Configurable, Initializer, Accessor, ArrayJson;

    public function __construct($config = [])
    {
        $this->configure($config);
        $this->initialTraits();
        $this->init();
    }

    public function init()
    {
        //must be empty always, use construct instead
    }
}