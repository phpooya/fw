<?php
namespace phpooya\fw\request;

use phpooya\fw\structure\BaseComponent;

/**
 * Trait BaseRequestComponent
 * @property RequestInterface $request
 */
trait BaseRequestComponent
{
    use BaseComponent;

    /** @var RequestInterface */
    private $_request;

    public function getRequestAttribute()
    {
        if ($this->_request === null) {
            $class = $this->requestClass();
            $this->_request = new $class;
        }

        return $this->_request;
    }

    /** @return string */
    abstract protected function requestClass();
}