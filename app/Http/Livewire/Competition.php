<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Competition extends Component
{
    public \App\Models\Competition $competition;

    public function render()
    {
        return view('livewire.competition');
    }
}
