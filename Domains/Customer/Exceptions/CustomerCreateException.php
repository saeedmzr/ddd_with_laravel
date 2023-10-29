<?php

namespace Domains\Customer\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class CustomerCreateException extends Exception
{
    public function __construct($message = "Something went wrong in creating new customer.", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function render(): JsonResponse
    {
        return response()->json(['error' => $this->getMessage()], $this->getCode());
    }
}
