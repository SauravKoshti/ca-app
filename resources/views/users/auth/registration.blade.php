@extends('users.layouts.app')

@section('title', 'Register')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header text-white text-center">
                    <h4>Register</h4>
                </div>
                <div class="card-body">
                    <form class="registration-form" method="post" action="{{ route('register') }}">
                        @csrf
                        <!-- <h5 class="text-center mb-4">User Registration</h5> -->

                        <!-- Grid Layout -->
                        <div class="grid-container mb-3">
                            <div class="grid-item">
                                <label for="userType" class="form-label">User Type</label>
                                <select id="userType" name="userType" class="form-select form-control"
                                    onchange="toggleGstNumberField()" >
                                    <option value="">Select an option</option>
                                    <option value="business">Business</option>
                                    <option value="private">Private User</option>
                                </select>
                            </div>

                            <div class="grid-item">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" id="username" name="username" class="form-control"
                                    placeholder="Enter your username" >
                            </div>

                            <div class="grid-item">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" id="firstName" name="firstName" class="form-control"
                                    placeholder="Enter your first name" >
                            </div>

                            <div class="grid-item">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" id="lastName" name="lastName" class="form-control"
                                    placeholder="Enter your last name" >
                            </div>

                            <div class="grid-item">
                                <label for="fatherFullName" class="form-label">Father's Full Name</label>
                                <input type="text" id="fatherFullName" name="fatherFullName" class="form-control"
                                    placeholder="Enter your father's full name" >
                            </div>

                            <div class="grid-item">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" id="dob" name="dob" class="form-control" >
                            </div>

                            <div class="grid-item">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    placeholder="Enter your email" >
                            </div>

                            <div class="grid-item">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Enter your password" >
                            </div>
                        </div>

                        <!-- GST Number Field -->
                        <div class="mb-3 hidden" id="gstNumberField">
                            <label for="gstNumber" class="form-label">GST Number</label>
                            <input type="text" id="gstNumber" name="gstNumber" class="form-control"
                                placeholder="Enter your GST Number">
                        </div>

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