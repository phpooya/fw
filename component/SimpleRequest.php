<?php
namespace phpooya\fw\component;

use phpooya\fw\request\BaseRequestComponent;
use phpooya\fw\request\SimpleRequest as Request;

trait SimpleRequest
{
    use BaseRequestComponent;

    protected function requestClass()
    {
        return Request::class;
    }
}