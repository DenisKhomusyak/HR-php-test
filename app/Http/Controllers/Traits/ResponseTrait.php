<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as BaseResponse;

/**
 * Trait ResponseTrait
 * @package App\Http\Controllers\Traits
 */
trait ResponseTrait
{
    /**
     * Fail response
     *
     * @param string $message message text
     */
    protected function actionFail(string $message = 'Error'): JsonResponse
    {
        return response()->json(['message' => $message], BaseResponse::HTTP_UNPROCESSABLE_ENTITY, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Unauthorised response
     */
    protected function actionUnauthorised(string $message = 'Unauthorised'): JsonResponse
    {
        return response()->json(['message' => $message], BaseResponse::HTTP_UNAUTHORIZED, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Fail response for many errors
     */
    protected function actionErrors(array $errors = []): JsonResponse
    {
        return response()->json(['errors' => $errors], BaseResponse::HTTP_UNPROCESSABLE_ENTITY, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Response ok
     */
    protected function actionSuccess(array $data = [], array $headers = []): JsonResponse
    {
        return response()->json($data, BaseResponse::HTTP_OK, $headers, JSON_UNESCAPED_UNICODE);
    }
}
