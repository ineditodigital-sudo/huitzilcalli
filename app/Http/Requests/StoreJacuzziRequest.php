<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJacuzziRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|numeric',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'precio1' => 'required|numeric',
            'precio2' => 'required|numeric',
            'capacity' => 'required|numeric',
            'lat' => 'required|string|max:50',
            'lng' => 'required|string|max:50',
            'amenities' => 'string',
        ];
    }
}
