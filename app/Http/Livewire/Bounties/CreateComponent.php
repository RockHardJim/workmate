<?php

namespace App\Http\Livewire\Bounties;

use App\Models\Platform\Bounties\Bounty;
use Livewire\Component;

class CreateComponent extends Component
{
    /**
     * Bounty name
     *
     * @var string
     */
    public $name;

    /**
     * Create a new bounty.
     *
     * @return void
     */
    public function submit()
    {
        $this->validate(['name' => 'required|string|min:4|max:200',]);

        $bounty = Bounty::create([
            'company' => auth()->user()->company()->id,
            'name' => $this->name,
            'value' => 100,
        ]);

        $this->name = '';

        return redirect()->route('bounties.view', [
            'encryptedId' => encrypt($bounty->id)
        ]);
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        return view('livewire.bounties.create-component', [
            'company_name' => auth()->user()->company()->name
        ])->extends('layouts.app')->slot('content');
    }
}
