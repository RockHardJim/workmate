<div wire:ignore>
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/">{{ $company_name }}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="/bounties">All Bounties</a>
        </li>
        <li class="breadcrumb-item">
            <span>Create Bounty</span>
        </li>
    </ul>
    
    <div class="content-i">
        <div class="content-box" data-turbolinks="false">
            <div class="col-md-6" style="margin: auto">
                <div class="element-wrapper" style="margin-bottom: 100px;">
                    <h6 class="element-header">
                        Create a new Bounty
                    </h6>
                    <div class="element-box">
                        <form wire:submit.prevent="submit">
                            <h5 class="form-header">
                                Bounty Information
                            </h5>
    
                            <div class="form-desc">
                                Discharge best employed your phase each the of shine. Be met even reason consider logbook redesigns. Never a turned interfaces among asking
                            </div>
    
                            <div class="form-group">
                                <label>Name</label>
                                <input name="name" wire:model="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter bounty name" type="text">
    
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
    
                            <div class="buttons-w">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
