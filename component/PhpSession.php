<?php
namespace phpooya\fw\component;

use phpooya\fw\session\BaseSessionComponent;
use phpooya\fw\session\PhpSession as Session;

trait PhpSession
{
    use BaseSessionComponent;

    protected function sessionClass()
    {
        return Session::class;
    }
}