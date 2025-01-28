@extends('users.layouts.app')

@section('title', 'Register')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Register</h4>
                </div>
                <div class="card-body">
                    <form class="registration-form" method="post" action="{{ route('register') }}">
                        @csrf
                        <h5 class="text-center mb-4">User Registration</h5>
                        <div class="mb-3">
                            <label for="userType" class="form-label">User Type</label>
                            <select id="userType" name="userType" class="form-select form-control" onchange="toggleGstNumberField()"
                                required>
                                <option value="">Select an option</option>
                                <option value="business">Business</option>
                                <option value="private">Private User</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" name="userName" class="form-control"
                                placeholder="Enter your username" required>
                        </div>

                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" id="firstName" name="firstName" class="form-control"
                                placeholder="Enter your first name" required>
                        </div>

                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" id="lastName" name="lastName" class="form-control"
                                placeholder="Enter your last name" required>
                        </div>

                        <div class="mb-3">
                            <label for="fatherFullName" class="form-label">Father's Full Name</label>
                            <input type="text" id="fatherFullName" name="fatherFullName" class="form-control"
                                placeholder="Enter your father's full name" required>
                        </div>

                        <div class="mb-3">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" id="dob" name="dob" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="Enter your email" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Enter your password" required>
                        </div>

                        <div class="mb-3 hidden" id="gstNumberField">
                            <label for="gstNumber" class="form-label">GST Number</label>
                            <input type="text" id="gstNumber" name="gstNumber" class="form-control"
                                placeholder="Enter your GST Number">
                        </div>

                        <!-- <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select id="role" name="role" class="form-select" required>
                                <option value="user">User</option>
                                <option value="business">business</option>
                            </select>
                        </div> -->

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary w-100">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection