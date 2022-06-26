<?php

require dirname(__DIR__, 1) . "/vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection([
    "driver" => "mysql",
    "host" => "127.0.0.1",
    "database" => "praxis",
    "username" => "root",
    "password" => ""
]);

$capsule->setAsGlobal();

$capsule->bootEloquent();