<?php
namespace app\cache\validation;

class Change extends Base
{
    public function validate($data)
    {
        return $this->data === $data;
    }
}