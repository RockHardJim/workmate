@extends('layouts.auth')

@section('content')
<div class="all-wrapper menu-side with-pattern">
  <div class="auth-box-w">
    <div class="logo-w">
      <a href="#"><img alt="" src="/img/undraw_duplicate_xac4.svg" style="width: 165px;"></a>
    </div>
    <h4 class="auth-header">
      Welcome to Work Mate.
    </h4>

    <div class="card" style="padding: 30px">

      <p>What would you like to do?</p>

      <div class="btn" style="padding: 0;">
        <a href="{{ route('company.onboard') }}" class="btn btn-secondary">Create Company</a>
        <a href="{{ route('company.join') }}" class="btn btn-secondary">Join Company</a>
      </div>
    </div>
  </div>
</div>
@endsection
