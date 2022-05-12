<?php

use Core\Services\App;

require_once __DIR__ . "/bootstrap.php";

ini_set('display_errors', 1);
ini_set("error_reporting", E_ALL);
$app = new App();
$app->run();