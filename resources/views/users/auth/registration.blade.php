@extends('users.layouts.app')

@section('title', 'Register')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header text-white text-center">
                    <h4>Register</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="grid-container mb-3">
                            
                            <!-- User Type -->
                            <div class="grid-item">
                                <label for="userType" class="form-label">User Type</label>
                                <select id="userType" name="user_type" class="form-control" onchange="toggleGstNumberField()" required>
                                    <option value="private">Private User</option>
                                    <option value="business">Business</option>
                                </select>
                                @error('user_type') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Username -->
                            <div class="grid-item">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" id="username" name="username" class="form-control" required>
                                @error('username') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- First Name -->
                            <div class="grid-item">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" id="firstName" name="first_name" class="form-control" required>
                                @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Last Name -->
                            <div class="grid-item">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" id="lastName" name="last_name" class="form-control" required>
                                @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Father's Full Name -->
                            <div class="grid-item">
                                <label for="fatherFullName" class="form-label">Father's Full Name</label>
                                <input type="text" id="fatherFullName" name="father_full_name" class="form-control" required>
                                @error('father_full_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Date of Birth -->
                            <div class="grid-item">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" id="dob" name="dob" class="form-control" required>
                                @error('dob') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Email -->
                            <div class="grid-item">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Mobile -->
                            <div class="grid-item">
                                <label for="mobile" class="form-label">Mobile</label>
                                <input type="text" id="mobile" name="mobile" class="form-control" required>
                                @error('mobile') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Aadhar Card -->
                            <div class="grid-item">
                                <label for="aadharCard" class="form-label">Aadhar Card</label>
                                <input type="text" id="aadharCard" name="aadhar_card" class="form-control" required>
                                @error('aadhar_card') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- PAN Card -->
                            <div class="grid-item">
                                <label for="panCard" class="form-label">PAN Card</label>
                                <input type="text" id="panCard" name="pan_card" class="form-control" required>
                                @error('pan_card') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- GST Number (Only for Business) -->
                            <div class="grid-item" id="gstNumberField" style="display: none;">
                                <label for="gstNumber" class="form-label">GST Number</label>
                                <input type="text" id="gstNumber" name="gst_number" class="form-control">
                                @error('gst_number') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Address -->
                            <div class="grid-item">
                                <label for="address" class="form-label">Address</label>
                                <textarea id="address" name="address" class="form-control" required></textarea>
                                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- City -->
                            <div class="grid-item">
                                <label for="city" class="form-label">City</label>
                                <input type="text" id="city" name="city" class="form-control" required>
                                @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Pincode -->
                            <div class="grid-item">
                                <label for="pincode" class="form-label">Pincode</label>
                                <input type="text" id="pincode" name="pincode" class="form-control" required>
                                @error('pincode') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Anniversary Date -->
                            <div class="grid-item">
                                <label for="anniversaryDate" class="form-label">Anniversary Date</label>
                                <input type="date" id="anniversaryDate" name="anniversary_date" class="form-control">
                                @error('anniversary_date') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Gender -->
                            <div class="grid-item">
                                <label for="gender" class="form-label">Gender</label>
                                <select id="gender" name="gender" class="form-control">
                                    <option value="1">Male</option>
                                    <option value="0">Female</option>
                                </select>
                                @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Password -->
                            <div class="grid-item">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
