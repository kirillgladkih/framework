<?php

require_once __DIR__ . "/framework/vendor/autoload.php";
require_once __DIR__ . "/bitrix/modules/main/include/prolog_before.php";

use Core\Services\App;

ini_set('display_errors', 1);
ini_set("error_reporting", E_ALL);

$app = new App();
$app->run();
