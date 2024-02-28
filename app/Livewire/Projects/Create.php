<?php

namespace App\Livewire\Projects;

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

    protected $rules = [
        'name'         => 'required',
        'description'  => 'required',
        'client'       => 'required',
        'technologies' => 'required',
        'start_date'   => 'required|date',
        'end_date'     => 'required|date',
        'budget'       => 'required|numeric',
        'status'       => 'required|in:progress,completed,suspended',
        'developer_id' => 'required|exists:developers,id',
    ];

    public function store()
    {
        $validatedData = $this->validate($this->rules);

        $validatedData['user_id'] = Auth::id();

        try {
            Project::create($validatedData);

            session()->flash('success', 'Project created successfully!');

            $this->reset();
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to create project: ' . $e->getMessage());
        }

        return redirect()->route('projects.index');
    }

    public function render()
    {
        $developers = Developer::all();

        return view('livewire.projects.create', compact('developers'));
    }
}
