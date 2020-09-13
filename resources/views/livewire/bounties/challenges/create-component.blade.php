<div>
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/">{{ $company_name }}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="/bounties">All Bounties</a>
        </li>
        <li class="breadcrumb-item">
            <a href="/bounties/show/{{ $encryptedId }}">All Challenges</a>
        </li>
        <li class="breadcrumb-item">
            <span>Create Challenge</span>
        </li>
    </ul>

    <div class="content-i">
        <div class="content-box">
            <div class="col-md-6" style="margin: auto">
                <div class="element-wrapper" style="margin-bottom: 100px;">
                    <h6 class="element-header">
                        Create Challenge
                    </h6>

                    <div class="element-box">
                        <h5 class="form-header">
                            Add a new Bounty Challenge
                        </h5>
                        <div class="form-desc">
                            Create a new Bounty Challenge.
                        </div>

                        {{-- form --}}

                        <form wire:submit.prevent="submit">

                            <div class="form-group">
                                <label for="">Challenge</label>
                                <input wire:model="challenge" class="form-control @error('challenge') is-invalid @enderror" name="challenge" placeholder="Enter challenge" type="text">

                                @error('challenge')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Path</label>

                                <select wire:model="path" name="path" class="form-control @error('path') is-invalid @enderror">
                                    <option>Select Path</option>
                                    @foreach(config('paths') as $path)
                                        <option value="{{ $path }}" {{ old('path') == $path ? 'selected' : '' }} style="text-transform: capitalize;">{{ $path }}</option>
                                    @endforeach
                                </select>

                                @error('path')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for>Address</label>
                                <input wire:model="address" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Enter address" type="text" >

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea wire:model="description" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Enter description">{{ old('description') }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="modal-footer">
                                <button
                                    class="btn btn-secondary"
                                    data-dismiss="modal"
                                >
                                    Close
                                </button>
                                <button
                                    class="btn btn-primary"
                                    type="submit"
                                >
                                    Add
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
