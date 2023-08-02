<?php

namespace App\Http\Requests\Agence;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateAgenceRequest extends FormRequest
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
            'agence_name' => 'bail|required|unique:agences',
            'agence_phone' => 'required|unique:agences',
            'agence_site_url' => 'string',
            'agence_adresse' => 'required',
            'agence_status' => 'required',
            'agence_mail' => 'required|email|unique:agences',
            'agence_sender_mail' => 'required|email',
            'agence_smtp_host' => 'string',
            'agence_smtp_port' => 'integer',
            'agence_smtp_username' => 'string',
            'agence_logo_id' => 'required',
            "agence_smtp_password" => 'string',
            'responsable_id' => 'required|integer'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 400));
    }
}
