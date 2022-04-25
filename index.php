<?php

use Core\Routing\SimpleRouter\Router;
use Laminas\Diactoros\ServerRequestFactory;

require_once __DIR__ . "/bootstrap.php";

ini_set('display_errors',1);
ini_set("error_reporting", E_ALL);

$request = ServerRequestFactory::fromGlobals();

$router = new Router();

$router->get("/test", "");

dd($router->match($request));
