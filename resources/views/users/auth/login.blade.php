@extends('users.layouts.app')

@section('title', 'Login')

@section('content')
<div class="container row d-flex justify-content-center align-items-center min-vh-100">
    <div class="login-box shadow p-4 bg-white rounded">
        <h2 class="text-center mb-4">Login</h2>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group mb-3">
                <label for="username"><i class="fa fa-user"></i> Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Enter Username" required>
                @error('username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div>
                    <a href="{{ route('forgot.username') }}" class="text-primary">Forgot Username?</a>
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="password"><i class="fa fa-lock"></i> Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" required>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                
                <div>
                    <a href="{{ route('forgot.password') }}" class="text-primary">Forgot Password?</a>
                </div>
            </div>

            <div class="form-group text-center mt-4">
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </div>

            <div class="text-center mt-3">
                <p>Don't have an account? <a href="{{ route('register') }}" class="text-primary">Register here</a></p>
            </div>
        </form>
    </div>
</div>

<style>
    .login-box {
        margin:10px;
        width: 400px;
        padding: 30px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .form-control {
        border-radius: 5px;
        padding: 10px;
    }
    .btn-primary {
        background-color: #007bff;
        border: none;
        padding: 10px;
        border-radius: 5px;
        font-size: 16px;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>
@endsection
