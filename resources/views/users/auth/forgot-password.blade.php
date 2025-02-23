@extends('users.layouts.app')

@section('title', 'Reset Password')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="shadow p-4 bg-white rounded">
        <h2 class="text-center mb-4">Reset Password</h2>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('forgot.password.send') }}" id="resetPasswordForm">
            @csrf
            <div class="form-group mb-3">
                <label for="email">Enter your registered email</label>
                <input type="email" id="email" name="email" class="form-control">
                @error('email') <p style="color: red;">{{ $message }}</p> @enderror
            </div>

            <div class="form-group mb-3">
                <label for="password">New Password</label>
                <input type="password" id="password" name="password" class="form-control">
                @error('password') <p style="color: red;">{{ $message }}</p> @enderror
            </div>

            <div class="form-group mb-3">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-control">
                <small id="passwordError" class="text-danger" style="display: none;">Passwords do not match.</small>
            </div>

            <div class="form-group text-center mt-3">
                <button type="submit" class="btn btn-primary w-100">Reset Password</button>
            </div>
        </form>
    </div>
</div>

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $("#resetPasswordForm").on("submit", function(event) {
        let password = $("#password").val();
        let confirmPassword = $("#confirm_password").val();

        if (password !== confirmPassword) {
            $("#passwordError").show();
            event.preventDefault(); // Prevent form submission
        } else {
            $("#passwordError").hide();
        }
    });

    $("#confirm_password").on("keyup", function() {
        let password = $("#password").val();
        let confirmPassword = $(this).val();

        if (password === confirmPassword) {
            $("#passwordError").hide();
        } else {
            $("#passwordError").show();
        }
    });
});
</script>
@endsection