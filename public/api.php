<?php

require_once __DIR__ . "/framework/vendor/autoload.php";
require_once __DIR__ . "/bitrix/modules/main/include/prolog_before.php";

use App\Services\Application;

ini_set('display_errors', 1);
ini_set("error_reporting", E_ALL);

/**
 * ТОЧКА ВХОДА ДЛЯ API
 */

$app = new Application();
$app->run();
