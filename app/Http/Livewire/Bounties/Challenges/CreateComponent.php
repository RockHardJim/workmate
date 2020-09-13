<?php

namespace App\Http\Livewire\Bounties\Challenges;

use App\Models\Platform\Bounties\Bounty;
use Livewire\Component;

class CreateComponent extends Component
{
     /**
     * Challenge.
     *
     * @var string
     */
    public $challenge;

    /**
     * Challenge description.
     *
     * @var string
     */
    public $description;

    /**
     * Challenge path.
     *
     * @var string
     */
    public $path;

    /**
     * Challenge address.
     *
     * @var string
     */
    public $address;

    public $name;

    /**
     * Bounty id.
     *
     * @var string
     */
    public $bountyId;

    public $encryptedId;

    /**
     * @inheritDoc
     */
    public function mount($encryptedId)
    {
        $this->bountyId = decrypt($encryptedId);
        $this->encryptedId = $encryptedId;
        $this->name = Bounty::find($this->bountyId)->name;
    }

    /**
     * Create challenge.
     *
     * @return void
     */
    public function submit()
    {
        $this->validate([
            'challenge' => 'required|string',
            'description' => 'required|string',
            'path' => 'required|string|in:' . implode(',', config('paths', [])),
            'address' => 'required|string',
        ]);

        $bountyChallenge = BountyChallenge::create([
            'bounty' => $this->bountyId,
            'challenge' => $this->challenge,
            'description' => $this->description,
            'path' => $this->path,
            'address' => $this->address,
        ]);

        return redirect()->route('bounties.view', [
            'encryptedId' => encrypt($this->bountyId)
        ]);
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        return view('livewire.bounties.challenges.create-component', [
            'company_name' => auth()->user()->company()->name,
            'encryptedId' => encrypt($this->bountyId),
        ])->extends('layouts.app')->slot('content');
    }
}
