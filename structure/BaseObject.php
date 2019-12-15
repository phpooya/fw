<?php
namespace phpooya\fw\structure;

use phpooya\fw\core\Accessor;
use phpooya\fw\core\ArrayJson;
use phpooya\fw\core\Configurable;

abstract class BaseObject
{
    use Configurable, Accessor, ArrayJson;

    public function __construct($options = [])
    {
        $this->configure($options);
        $this->init();
    }

    public function init()
    {
        //must be empty always, use construct instead
    }
}