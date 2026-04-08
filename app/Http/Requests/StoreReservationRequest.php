<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
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
            'cabin_id' => 'required|numeric',
            'customer' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'start' => 'required|date',
            'end' => 'required|date',
            'notes' => 'nullable|string',
        ];
    }
}
