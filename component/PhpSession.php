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

    /** @var SessionInterface */
    private $_session;

    public function getSessionAttribute()
    {
        if ($this->_session === null) {
            $this->_session = new Session();
            $this->_session->start();
        }

        return $this->_session;
    }
}