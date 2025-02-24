@extends('users.layouts.app')

@section('title', 'Register')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="panel panel-default mt-5">
                    <div class="panel-heading text-center">
                        <h3>Register</h3>
                    </div>
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif
                    <div class="panel-body">
                        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="userType">User Type</label>
                                        <select id="userType" name="user_type" class="form-control" required
                                            onchange="toggleGstNumberField()">
                                            <option value="private" {{ old('user_type') == 'private' ? 'selected' : '' }}>
                                                Private User</option>
                                            <option value="business" {{ old('user_type') == 'business' ? 'selected' : '' }}>
                                                Business</option>
                                        </select>
                                        @error('user_type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" id="username" name="username" class="form-control"
                                            value="{{ old('username') }}" required>
                                        @error('username')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName">First Name</label>
                                        <input type="text" id="firstName" name="first_name" class="form-control"
                                            value="{{ old('first_name') }}" required>
                                        @error('first_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lastName">Last Name</label>
                                        <input type="text" id="lastName" name="last_name" class="form-control"
                                            value="{{ old('last_name') }}" required>
                                        @error('last_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="full_name">Full name <small>(as per pancard)</small></label>
                                        <input type="text" id="full_name" name="full_name" class="form-control"
                                            value="{{ old('full_name') }}" required>
                                        @error('full_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" id="address" name="address" class="form-control"
                                            value="{{ old('address') }}" required>
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" id="city" name="city" class="form-control"
                                            value="{{ old('city') }}" required>
                                        @error('city')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pincode">Pincode</label>
                                        <input type="text" id="pincode" name="pincode" class="form-control"
                                            value="{{ old('pincode') }}" required>
                                        @error('pincode')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="aadharCard">Aadhar Card</label>
                                        <input type="text" id="aadharCard" name="aadhar_card" class="form-control"
                                            value="{{ old('aadhar_card') }}" required>
                                        @error('aadhar_card')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="panCard">PAN Card</label>
                                        <input type="text" id="panCard" name="pan_card" class="form-control"
                                            value="{{ old('pan_card') }}" required>
                                        @error('pan_card')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dob">Date of Birth</label>
                                        <input type="date" id="dob" name="dob" class="form-control"
                                            value="{{ old('dob') }}" required>
                                        @error('dob')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Mobile <small>(linked with aadhar)</small></label>
                                        <input type="text" id="mobile" name="mobile" class="form-control"
                                            value="{{ old('mobile') }}" required>
                                        @error('mobile')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="anniversary_date">Anniversary Date</label>
                                        <input type="date" id="anniversary_date" name="anniversary_date"
                                            class="form-control" value="{{ old('anniversary_date') }}">
                                        @error('anniversary_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="profile-image">Profile Image</label>
                                        <input type="file" id="profile-image" name="profile_image"
                                            class="form-control" accept="image/*" required>
                                        @error('profile_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            value="{{ old('email') }}" required>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" name="password" class="form-control"
                                            required>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6" id="gstNumberField" style="display: none;">
                                    <div class="form-group">
                                        <label for="gstNumber">GST Number</label>
                                        <input type="text" id="gstNumber" name="gst_number" class="form-control"
                                            value="{{ old('gst_number') }}">
                                        @error('gst_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="father_full_name">Father Full Name</label>
                                        <input type="text" id="father_full_name" name="father_full_name"
                                            class="form-control" value="{{ old('father_full_name') }}" required>
                                        @error('father_full_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="business_name">Business Name</label>
                                        <input type="text" id="business_name" name="business_name"
                                            class="form-control" value="{{ old('business_name') }}">
                                        @error('business_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select id="gender" name="gender" class="form-control">
                                            <option value="1" {{ old('gender') == '1' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="0" {{ old('gender') == '0' ? 'selected' : '' }}>Female
                                            </option>
                                        </select>
                                        @error('gender')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="refer">Refer UserName</label>
                                        <input type="text" id="refer" name="refer" class="form-control"
                                            value="{{ old('refer') }}" required>
                                        @error('refer')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
