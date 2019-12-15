<?php
namespace phpooya\fw\component;

use phpooya\fw\structure\BaseComponent;
use phpooya\fw\session\SessionInterface;
use phpooya\fw\session\PhpSession as Session;

/**
 * Trait PhpSession
 * @property SessionInterface $session
 */
trait PhpSession
{
    use BaseComponent;

    public function getSessionAttribute()
    {
        return new Session();
    }
}