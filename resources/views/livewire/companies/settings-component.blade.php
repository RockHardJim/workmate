<div>
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Company</a>
        </li>
        <li class="breadcrumb-item">
            <a href="/company/settings">Settings</a>
        </li>
        <li class="breadcrumb-item">
            <span>Update Company Details</span>
        </li>
    </ul>
    
    <div class="content-i">
        <div class="content-box">
            <div class="col-md-6" style="margin: auto">
                <div class="element-wrapper" style="margin-bottom: 100px;">
                    <h6 class="element-header">
                        Update information
                    </h6>
                    <div class="element-box">
                        <form wire:submit.prevent="submit">
                            <h5 class="form-header">
                                Company Information
                            </h5>
    
                            <div class="form-desc">
                                Discharge best employed your phase each the of shine. Be met even reason consider logbook redesigns. Never a turned interfaces among asking
                            </div>
    
                            <div class="row" style="margin-bottom: 10px;">
                                <div class="col-md-4">
                                    <div style="border: 1px dotted #ccc; height: 82px;cursor:pointer" onclick="$('#brand').click()">
                                        <div style="border: unset; text-align: center; bottom: -8px; position: relative;">
                                            <img wire:ignore alt="" src="{{ ($brandImage) }}" id="company_brand" style="width: 65px;border-radius: 50%;">
                                        </div>
                                    </div>
                                    <input wire:model="brand" style="height:0;width: 0;position:relative;" type="file" id="brand" onchange="readURL(this);" name="brand" />
                                </div>
    
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Company Name</label>
                                        <input name="name" value="{{ auth()->user()->company()->name }}" class="form-control" placeholder="Enter bounty name" type="text" disabled>
                                    </div>
                                </div>
                            </div>
    
                            @error('brand')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
    
                            <div class="buttons-w">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>      
                        </form>
                    </div>
                </div>
            </div>
    
            <script>
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
    
                        reader.onload = function (e) {
                            $('#company_brand').attr('src', e.target.result);
                        };
    
                        reader.readAsDataURL(input.files[0]);
                    }
                }
    
                document.onreadystatechange = () => {
                    if (document.readyState === 'complete') {
                        window.livewire.on('fileChoosen', () => {
                            let inputField = document.getElementById('logo')
                            let file = inputField.files[0]
                            let reader = new FileReader();
                            reader.onloadend = () => {
                                window.livewire.emit('fileUpload', reader.result)
                            }
                            reader.readAsDataURL(file);
                        })
                    }
                };
            </script>
        </div>
    </div>
</div>
