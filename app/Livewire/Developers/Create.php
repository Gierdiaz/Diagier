<?php

namespace App\Livewire\Developers;

use App\Models\Developer;
use Livewire\Component;

class Create extends Component
{
    public $name;

    public $email;

    public $github;

    public $bio;

    public $technologies;

    public $college;

    public $course;

    public $certifications;

    public $company;

    public $level;

    public $city;

    public $state;

    public $country;

    public $work_mode = 'home_office';

    public function render()
    {
        return view('livewire.developers.create');
    }

    public function store()
    {
        $validate = $this->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email',
            'github'         => 'required|string|max:255',
            'bio'            => 'nullable|string',
            'technologies'   => 'required|string|max:255',
            'college'        => 'required|string|max:255',
            'course'         => 'required|string|max:255',
            'certifications' => 'nullable|string|max:255',
            'company'        => 'required|string|max:255',
            'level'          => 'required|in:intern,junior,intermediate,senior,lead,manager,director,vp,executive,admin,specialist,consultant',
            'city'           => 'required|string|max:255',
            'state'          => 'required|string|max:255',
            'country'        => 'required|string|max:255',
            'work_mode'      => 'required|in:home_office,presential,hybrid',
        ]);

        $validate['user_id'] = auth()->id();

        Developer::create($validate);

        session()->flash('message', 'Developer created successfully!');
    }

}
