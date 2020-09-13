<?php

namespace App\Http\Livewire\Bounties;

use Livewire\Component;

class CreateComponent extends Component
{
    public function submit()
    {
        info('submit');
    }

    public function render()
    {
        return view('livewire.bounties.create-component', [
            'name' => auth()->user()->company()->name
        ])->extends('layouts.app')->slot('content');
    }
}
