<?php

namespace Core\Services;

use Core\Response\Sender;
use Core\Resolver\Resolver;
use Core\Routing\Router\Router;
use Core\Routing\Interfaces\IRouter;
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;
use Core\Request\Exception\IRequestExceptiion;
use Core\Resolver\IResolver;

class App
{
    /**
     * Stack action
     *
     * @var array
     */
    protected array $stak = [];
    /**
     * Request
     *
     * @var ServerRequestInterface
     */
    protected ServerRequestInterface $request;
    /**
     * Router
     *
     * @var IRouter
     */
    protected IRouter $router;
    /**
     * Resolver
     *
     * @var IResolver
     */
    protected IResolver $resolver;
    /**
     * Init
     */
    public function __construct()
    {
        $this->request = ServerRequestFactory::fromGlobals();
        $this->router = new Router();
        $this->resolver = new Resolver();

        $this->boot();
    }
    /**
     * Bootstrap
     *
     * @return void
     */
    public function boot() : void
    {
        $this->router->loadMap(include(__DIR__ . "/../../routes/api.php"));
    }
    /**
     * Exec app
     *
     * @return void
     */
    public function run()
    {
        try {

            $route = $this->router->match($this->request);

            foreach ($route->getAttributeCollection()->all() as $key => $attribute)
                $this->request = $this->request->withAttribute($key, $attribute);

            foreach($route->getMiddlewareCollection()->all() as $item)
                $this->stak[] = [$item, "handle"];

            $this->stak[] = $route->getHandler();

            foreach($this->stak as $item)
                $response = $this->resolver
                    ->resolve($item, $this->request)($this->request);


        } catch (IRequestExceptiion $exception) {

            $response = new JsonResponse(
                ["errors" => $exception->getMessage()],
                $exception->getCode()
            );
        }

        Sender::send($response);
    }
}
