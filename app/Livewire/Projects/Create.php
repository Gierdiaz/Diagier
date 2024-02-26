<?php

namespace App\Http\Livewire\Projects;

use App\Models\{Developer, Project};
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $name;

    public $description;

    public $client;

    public $technologies;

    public $start_date;

    public $end_date;

    public $budget;

    public $status = 'progress';

    public $developer_id;

    public function render()
    {
        $developers = Developer::all();

        return view('livewire.projects.create', compact('developers'));
    }

    public function store()
    {
        $validate = $this->validate([
            'name'         => 'required',
            'description'  => 'required',
            'client'       => 'required',
            'technologies' => 'required',
            'start_date'   => 'required|date',
            'end_date'     => 'required|date',
            'budget'       => 'required|numeric',
            'status'       => 'required|in:progress,completed,suspended',
            'developer_id' => 'required|exists:developers,id',
        ]);

        $validate['user_id'] = Auth::id();
        Project::create($validate);

        session()->flash('success', 'Project created successfully!');

        return redirect()->route('projects.index');
    }
}
