@extends('users.layouts.app')
@section('title', 'Login')
@section('content')
<div class="login-container">
    <div class="login-box">
        <h2 class="text-center">Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="username"><i class="fa fa-user"></i> Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label for="password"><i class="fa fa-lock"></i> Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group text-center">
                <button type="submit" class="button btn-primary">Login</button>
            </div>
            
        </form>
    </div>
</div>
@endsection
