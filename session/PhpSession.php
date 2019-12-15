<?php
namespace phpooya\fw\session;

use phpooya\fw\structure\BaseObject;

class PhpSession extends BaseObject implements SessionInterface
{
    public function start()
    {
        //@todo: must clean output before starting
        return @ session_start();
    }

    public function offsetExists($offset)
    {
        return isset($_SESSION[$offset]);
    }

    public function offsetSet($offset, $value)
    {
        $_SESSION[$offset] = $value;
    }

    public function offsetGet($offset)
    {
        return $_SESSION[$offset];
    }

    public function offsetUnset($offset)
    {
        unset($_SESSION[$offset]);
    }
}