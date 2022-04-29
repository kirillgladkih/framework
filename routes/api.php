<?php

use App\Controllers\Controller;
use Core\Routing\Router\RouteCollection;

$routeCollection = new RouteCollection;

$routeCollection->get("/test/", [Controller::class, "index"])
    ->tokens(["id" => "[0-9]"])
    ->middleware(["test"]);

return $routeCollection;
