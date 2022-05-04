<?php

use Core\Request\Exception\IRequestExceptiion;
use Core\Resolver\Resolver;
use Core\Response\Sender;
use Core\Routing\Router\Router;
use Laminas\Diactoros\Response\JsonResponse;
use Laminas\Diactoros\ServerRequestFactory;

require_once __DIR__ . "/bootstrap.php";

ini_set('display_errors', 1);
ini_set("error_reporting", E_ALL);

try {
    $request = ServerRequestFactory::fromGlobals();

    $router = new Router();

    $router->loadMap(include(__DIR__ . "/routes/api.php"));

    $route = $router->match($request);

    foreach ($route->getAttributeCollection()->all() as $key => $attribute)
        $request = $request->withAttribute($key, $attribute);

    $resolver = new Resolver();

    $handler = $route->getHandler();

    foreach($route->getMiddlewareCollection()->all() as $item){

        $middleware = new $item($request);

        $middleware->handle($route->getHandler());

    }

    $response = $resolver->resolve($handler)($request);

} catch (IRequestExceptiion $exception) {

    $response = new JsonResponse(
        ["errors" => $exception->getMessage()],
        $exception->getCode()
    );


}

Sender::send($response);
