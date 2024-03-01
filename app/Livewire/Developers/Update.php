<?php

namespace App\Livewire\Developers;

use App\Models\Developer;
use Livewire\Component;

class Update extends Component
{
    public $developer;

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

    public $work_mode;

    public function render()
    {
        return view('livewire.developers.edit');
    }

    public function mount(Developer $developer)
    {
        $this->developer      = $developer;
        $this->name           = $developer->name;
        $this->email          = $developer->email;
        $this->github         = $developer->github;
        $this->bio            = $developer->bio;
        $this->technologies   = $developer->technologies;
        $this->college        = $developer->college;
        $this->course         = $developer->course;
        $this->certifications = $developer->certifications;
        $this->company        = $developer->company;
        $this->level          = $developer->level;
        $this->city           = $developer->city;
        $this->state          = $developer->state;
        $this->country        = $developer->country;
        $this->work_mode      = $developer->work_mode;
    }

    public function updateDeveloper()
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

        $this->developer->update($validate);

        session()->flash('message', 'Developer updated successfully!');

        return redirect()->route('developers.index');
    }

}
