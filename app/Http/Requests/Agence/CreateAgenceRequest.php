<?php

namespace App\Http\Requests\Agence;

use App\Trait\Request\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class CreateAgenceRequest extends FormRequest
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
            'agence_name' => 'bail|required|unique:agences',
            'agence_phone' => 'required|unique:agences',
            'agence_site_url' => 'string|unique:agences',
            'agence_adresse' => 'required',
            'agence_logo' => 'required',
            'password' => 'required',
            'agence_mail' => 'required|email|unique:agences',
            'responsable_name' => 'required',
        ];
    }
}
