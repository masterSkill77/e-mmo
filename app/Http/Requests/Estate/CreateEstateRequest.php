<?php

namespace App\Http\Requests\Estate;

use App\Trait\Request\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class CreateEstateRequest extends FormRequest
{
    use FailedValidation;
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
            'fb_published' => 'required|bool',
            'price' => 'required|integer',
            'state' => 'required|string',
            'paiement' => 'required|string',
            'description' => 'required|string',
            'agence_id' => 'required|integer',
        ];
    }
}
