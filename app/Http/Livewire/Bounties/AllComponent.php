<?php

namespace App\Http\Livewire\Bounties;

use Livewire\Component;

class AllComponent extends Component
{
    public function render()
    {
        return view('livewire.bounties.all-component')->layout('layouts.app')->slot('content');
    }
}
