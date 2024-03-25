<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'         => ['required', 'string'],
            'description'  => ['required', 'string'],
            'comments'     => ['nullable', 'string'],
            'sprint'       => ['required', 'date'],
            'priority'     => ['required', 'in:high,medium,low'],
            'status'       => ['required', 'in:to-do,progress,completed'],
            'developer_id' => ['required', 'exists:developers,id'],
            'project_id'   => ['required', 'exists:projects,id'],
        ];
    }
}
