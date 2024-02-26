<?php

namespace App\Http\Livewire\Projects;

use App\Models\{Developer, Project};
use Livewire\Component;

class Update extends Component
{
    public $project;

    public $name;

    public $description;

    public $client;

    public $technologies;

    public $start_date;

    public $end_date;

    public $budget;

    public $status;

    public $developer_id;

    public function render()
    {
        $developers = Developer::all();

        return view('livewire.projects.edit', compact('developers'));
    }

    public function mount(Project $project)
    {
        $this->project      = $project;
        $this->name         = $project->name;
        $this->description  = $project->description;
        $this->client       = $project->client;
        $this->technologies = $project->technologies;
        $this->start_date   = $project->start_date;
        $this->end_date     = $project->end_date;
        $this->budget       = $project->budget;
        $this->status       = $project->status;
        $this->developer_id = $project->developer_id;
    }

    public function update()
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

        $this->project->update($validate);

        session()->flash('success', 'Project updated successfully!');

        return redirect()->route('projects.index');
    }
}
