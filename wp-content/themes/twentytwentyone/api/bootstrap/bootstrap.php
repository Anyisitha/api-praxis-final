<?php

require dirname(__DIR__, 1) . "/vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection([
    "driver" => "mysql",
    "host" => "praxispharmaceutical.com.co",
    "database" => "praxis_local",
    "username" => "root_prod",
    "password" => "Praxis123*"
]);

$capsule->setAsGlobal();

$capsule->bootEloquent();