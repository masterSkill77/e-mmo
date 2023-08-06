<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;

class PasswordMismatchException extends Exception
{
    public function render()
    {
        return new JsonResponse(['error' => 'Password you enter mismatch from the current password'], 401);
    }
}
