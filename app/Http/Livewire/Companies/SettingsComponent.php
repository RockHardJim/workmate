<?php

namespace App\Http\Livewire\Companies;

use Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class SettingsComponent extends Component
{
    use WithFileUploads;

    /**
     * Input field.
     *
     * @var string
     */
    public $brand;

    /**
     * Logo url.
     *
     * @var string
     */
    public $brandImage;

    /**
     * Store brand logo
     *
     * @return void
     */
    public function submit()
    {
        $this->validate([
            'brand' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $image = $this->brand->storePubliclyAs('brands', Str::random(20) . ".{$this->brand->getClientOriginalExtension()}");

        auth()->user()->company()->brand()->update([
            'logo' => $image
        ]);
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        $this->brandImage = auth()->user()->company()->brand->logo_url;

        return view('livewire.companies.settings-component')->extends('layouts.app')->slot('content');
    }
}
