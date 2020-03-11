<?php

namespace App\Http\Requests;

use App\Http\Requests\Traits\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class JsonRequest
 * @package App\Http\Requests
 */
class JsonRequest extends FormRequest
{
    use JsonResponse;
}
