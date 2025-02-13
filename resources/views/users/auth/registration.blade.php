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
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="grid-container mb-3">
                                <div class="grid-item">
                                    <label for="userType" class="form-label">User Type</label>
                                    <select id="userType" name="user_type" class="form-select form-control" onchange="toggleGstNumberField()">
                                        <option value="private">Private User</option>
                                        <option value="business">Business</option>
                                    </select>
                                </div>

                                <div class="grid-item">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" id="username" name="username" class="form-control" required>
                                </div>

                                <div class="grid-item">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" id="firstName" name="first_name" class="form-control" required>
                                </div>

                                <div class="grid-item">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" id="lastName" name="last_name" class="form-control" required>
                                </div>

                                <div class="grid-item">
                                    <label for="fatherFullName" class="form-label">Father's Full Name</label>
                                    <input type="text" id="fatherFullName" name="father_full_name" class="form-control" required>
                                </div>

                                <div class="grid-item">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" id="dob" name="dob" class="form-control" required>
                                </div>

                                <div class="grid-item">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>

                                <div class="grid-item">
                                    <label for="mobile" class="form-label">Mobile</label>
                                    <input type="text" id="mobile" name="mobile" class="form-control" required>
                                </div>

                                <div class="grid-item">
                                    <label for="aadharCard" class="form-label">Aadhar Card</label>
                                    <input type="text" id="aadharCard" name="aadhar_card" class="form-control" required>
                                </div>

                                <div class="grid-item">
                                    <label for="panCard" class="form-label">PAN Card</label>
                                    <input type="text" id="panCard" name="pan_card" class="form-control" required>
                                </div>

                                <div class="grid-item" id="gstNumberField" style="display: none;">
                                    <label for="gstNumber" class="form-label">GST Number</label>
                                    <input type="text" id="gstNumber" name="gst_number" class="form-control">
                                </div>

                                <div class="grid-item">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea id="address" name="address" class="form-control" required></textarea>
                                </div>

                                <div class="grid-item">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" id="city" name="city" class="form-control" required>
                                </div>

                                <div class="grid-item">
                                    <label for="pincode" class="form-label">Pincode</label>
                                    <input type="text" id="pincode" name="pincode" class="form-control" required>
                                </div>

                                <div class="grid-item">
                                    <label for="anniversaryDate" class="form-label">Anniversary Date</label>
                                    <input type="date" id="anniversaryDate" name="anniversary_date" class="form-control">
                                </div>

                                <div class="grid-item">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select id="gender" name="gender" class="form-select form-control">
                                        <option value="1">Male</option>
                                        <option value="0">Female</option>
                                    </select>
                                </div>

                                <div class="grid-item">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" id="password" name="password" class="form-control" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection