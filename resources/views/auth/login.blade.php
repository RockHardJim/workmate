@extends('layouts.auth')

@section('content')
<div class="all-wrapper menu-side with-pattern">
  <div class="auth-box-w">
    <div class="logo-w">
      <a href="index.html"><img alt="" src="img/signup.svg" style="width: 165px;"></a>
    </div>
    <h4 class="auth-header">
      Login Form
    </h4>
    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="form-group">
        <label for="">Email Address</label>
        <input name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email address" type="text">

        @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror

        <div class="pre-icon os-icon os-icon-user-male-circle"></div>
      </div>
      <div class="form-group">
        <label for="">Password</label>
        <input name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" type="password">

        @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
        <div class="pre-icon os-icon os-icon-fingerprint"></div>
      </div>
      <div class="buttons-w">
        <button class="btn btn-primary">Log me in</button>
        <div class="form-check-inline">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
          </label>
        </div>
      </div>

      @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
          {{ __('Forgot Your Password?') }}
        </a>
      @endif
    </form>
  </div>
</div>
@endsection
