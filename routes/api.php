<?php

use App\Controllers\ConstructorController;
use App\Controllers\Auth\JWT\JWTController;
use App\Controllers\Auth\LoginController;
use App\Controllers\Controller;
use App\Controllers\ProductController;
use App\Middleware\Exemple;
use App\Services\Auth\JWT\JWT;
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

$routeCollection->get("/api/test/", [Controller::class, "index"])
    // ->middleware(["jwt-auth"])
    // ->tokens(["id" => "[0-9]"])
    // ->middleware([Exemple::class, Exemple2::class])
;

$routeCollection->post("/api/test/", [Controller::class, "store"]);

// $routeCollection->get("/api/products/", [ProductController::class, "index"]);

// $routeCollection->get("/api/product/{id}", [ProductController::class, "show"])
//     ->tokens(["id" => "[0-9]+"]);

$routeCollection->get("/api/constructor/", [ConstructorController::class, "index"]);

$routeCollection->get("/api/constructor/{id}", [ConstructorController::class, "show"])
    ->tokens(["id" => "[0-9]+"]);

// $routeCollection->post("/api/constructor/{id}", [ConstructorController::class, "check"])
//     ->tokens(["id" => "[0-9]+"]);;


// $routeCollection->delete("/api/constructor/{id}/{itemId}", [ConstructorController::class, "delete"])
//     ->tokens([
    //         "id" => "[0-9]+",
    //         "itemId" => "[0-9]+"
    //     ]);
    // $routeCollection->post("/api/jwt/login", [JWTController::class, "login"]);

    return $routeCollection;
