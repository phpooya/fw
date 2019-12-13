<?php
use phpooya\fm\tests\User;

require "vendor/autoload.php";

$user = new User([
    'id' => 1,
    'fName' => 'Pooya',
    'lName' => 'Eraghi',
    'mobile' => '09153594313',
    'image' => __FILE__
]);
echo $user->toJson(JSON_PRETTY_PRINT);