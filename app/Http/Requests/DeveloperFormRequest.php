<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeveloperFormRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:developers,email',
            'github' => 'required|string|unique:developers,github',
            'bio' => 'string',
            'technologies' => 'required|string',
            'college' => 'required|string',
            'course' => 'required|string',
            'certifications' => 'string',
            'company' => 'required|string',
            'level' => 'required|in:intern,junior,intermediate,senior,lead,manager,director,vp,executive,admin,specialist,consultant',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'work_mode' => 'required|in:home_office,presential,hybrid',
        ];
    }
}
