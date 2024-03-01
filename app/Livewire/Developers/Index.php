<?php

namespace App\Livewire\Developers;

use App\Models\Developer;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $developers = Developer::orderBy('id', 'desc')->paginate(5);

        return view('livewire.developers.index', compact('developers'));
    }
}
