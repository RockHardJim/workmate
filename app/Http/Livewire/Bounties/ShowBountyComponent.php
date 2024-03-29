<?php

namespace App\Http\Livewire\Bounties;

use App\Models\Platform\Bounties\Bounty;
use App\Models\Platform\Bounties\BountyChallenge;
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

    /**
     * Bounty id.
     *
     * @var string
     */
    public $bountyId;

    /**
     * @inheritDoc
     */
    public function mount(string $encryptedId)
    {
        $bounty = Bounty::findOrFail(decrypt($encryptedId));

        $this->name     = $bounty->name;
        $this->bountyId = $bounty->id;
    }

    /**
     * Create a new challenge.
     *
     * @return void
     */
    public function submit()
    {
        info('', [
            $this->challenge,
            $this->path,
            $this->address,
            $this->description,
        ]);

        $this->validate([
            'challenge' => 'required|string',
            'description' => 'required|string',
            // 'path' => 'required|string|in_array:' . implode(',', config('paths', [])),
            'address' => 'required|string',
        ]);

        
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        return view('livewire.bounties.show-bounty-component', [
            'company_name' => auth()->user()->company()->name,
            'challenges' => BountyChallenge::where('bounty', $this->bountyId)->latest()->paginate(10),
        ])->extends('layouts.app')->slot('content');
    }
}
