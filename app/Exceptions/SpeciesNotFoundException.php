<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class SpeciesNotFoundException extends Exception
{
    public function render(): JsonResponse
    {
        return response()->json(
            ['error' => "Species not found"],
            404
        );
    }
}
