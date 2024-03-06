<?php

namespace App\Livewire\Clients;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    public function render()
    {
        $clients = Client::orderBy('id', 'desc')->paginate(5);

        return view('livewire.clients.index',  compact('clients'));
    }
}
