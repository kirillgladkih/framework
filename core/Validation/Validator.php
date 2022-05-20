<?php

namespace Core\Validation;

use Psr\Http\Message\ServerRequestInterface;

class Validator
{
    use ValidatorTrait;
    /**
     * Errors
     *
     * @var array
     */
    protected array $errors = [];
    /**
     * Resolver
     *
     * @var Resolver
     */
    protected $resolver;
    /**
     * Request
     *
     * @var ServerRequestInterface
     */
    protected ServerRequestInterface $request;
    /**
     * Init
     */
    public function __construct(ServerRequestInterface $request)
    {
        $this->request = $request;

        $this->resolver = new Resolver();

        $this->before();
    }
    /**
     * This rules
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            "test" => ["thiProdutct"]
        ];
    }
    /**
     * Make validation
     *
     * @return ServerRequestInterface
     */
    public function make(): ServerRequestInterface
    {
        foreach ($this->rules() as $attribute => $ruleArray) {

            foreach ($ruleArray as $rule) {

                $value = $this->request->getParsedBody()[$attribute] ?? null;

                $class = $this->resolver->resolve($rule);

                if (!$class->check($value))
                    $this->errors[$attribute][] = $class->message();

            }
        }

        if (!empty($this->errors))
            $this->failed();

        $this->after();

        return $this->request;
    }
}
