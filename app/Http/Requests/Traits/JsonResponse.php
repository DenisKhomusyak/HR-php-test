<?php

namespace App\Http\Requests\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response as BaseResponse;
use Illuminate\Http\Exceptions\HttpResponseException;

/**
 * Trait JsonResponse
 * @package App\Http\Requests\Traits
 */
trait JsonResponse
{
    /**
     * @param Validator $validator
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], BaseResponse::HTTP_UNPROCESSABLE_ENTITY, [], JSON_UNESCAPED_UNICODE));
    }
}
