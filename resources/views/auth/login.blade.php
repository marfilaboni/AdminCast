@extends('layouts.app')
@section('content')
<div class="container container-login animated fadeIn">
  <h3 class="text-center">Login</h3>
  <form method="POST" action="{{ route('login') }}">
    @csrf
      <div class="login-form">
        <div class="form-group form-floating-label">
          <input id="email" name="email" type="text" class="form-control input-border-bottom {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required>
          <label for="email" class="placeholder">E-Mail Address</label>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group form-floating-label">
          <input id="password" name="password" type="password" class="form-control input-border-bottom {{ $errors->has('password') ? ' is-invalid' : '' }}" required>
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
        <div class="row form-sub m-0">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="rememberme">
            <label class="custom-control-label" for="rememberme">Remember Me</label>
          </div>

          <a href="#" class="link float-right">Forget Password ?</a>
        </div>
        <div class="form-action mb-3">
          <button type="submit" class="btn btn-primary btn-rounded btn-login">Sign In</button>
        </div>
        <div class="login-account">
          <span class="msg">Don't have an account yet ?</span>
          <a href="#" id="show-signup" class="link">Sign Up</a>
        </div>
      </div>
   </form>
</div>
@endsection
