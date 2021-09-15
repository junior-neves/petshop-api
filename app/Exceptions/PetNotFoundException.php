<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class PetNotFoundException extends Exception
{
    public function render(): JsonResponse
    {
        return response()->json(
            ['error' => "Pet not found"],
            404
        );
    }
}
