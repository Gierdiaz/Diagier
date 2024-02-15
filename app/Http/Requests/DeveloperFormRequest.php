<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeveloperFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:developers,email',
            'github' => 'required|string|unique:developers,github',
            'bio' => 'nullable|string',
            'technologies' => 'required|string|max:255',
            'college' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'certifications' => 'nullable|string',
            'company' => 'required|string|max:255',
            'level' => 'required|string|in:intern,junior,intermediate,senior,lead,manager,director,vp,executive,admin,specialist,consultant',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'work_mode' => 'required|string|in:home_office,presential,hybrid',
        ];
    }
}
