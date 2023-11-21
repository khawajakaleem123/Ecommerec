@extends('layouts.app')

@section('content')

<div class="container mt-5">
   
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="login-register">Login</h3>
            <p>Already have an account?</p>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif  
                <div class="col-md-8">
                    <label for="email" class="pb-2">Email</label>
                    <div class="form-group mb-3 position-relative">
                        <i class="fa fa-user-circle-o email"></i>
                        <input type="email" class="form-control ps-4" placeholder="email@email.com" id="email" name="email">
                    </div>
        
                    <label for="password" class ="pb-2 mt-2">Password</label>
                    <div class="form-group position-relative">
                        <i class="fa fa-lock login_lock"></i>
                        <input type="password" class="form-control ps-4" id="password" placeholder="12345" name="password">
                        <i class="fa fa-eye-slash" id="toggleLoginPassword"></i>

                    </div>
                    <div class="form-check mt-2">
                        <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                        <label class="form-check-label" for="rememberMe">Remember Me</label>
                    </div>

                </div>
                <div class="col-md-8">
                    <button type="submit" class="btn btn-block form-control mt-4 log-btn">Login</button>
                </div>
            </form>
        
        </div>
       
        <div class="col-md-6">
            <h3 class="login-register">Create Account</h3>
            <p>Dont't have an account yet? Register here!</p>
            <form action="{{ route('register') }}" method="POST">
                @csrf
             
                <div class="col-md-8">
                    <label for="email" class="pb-2">Email</label>
                    <div class="form-group position-relative">
                        <i class="fa fa-user-circle-o email"></i>
                        <input type="email" class="form-control ps-4" placeholder="email@email.com" id="email" name="email">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <label for="password" class ="pb-2 mt-2">Password</label>
                    <div class="form-group position-relative">
                        <i class="fa fa-lock login_lock"></i>
                        <input type="password" class="form-control ps-4" id="reg_password" placeholder="12345" name="password">
                        <i class="fa fa-eye-slash" id="toggleRegisterPassword"></i>

                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="password_confirmation" class ="pb-2 mt-2">Confirm Password</label>
                    <div class="form-group position-relative">
                        <i class="fa fa-lock login_lock"></i>
                        <input type="password" class="form-control ps-4" id="password_confirmation" placeholder="12345" name="password_confirmation">
                        <i class="fa fa-eye-slash" id="toggleConfirmPassword"></i>

                    </div>
                </div>
                <div class="col-md-8">
                    <button type="submit" class="btn btn-block form-control mt-4" style="background-color:orange; color:#fff; border-radius:20px;">Register</button>
                </div>
            </form>
        
        </div>
    </div>
</div>


@endsection
