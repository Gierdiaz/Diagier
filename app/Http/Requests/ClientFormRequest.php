<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientFormRequest extends FormRequest
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
            'name'        => 'required|string|max:255',
            'surname'     => 'required|string|max:255',
            'email'       => 'required|email',
            'company'     => 'required|string|max:255',
            'position'    => 'nullable|string|max:255',
            'phone'       => 'required|string|max:20',
            'observation' => 'nullable|string',
        ];
    }
}
