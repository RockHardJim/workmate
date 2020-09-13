<?php

namespace App\Http\Livewire\Bounties;

use Livewire\Component;

class ActiveComponent extends Component
{
    public function render()
    {
        return view('livewire.bounties.active-component')->layout('layouts.app')->slot('content');
    }
}
