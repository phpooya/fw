<?php
use phpooya\fw\tests\User;
use phpooya\fw\tests\App;
use phpooya\fw\helper\Env;

require "vendor/autoload.php";
Env::set('env', 'develop');

$user = new User([
    'id' => '1234',
    'fName' => 'Pooya',
    'lName' => 'Eraghi',
    'mobile' => '091512345678',
    'image' => __FILE__
]);
//echo $user->toJson(JSON_PRETTY_PRINT);

$app = new App();
echo $app->toJson(JSON_PRETTY_PRINT);