<?php

namespace App\Http\Requests\Estate;

use Illuminate\Foundation\Http\FormRequest;

class CreateEstateRequest extends FormRequest
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
            'title' => 'bail|required|string',
            'is_published' => 'required|bool',
            'price' => 'required|integer',
            'state' => 'required',
            'paiement' => 'required',
            'description' => 'required',
            'agence_id' => 'required',
        ];
    }
}
