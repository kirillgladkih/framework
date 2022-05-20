<?php

use App\Controllers\ConstructorController;
use App\Controllers\Controller;
use App\Controllers\ProductController;
use App\Middleware\Exemple;
use Core\Routing\Router\RouteCollection;

$routeCollection = new RouteCollection;

/**
 * ALLOWED HTTP METHODS : [POST, GET, PUT, DELETE, PATCH, HEAD, OPTIONS]
 *
 * ROUTECOLLECTION CLASS METHODS : middleware, tokens
 *
 * 1 - устанавливает посредника (прежде чем установить посредника его необходимо добавить в /framework/config/middlewares.php)
 * 2 - метод добавляет регулярное выражение, которое будет распирсиваться и передаваться в request
 *
 * ФАЙЛЫ С РОУТАМИ ДОЛЖНЫ ВОЗВРАЩАТЬ НАСЛЕДНИКА ОТ IRouteCollection
 *
 * ЧТОБЫ ПОСМОТРЕТЬ КАК ПОДКЛЮЧИТЬ БОЛЬШЕ ЧЕМ ОДИН ФАЙЛ С РОУТАМИ ПЕРЕХОДИ
 * В ЭТОТ ФАЙЛ ./framework/app/Services/Application.php
 *
 */

$routeCollection->get("/api/test/{id}", [Controller::class, "index"])
    ->tokens(["id" => "[0-9]"])
    // ->middleware([Exemple::class, Exemple2::class])
    ;

$routeCollection->post("/api/test/", [Controller::class, "store"]);

$routeCollection->get("/api/constructor/{id}", [ConstructorController::class, "show"])
    ->tokens(["id" => "[0-9]+"]);

$routeCollection->post("/api/constructor/{id}", [ConstructorController::class, "check"])
    ->tokens(["id" => "[0-9]+"]);;

return $routeCollection;
