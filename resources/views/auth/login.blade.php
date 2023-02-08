@extends('layouts.auth.app')

@section('content')
<div class="register-box">
  <div class="register-logo">
    <b>{{ config('app.name', 'Laravel') }}</b>
    {{-- <a href="{{url('/')}}">
    </a> --}}
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Login Admin</p>

      <form action="{{ route('login') }}" method="post">
        @csrf

        <div class="input-group mb-3">
          <input id = "email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="{{ __('Email Address') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="{{ __('Password') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">

          <!-- /.col -->
          <div class="col-4 mb-2">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="{{url('register')}}" class="text-center">Register a new account</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
@endsection
