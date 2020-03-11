<?php

namespace App\Http\Requests\Product;

use App\Models\Product\Product;
use Illuminate\Foundation\Http\FormRequest;

class ProductFilterRequest extends FormRequest
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
            'sort.column' => ['string', 'nullable', 'in:' . implode(',', Product::getSortColumns())],
            'sort.type' => ['string', 'nullable', 'in:desc,asc'],
            'count' => ['numeric', 'nullable'],
        ];
    }
}
