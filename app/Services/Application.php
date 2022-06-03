<?php

namespace App\Services;

use CModule;
use Core\Response\Sender;
use Core\Resolver\Resolver;
use Core\Routing\Router\Router;
use Core\Routing\Interfaces\IRouter;
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;
use Core\Request\Exception\IRequestExceptiion;
use Core\Resolver\IResolver;

/**
 * КЛАСС ГДЕ СОБИРАЕТСЯ ПРИЛОЖЕНИЕ
 */

 class Application
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
        /**
         * МЕТОД НАЧАЛЬНОЙ ИНИЦИАЛИЗАЦИИ
         */
        $this->boot();
    }
    /**
     * Bootstrap
     *
     * @return void
     */
    public function boot() : void
    {
        /**
         * ЗДЕСЬ ЗАГРУЖАЮТСЯ РОУТЫ
         * $this->router->loadMap(include(__DIR__ . "/../../routes/api2.php"));
         */
        $this->router->loadMap(include(__DIR__ . "/../../routes/api.php"));

        CModule::IncludeModule("iblock");
    }
    /**
     * Exec app
     *
     * @return void
     */
    public function run()
    {
        try {
            /**
             * ИЩЕТ СООТВЕСТВИЯ В УКАЗАННЫХ РОУТАХ
             * ЕСЛИ СОВПАДЕНИЙ НЕТ ТО ВЫКИДЫВАЕТ IRequestException
             */
            $route = $this->router->match($this->request);
            /**
             * ПОСЛЕ ТОГО КАК РОУТ БЫЛ НАЙДЕН ПОДСТАВЛЯЕТ В request
             * РАСПАРСЕННЫЕ ЗНАЧЕНИЯ, КОТОРЫЕ МЫ УКАЗЫВАЕМ В МЕТОДЕ
             * ->tokens()
             */
            foreach ($route->getAttributeCollection()->all() as $key => $attribute)
                $this->request = $this->request->withAttribute($key, $attribute);
            /**
             * ИЩЕТ ПОСРЕДНИКОВ, ДОБАВЛЯЕТ В ОЧЕРЕДЬ НА ОБРАБОТКУ
             */
            foreach($route->getMiddlewareCollection()->all() as $item){
                if(is_array($item)){
                    foreach ($item as $subItem){
                        $this->stak[] = [$subItem, "handle"];
                    }
                }else{
                    $this->stak[] = [$item, "handle"];
                }
            }

            /**
             * В КОНЕЦ ОЧЕРЕДИ ДОБАВЛЯЕМ НАШ КОНТРОЛЛЕР
             */
            $this->stak[] = $route->getHandler();
            /**
             * РЕЗОЛВИМ НАШУ ОЧЕРЕДЬ
             * ЛИБО ПРОХОДИМ ДАЛЬШЕ, ЛИБО ЛОВИМ ИСКЛЮЧЕНИЕ IRequestException
             */
            foreach($this->stak as $item)
                $response = $this->resolver
                    ->resolve($item, $this->request)($this->request);


        } catch (IRequestExceptiion $exception) {
            /**
             * ЕСЛИ БЫЛО ПОЙМАНО ИСКЛЮЧЕНИЕ, ТО ФОРМИРУЕТСЯ ОТВЕТ
             */
            $response = new JsonResponse(
                [
                    "code" => $exception->getCode(),
                    "message" => $exception->getMessage(),
                    "errors" => $exception->getErrors()
                ],
                $exception->getCode()
            );

        }
        /**
         * ОТПРАВКА ОТВЕТА
         */
        Sender::send($response);
    }
}
