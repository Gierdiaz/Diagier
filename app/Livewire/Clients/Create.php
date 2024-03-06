<?php

namespace App\Livewire\Clients;

use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $surname;
    public $email;
    public $company;
    public $position;
    public $phone;
    public $observation;

    protected $rules = [
        'name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'email' => 'required|email|unique:clients,email',
        'company' => 'required|string|max:255',
        'position' => 'nullable|string|max:255',
        'phone' => 'required|string|max:20',
        'observation' => 'nullable|string',
    ];

    public function render()
    {
        return view('livewire.clients.create');
    }

    public function store()
    {
        $validate = $this->validate($this->rules);

        $validate['user_id'] = Auth::id();

        try {
            Client::create($validate);

            session()->flas1h('success', 'Client created successfully!');

            $this->reset();
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to create Client: ' . $e->getMessage());
        }

        return redirect()->route('clients.index');
    }
}
