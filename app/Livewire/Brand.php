<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class Brand extends Component
{
    public $users;
    public function mount()
    {
        $this->users = User::all();
    }

    public function render()
    {
        return view('livewire.brand')->with([
            'users' => $this->users,
        ]);
    }
}
