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
            'agence_site_url' => 'string',
            'agence_adresse' => 'required',
            'agence_status' => 'required',
            'agence_mail' => 'required|email|unique:agences',
            'agence_sender_mail' => 'required|email',
            'agence_smtp_host' => 'string',
            'agence_smtp_port' => 'integer',
            'agence_smtp_username' => 'string',
            'agence_logo_id' => 'required',
            "agence_smtp_password" => 'required|string',
            'responsable_id' => 'required|integer'
        ];
    }
}
