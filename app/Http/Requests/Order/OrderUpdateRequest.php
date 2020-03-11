<?php

namespace App\Http\Requests\Order;

use App\Models\Order\Order;
use Illuminate\Foundation\Http\FormRequest;

class OrderUpdateRequest extends FormRequest
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
            'client_email' => ['required', 'email'],
            'partner_id' => ['required', 'exists:partners,id'],
            'status' => ['required', 'numeric', 'in:' . implode(',', array_keys(Order::STATUSES))],
        ];
    }
}
