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
            'is_published' => 'bool',
            'fb_published' => 'bool',
            'price' => 'required|integer',
            'state' => 'required|string',
            'localisation' => 'required|string',
            'paiement' => '',
            'description' => 'required|string',
            'agence_id' => 'required|integer',
        ];
    }
}
