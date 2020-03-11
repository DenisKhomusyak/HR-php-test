<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\JsonRequest;

/**
 * Class ProductPriceUpdateRequest
 * @package App\Http\Requests\Product
 */
class ProductPriceUpdateRequest extends JsonRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_id' => ['required', 'exists:products,id'], // todo(denisk) check order has product
            'price' => ['required', 'numeric'],
        ];
    }
}
