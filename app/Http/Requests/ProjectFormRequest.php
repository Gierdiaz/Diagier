<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectFormRequest extends FormRequest
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
            'name'         => ['required', 'string'],
            'description'  => ['required', 'string'],
            'client'       => ['required', 'string'],
            'technologies' => ['required', 'string'],
            'start_date'   => ['required', 'date'],
            'end_date'     => ['required', 'date', 'after_or_equal:start_date'],
            'budget'       => ['required', 'numeric', 'min:0'],
            'status'       => ['required', 'in:progress,completed,suspended'],
            'developer_id' => ['required', 'exists:developers,id'],
            'client_id'    => ['required', 'exists:clients,id'],
        ];
    }
}
