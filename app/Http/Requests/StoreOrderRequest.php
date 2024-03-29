<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'identification_number' => 'required|numeric',
            'phone' => 'required|numeric',
            'church' => 'required',
            'team' => 'required',
            'promoter' => 'required',
            'coupons' => 'required|array|min:1'
        ];
    }
}
