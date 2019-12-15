<?php
namespace phpooya\fw\session;

use ArrayAccess;

interface SessionInterface extends ArrayAccess
{
    public function start();
}