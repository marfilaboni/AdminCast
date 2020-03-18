@extends('layouts.app')
@section('content')
<div class="container container-signup animated fadeIn">
    <h3 class="text-center">Sign Up</h3>
    <div class="login-form">
      <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
        @csrf
        <div class="form-group form-floating-label">
          <input  id="name" name="name" type="text" class="form-control input-border-bottom {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" required>
          <label for="name" class="placeholder">Name</label>
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group form-floating-label">
          <input  id="email" name="email" type="email" class="form-control input-border-bottom {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required>
          <label for="email" class="placeholder">E-Mail Address</label>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group form-floating-label">
          <input  id="password" name="password" type="password" class="form-control input-border-bottom {{ $errors->has('password') ? ' is-invalid' : '' }}" required>
          <label for="password" class="placeholder">Password</label>
          <div class="show-password">
            <i class="flaticon-interface"></i>
          </div>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group form-floating-label">
          <input  id="password_confirmation" name="password_confirmation" type="password" class="form-control input-border-bottom" required>
          <label for="password_confirmation" class="placeholder">Confirm Password</label>
          <div class="show-password">
            <i class="flaticon-interface"></i>
          </div>
        </div>
        <div class="row form-sub m-0">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="agree" id="agree">
            <label class="custom-control-label" for="agree">I Agree the terms and conditions.</label>
          </div>
        </div>
        <div class="form-action">
          <a href="#" id="show-signin" class="btn btn-danger btn-rounded btn-login mr-3">Cancel</a>
          <button type="submit" class="btn btn-primary btn-rounded btn-login">Sign Up</a>
        </div>
    </form>
    </div>
  </div>
@endsection
