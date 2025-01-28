@extends('users.layouts.app')
@section('title', 'Login')
@section('content')
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<!-- <form class="login-form" action="{{ route('login.post') }}" method="POST"> -->
    <h2>Login</h2>
    @csrf
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter your username" value="{{ old('username') }}" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
    </div>
    <div class="form-group">
        <button type="submit">Login</button>
    </div>
<!-- </form> -->
@endsection
