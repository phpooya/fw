<?php
namespace phpooya\fw\tests;

use phpooya\fw\core\TypeHints;

/**
 * Class User
 * @property string $fullName
 */
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
            'id' => 'numeric',
            'fName' => 'string',
            'lName' => 'string',
            'mobile' => 'numeric',
            'image' => 'file',
            'fullName' => 'string'
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