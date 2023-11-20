@extends('layouts.app')

@section('content')
<div class="container mt-5">
   
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="font-weight-bold">Login</h3>
            <p>Already have an account?</p>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif  
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="email" class="pb-2">Email</label>
                        <input type="email" class="form-control" placeholder="email@email.com" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password" class ="pb-2 mt-2">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="12345" name="password">
                    </div>
                </div>
                <div class="col-md-8">
                    <button type="submit" class="btn btn-block form-control mt-4" style="background-color:orange; color:#fff; border-radius:20px;">Login</button>
                </div>
            </form>
        
        </div>
       
        <div class="col-md-6">
            <h3 class="font-weight-bold">Create Account</h3>
            <p>Dont't have an account yet? Register here!</p>
            <form action="{{ route('register') }}" method="POST">
                @csrf
             
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="email" class="pb-2">Email</label>
                        <input type="email" class="form-control" placeholder="email@email.com" id="email" name="email">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class ="pb-2 mt-2">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="12345" name="password">
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class ="pb-2 mt-2">Confirm Password</label>
                        <input type="password_confirmation" class="form-control" id="password_confirmation" placeholder="12345" name="password_confirmation">
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
