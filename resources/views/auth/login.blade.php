@extends('layouts.auth-master')
@section('content')
 <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            {{-- {{print_r($errors->all())}} --}}
            <h4 class="text-dark font-weight-normal">Welcome to <br><span class="font-weight-bold">{{ env('APP_NAME') }}</span></h4>
            <p class="text-muted">Before you get started, you must login or register if you don't already have an account.</p>
            <form method="POST" action="{{ route('login') }}" >
             @csrf
              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" tabindex="1"  autofocus placeholder="Registered Email" value="{{ old('email') }}">
                @error('email')
                    {{-- <div class="invalid-feedback"> --}}
                      <div style="color:red">{{ $message }}</div>
                    {{-- </div> --}}
                @enderror

              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <input id="password" type="password" class="form-control" name="password" tabindex="2" >
                @error('password')
                    {{-- <div class="invalid-feedback"> --}}
                      <div style="color:red">{{ $message }}</div>
                    {{-- </div> --}}
                @enderror
              </div>

              <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                  <label class="custom-control-label" for="remember-me">Remember Me</label>
                </div>
              </div>

              <div class="form-group text-right">
                <a href="{{ route('password.request') }}" class="float-left mt-3">
                  Forgot Password?
                </a>
                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  Login
                </button>
              </div>

              <div class="mt-5 text-center">
                Don't have an account? <a href="{{ route('register') }}">Create new one</a>
              </div>
            </form>

            <div class="text-center mt-5 text-small">
              Copyright &copy; {{ env('APP_NAME') }} {{ date('Y') }}. Made with 💙 in Everywhere

            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 position-relative overlay-gradient-bottom" data-background="../assets/img/unsplash/login-bg.jpg">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 id="time" class="mb-2 display-4 font-weight-bold">Good Morning</h1>
                <h5 class="font-weight-normal text-muted-transparent">Surabaya, Indonesia</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
 @endsection
