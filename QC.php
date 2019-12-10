<?php
namespace is\addon;

class QC
{
    private $menu = [];
    private $checkAccess = false;

    public static function addon()
    {
        return new static();
    }

    public function menu(array $menu = [])
    {
        $this->menu = $menu;
        return $this;
    }

    public function checkAccess($check = true)
    {
        $this->checkAccess = $check;
        return $this;
    }

    public function route()
    {
        //if (checkAccess = true) then check admin roles against menus.

        return "hello world.";
    }
}