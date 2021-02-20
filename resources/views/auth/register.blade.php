@extends('layouts.admin')
@push('style')
    <link rel="stylesheet" href="{{asset('New/assets/css/login.css')}}">
@endpush

@section('content')
<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="new/assets/img/avatars/avatar1.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="new/assets/img/logo.svg" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Make your account</p>
              <form  method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                      <label for="email" class="sr-only">Nama</label>
                      
                      <!-- <input type="name" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Name"> -->
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  required autocomplete="name" autofocus placeholder="Name">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="email" class="sr-only">Email</label>
                      <!-- <input type="email" name="email" id="email" class="form-control form-control @error('email') is-invalid @enderror" placeholder="Email address"> -->
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email address" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group mb-4">
                      <label for="password" class="sr-only">Password</label>
                      <!-- <input type="password" name="password" id="password" class="form-control" placeholder="Password"> -->
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group mb-4">
                      <!-- <label for="password" class="sr-only">Password</label>
                      <input type="password" name="password" id="password" class="form-control" placeholder="Re-type Password"> -->
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Re-type Password" required autocomplete="new-password">
                    </div>
                    <!-- <input name="register" id="register" class="btn btn-block login-btn mb-4" type="button" value="Register"> -->
                    <!-- <div class="form-group row mb-0"> -->
                            <!-- <div class="col-md-6 offset-md-4"> -->
                                <button type="submit" class="btn btn-block login-btn mb-4">
                                    {{ __('Register') }}
                                </button>
                            <!-- </div> -->
                        <!-- </div> -->
              </form>
              <p class="login-card-footer-text">You have an account? <a href="login" class="text-reset">Login here</a></p>
              <nav class="login-card-footer-nav">
                <a href="#!">Terms of use.</a>
                <a href="#!">Privacy policy</a>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

@endsection
@push('scripts')
@include('layouts.partial.script')
@endpush