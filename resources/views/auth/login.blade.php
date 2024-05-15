@extends('layouts.guest')

@section('title')
    Login
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="account-content">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7 col-lg-6 login-left">
                    <img src="assets/client/img/login-banner.png" class="img-fluid" alt="Lovemed">
                </div>
                <div class="col-md-12 col-lg-6 login-right">
                    <div class="login-header">
                        <h3>Login</h3>
                    </div>
                    <form method="POST" action="{{ route('login') }}" autocomplete="off">
                        @csrf

                        <div class="mb-3 form-focus">
                            <input type="email" name="email" class="form-control floating" required
                                   placeholder="Enter your email" autocomplete="off"
                                   class="@error('email') is-invalid @enderror">
 
                                   @error('email')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                                                               
                                   <label class="focus-label">Email</label>
                        </div>
                        <div class="mb-3 form-focus">
                            <input type="password" name="password" class="form-control floating" required
                                   minlength="6" placeholder="Enter your password" autocomplete="off"
                                   class="@error('password') is-invalid @enderror">
 
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            
                            <label class="focus-label">Password</label>
                        </div>
                        <div class="text-end">
                            <a class="forgot-link" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <button class="btn btn-primary w-100 btn-lg login-btn"
                            type="submit">Login</button>
                        <div class="login-or">
                            <span class="or-line"></span>
                            <span class="span-or">or</span>
                        </div>

                        <div class="text-center dont-have">Don’t have an account? 
                            <a href="{{ route('register') }}">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
