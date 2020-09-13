@extends('layouts.auth')

@section('content')
<div class="all-wrapper menu-side with-pattern">
  <div class="auth-box-w">
    <div class="logo-w">
      <a href="#"><img alt="" src="/img/undraw_Scrum_board_re_wk7v.svg" style="width: 165px;"></a>
    </div>
    <h4 class="auth-header">
      Company Onboarding
    </h4>
    <form method="POST" action="{{ route('company.create') }}">
      @csrf

      <div class="form-group">
        <label for="">Company Name</label>
        <input name="company_name" value="{{ old('company_name') }}" class="form-control @error('company_name') is-invalid @enderror" placeholder="Enter your company name" type="text">

        @error('company_name')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror

        <div style="top: 26px;" class="pre-icon os-icon os-icon-briefcase"></div>
      </div>
      <div class="form-group">
        <label for="">Company Size</label>
        <select name="company_size" class="form-control @error('company_size') is-invalid @enderror">
          @foreach(config('sizes') as $size)
            <option value="{{ $size }}" {{ old('company_size') == $size ? 'selected' : '' }}>{{ $size }}</option>
          @endforeach
        </select>

        @error('company_size')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
        <div style="top: 26px;" class="pre-icon os-icon os-icon-users"></div>
      </div>

      <div class="form-group">
        <label for="">Industry</label>
        <select name="industry" class="form-control @error('industry') is-invalid @enderror">
          @foreach(config('industries') as $industry)
            <option value="{{ $industry }}" {{ old('industry') == $industry ? 'selected' : '' }}>{{ $industry }}</option>
          @endforeach
        </select>

        @error('industry')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
        <div style="top: 26px;" class="pre-icon os-icon os-icon-anchor"></div>
      </div>

      <div class="form-group">
        <label for="">Description</label>
        <textarea name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter company description">{{ old('description') }}</textarea>

        @error('description')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
        <div class="pre-icon os-icon os-icon-book-open" style="top: 24px;"></div>
      </div>

      <div class="buttons-w">
        <button class="btn btn-primary">Create</button>
      </div>
    </form>
  </div>
</div>
@endsection
