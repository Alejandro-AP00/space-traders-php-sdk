<?php

namespace AlejandroAPorras\SpaceTraders\Exceptions;

use Exception;

class ValidationException extends Exception
{
    public mixed $data;

    /**
     * @param  array{message: string, code: int, data: mixed}  $error
     */
    public function __construct(array $error)
    {
        parent::__construct($error['message'], $error['code']);

        $this->data = $error['data'];
    }

    public function data()
    {
        return $this->data;
    }
}
