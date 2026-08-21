<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as HttpResponse;

trait ApiResponser {
    private function sendResponse(?string $message=null, ?string $error = null, $data = null, bool $success = true, int $code = HttpResponse::HTTP_OK): JsonResponse 
    {
        return response()->json([
            'success' => $success,
            'message' => $message ?? $error,
            'data' => $data
        ], $code);
    }

    public function successResponse(?string $message=null, $data = null): JsonResponse
    {
        return $this->sendResponse(message: $message, data: $data);
    }

    public function errorResponse(?string $errorMessage=null, $data = null): JsonResponse
    {
        return $this->sendResponse(error: $errorMessage, data: $data, success: false, code: HttpResponse::HTTP_BAD_REQUEST);
    }

    public function notFoundResponse(): JsonResponse
    {
        return $this->sendResponse("Запрашиваемый ресурс не найден!", success: false, code: HttpResponse::HTTP_NOT_FOUND);
    }
}