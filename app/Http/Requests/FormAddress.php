<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormAddress extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'address.first_name' => 'required',
            'address.last_name' => 'required',
            'address.address_name' => 'required',
            'address.country' => 'required',
            'address.city' => 'required',
            'address.phone_number' => 'required',
            'address.email' => 'required|email',
        ];
    }
}
