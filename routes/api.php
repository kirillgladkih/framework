<?php

use Core\Routing\Router\RouteCollection;

$routeCollection = new RouteCollection;

$routeCollection->get("/test/{id}", "test")
    ->tokens(["id" => "[0-9]"]);

return $routeCollection;
