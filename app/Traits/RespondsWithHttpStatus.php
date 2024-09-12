<?php

namespace App\Traits;

use App\Enums\ErrorCodes;
use App\Enums\ErrorTypes;
use Illuminate\Http\JsonResponse;

trait RespondsWithHttpStatus
{
    protected function ok(array|object $data = null, ?string $message = null, int $status = 200): JsonResponse
    {
        return response()->json([
            'message' => filled($message) ? __($message) : null,
            'data' => $data ?: null,
        ], $status);
    }

    protected function created(array|object $data = null, ?string $message = null, int $status = 201): JsonResponse
    {
        return response()->json([
            'message' => filled($message) ? __($message) : null,
            'data' => $data ?: null,
        ], $status);
    }

    public function error(
        string $message = null,
        array  $errors = null,
        int    $status = 422,
        ?string $errorType = ErrorTypes::Error,
        ?string $errorCode = ErrorCodes::Generic
    ): JsonResponse {
        return response()->json([
            'type' => $errorType ?: ErrorTypes::Error,
            'code' => $errorCode ?: ErrorCodes::Generic,
            'message' => filled($message) ? __($message) : null,
            'errors' => $errors ?: null,
        ], $status ?: 400);
    }
}
