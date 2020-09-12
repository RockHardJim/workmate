@extends('layouts.auth')

@section('content')
<div class="all-wrapper menu-side with-pattern">
  <div class="auth-box-w wider">
    <div class="logo-w">
      <a href="/"><img alt="" src="/img/login.svg" style="width: 165px;"></a>
    </div>
    <h4 class="auth-header">
      Create new account
    </h4>
    <form method="POST" action="{{ route('register') }}">
      @csrf

      <div class="form-group">
        <label for=""> Email address</label>
        <input class="form-control @error('name') is-invalid @enderror" name="email" placeholder="Enter email" type="email">

        @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
        <div class="pre-icon os-icon os-icon-email-2-at2"></div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for=""> Password</label>
            <input class="form-control @error('name') is-invalid @enderror" name="password" placeholder="Password" type="password">

            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror

            <div class="pre-icon os-icon os-icon-fingerprint"></div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Confirm Password</label>
            <input class="form-control @error('name') is-invalid @enderror" name="password_confirmation" placeholder="Password" type="password">

            @error('password_confirmation')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror

          </div>
        </div>
      </div>
      <div class="buttons-w">
        <button class="btn btn-primary" type="submit">Register Now</button>
      </div>
    </form>
  </div>
</div>
@endsection
