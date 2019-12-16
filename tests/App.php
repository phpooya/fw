<?php
namespace phpooya\fw\tests;

use phpooya\fw\component\PhpSession;
use phpooya\fw\component\SimpleRequest;
use phpooya\fw\core\ArrayJson;
use phpooya\fw\structure\BaseApp;

class App extends BaseApp
{
    use PhpSession, SimpleRequest, ArrayJson;

    public function getExtraFields()
    {
        return [
            'session',
            'request'
        ];
    }
}