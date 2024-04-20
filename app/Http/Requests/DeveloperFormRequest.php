<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeveloperFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'           => ['required', 'string'],
            'email'          => ['required', 'email'],
            'github'         => ['required','string'],
            'bio'            => ['nullable', 'string'],
            'technologies'   => ['required','string'],
            'college'        => ['required','string'],
            'course'         => ['required','string'],
            'certifications' => ['nullable', 'string'],
            'company'        => ['required','string'],
            'level'          => ['required','in:intern,junior,intermediate,senior,lead,manager,director,vp,executive,admin,specialist,consultant'],
            'city'           => ['required','string'],
            'state'          => ['required','string'],
            'country'        => ['required','string'],
            'work_mode'      => ['required','in:home_office,presential,hybrid'],
        ];
    }
}
