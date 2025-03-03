@extends('users.layouts.app')

@section('title', 'Forgot Username')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="shadow p-4 bg-white rounded">
        <h2 class="text-center mb-4">Forgot Username</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('forgot.username') }}">
            @csrf
            <div class="form-group mb-3">
                <label for="email">Enter your registered email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="form-group text-center mt-3">
                <button type="submit" class="btn btn-primary w-100">Retrieve Username</button>
            </div>
        </form>
    </div>
</div>
@endsection
