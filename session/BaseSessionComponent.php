<?php
namespace phpooya\fw\session;

use phpooya\fw\structure\BaseComponent;

/**
 * Trait PhpSession
 * @property SessionInterface $session
 */
trait BaseSessionComponent
{
    use BaseComponent;

    /** @var SessionInterface */
    private $_session;

    public function getSessionAttribute()
    {
        if ($this->_session === null) {
            $class = $this->sessionClass();
            $this->_session = new $class;
            $this->_session->start();
        }

        return $this->_session;
    }

    /** @return SessionInterface */
    abstract protected function sessionClass();
}