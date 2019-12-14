<?php
use phpooya\fm\tests\User;
use phpooya\fm\helper\Env;

require "vendor/autoload.php";
Env::set('env', 'develop');

$user = new User([
    'id' => '1234',
    'fName' => 'Pooya',
    'lName' => 'Eraghi',
    'mobile' => '09153594313',
    'image' => __FILE__
]);
echo $user->toJson(JSON_PRETTY_PRINT);