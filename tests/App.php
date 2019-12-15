<?php
namespace phpooya\fw\tests;

use phpooya\fw\component\PhpSession;
use phpooya\fw\core\ArrayJson;
use phpooya\fw\structure\BaseApp;

class App extends BaseApp
{
    use PhpSession, ArrayJson;

    public function getExtraFields()
    {
        return ['session'];
    }
}