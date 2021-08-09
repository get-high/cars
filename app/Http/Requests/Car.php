<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Car extends FormRequest
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
            'name' => 'required|string',
            'body' => 'required|string',
            'price' => 'required|integer',
            'old_price' => 'nullable|integer',
            'car_body_id' => 'required|integer|exists:car_bodies,id'
        ];
    }
}
