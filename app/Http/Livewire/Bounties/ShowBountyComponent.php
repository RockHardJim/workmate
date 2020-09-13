<?php

namespace App\Http\Livewire\Bounties;

use App\Models\Platform\Bounties\Bounty;
use Livewire\Component;

class ShowBountyComponent extends Component
{
    /**
     * Bounty name.
     *
     * @var string
     */
    public $name;

    /**
     * @inheritDoc
     */
    public function mount(string $encryptedId)
    {
        $this->name = Bounty::findOrFail(decrypt($encryptedId))->name;
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        return view('livewire.bounties.show-bounty-component', [
            'company_name' => auth()->user()->company()->name
        ])->extends('layouts.app')->slot('content');
    }
}
