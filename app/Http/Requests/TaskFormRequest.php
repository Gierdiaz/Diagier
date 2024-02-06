<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskFormRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'comments' => ['nullable', 'string'],
            'sprint' => ['required', 'date'],
            'priority' => ['required', 'in:high,medium,low'],
            'status' => ['required', 'in:to-do,progress,completed'],
            'developer_id' => ['required', 'exists:developers,id'],
            'project_id' => ['nullable', 'exists:projects,id'],
        ];
    }
}
