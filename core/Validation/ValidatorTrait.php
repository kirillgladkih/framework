<?php

namespace Core\Validation;

trait ValidatorTrait
{
    /**
     * Get rules for validator
     *
     * @return array
     */
    abstract protected function rules(): array;
    /**
     * Before hook
     *
     * @return void
     */
    protected function before(){}
    /**
     * After hook
     *
     * @return void
     */
    protected function after(){}
    /**
     * Failed hook
     *
     * @return void
     */
    protected function failed(){}
    /**
     * Get errors
     *
     * @return array
     */
    public function errors(): array
    {
        return $this->errors;
    }
}
