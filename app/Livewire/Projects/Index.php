<?php

namespace App\Livewire\Projects;

use App\Models\{Project};
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $projects = Project::with('developer')->orderBy('id', 'desc')->paginate(5);

        return view('livewire.projects.index', compact('projects'));
    }
}
