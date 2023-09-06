<?php

namespace App\Http\Requests\Agence;

use App\Trait\Request\FailedValidation;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateAgenceRequest extends FormRequest
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
            'agence_name' => 'bail|',
            'agence_phone' => '',
            'agence_site_url' => 'string',
            'agence_adresse' => 'string',
            'agence_status' => 'string',
            'agence_mail' => 'email|',
            'agence_sender_mail' => 'email',
            'agence_smtp_host' => 'string',
            'agence_smtp_port' => 'integer',
            'agence_smtp_username' => 'string',
            "agence_smtp_password" => 'string',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 400));
    }
}
