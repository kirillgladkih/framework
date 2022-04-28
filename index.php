<?php

use App\Controllers\Controller;
use Core\Resolver\Resolver;
use Core\Routing\Router\Route;
use Core\Routing\Router\RouteCollection;
use Core\Routing\Router\Router;
use Laminas\Diactoros\ServerRequestFactory;

require_once __DIR__ . "/bootstrap.php";

ini_set('display_errors',1);
ini_set("error_reporting", E_ALL);

$request = ServerRequestFactory::fromGlobals();

$router = new Router();

$router->loadMap(include(__DIR__ . "/routes/api.php"));

dd($router->match($request));

// dd($routeColletion);



// $router->get(
//     "/test/{id}/", //url
//     [Controller::class, "index"], //handler
//     ["id" => "[0-9]+"] // rules
// );

// $route = $router->match($request);

// $handler = $route->handler();

// $resolver = new Resolver();

// $response = $resolver->resolve($handler)($request);

// dd($response->getHeaders());
