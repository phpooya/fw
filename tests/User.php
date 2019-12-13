<?php
namespace phpooya\fm\tests;

use phpooya\fm\core\TypeHints;

class User extends Model
{
    use TypeHints;

    public $id;
    public $fName;
    public $lName;
    public $mobile;
    public $image;

    public function getTypeHints()
    {
        return [
            'id' => 'int',
            'fName' => 'string',
            'lName' => 'string',
            'mobile' => 'numeric',
            'image' => 'file'
        ];
    }

    public function getExtraFields()
    {
        return ['fullName'];
    }

    public function getFullNameAttribute()
    {
        return "{$this->fName} {$this->lName}";
    }
}