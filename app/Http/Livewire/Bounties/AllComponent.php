<?php

namespace App\Http\Livewire\Bounties;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Platform\Bounties\Bounty;

class AllComponent extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.bounties.all-component', [
            'company_name' => auth()->user()->company()->name,
            'bounties' => Bounty::where('company', auth()->user()->company()->id)->latest()->paginate(10)
        ])->extends('layouts.app')->slot('content');
    }
}
