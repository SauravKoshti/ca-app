@extends('admin.layout.master')
@section('title', 'Edit User')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Forms</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Forms</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit User</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit User</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Form for Editing User -->
                                {{-- <form action="{{ route('users.update', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT') <!-- Spoofing PUT method -->

                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="firstname">First Name</label>
                                                    <input type="text" class="form-control" id="firstname"
                                                           name="firstname" placeholder="Enter First Name"
                                                           value="{{ old('firstname', $user->first_name) }}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="lastname">Last Name</label>
                                                    <input type="text" class="form-control" id="lastname"
                                                           name="lastname" placeholder="Enter Last Name"
                                                           value="{{ old('lastname', $user->last_name) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <input type="text" class="form-control" id="username"
                                                           name="username" placeholder="Enter Username"
                                                           value="{{ old('username', $user->username) }}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="mobile">Mobile</label>
                                                    <input type="text" class="form-control" id="mobile" name="mobile"
                                                           placeholder="Enter Mobile Number"
                                                           value="{{ old('mobile', $user->mobile) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                           placeholder="Enter Email" value="{{ old('email', $user->email) }}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control" id="password"
                                                           name="password" placeholder="Enter Password" value="{{ old('password', $user->password) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="pancard">PAN Card</label>
                                                    <input type="text" class="form-control" id="pancard" name="pancard"
                                                           placeholder="Enter PAN Card Number"
                                                           value="{{ old('pancard', $user->pancard) }}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="adharcard">Aadhar Card</label>
                                                    <input type="text" class="form-control" id="adharcard"
                                                           name="adharcard" placeholder="Enter Aadhar Card Number"
                                                           value="{{ old('adharcard', $user->adharcard) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Gender</label><br />
                                                    <div class="d-flex">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                   id="male" value="Male" {{ $user->gender == 'Male' ? 'checked' : '' }} />
                                                            <label class="form-check-label" for="male">Male</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                   id="female" value="Female" {{ $user->gender == 'Female' ? 'checked' : '' }} />
                                                            <label class="form-check-label" for="female">Female</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="dob">Date of Birth</label>
                                                    <input type="date" class="form-control" id="dob" name="dob"
                                                           value="{{ old('dob', $user->dob) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="terms"
                                                {{ old('terms') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="terms">Agree with terms and conditions</label>
                                        </div>

                                        <button type="submit" class="btn btn-primary mt-3">Update User</button>
                                    </div>
                                </form> --}}
                                <form action="{{ route('users.update', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="firstname">First Name</label>
                                                    <input type="text" class="form-control" id="firstname"
                                                        name="firstname" value="{{ old('firstname', $user->first_name) }}"
                                                        placeholder="Enter First Name">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="lastname">Last Name</label>
                                                    <input type="text" class="form-control" id="lastname"
                                                        name="lastname" value="{{ old('lastname', $user->last_name) }}"
                                                        placeholder="Enter Last Name">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <input type="text" class="form-control" id="username"
                                                        name="username" value="{{ old('username', $user->username) }}"
                                                        placeholder="Enter Username">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="mobile">Mobile</label>
                                                    <input type="text" class="form-control" id="mobile" name="mobile"
                                                        value="{{ old('mobile', $user->mobile) }}"
                                                        placeholder="Enter Mobile Number">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        value="{{ old('email', $user->email) }}" placeholder="Enter Email">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="password">Password (Leave blank to keep current
                                                        password)</label>
                                                    <input type="password" class="form-control" id="password"
                                                        name="password" placeholder="Enter New Password">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="pancard">PAN Card</label>
                                                    <input type="text" class="form-control" id="pancard" name="pancard"
                                                        value="{{ old('pancard', $user->pan_card) }}"
                                                        placeholder="Enter PAN Card Number">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="aadhaar_card">Aadhar Card</label>
                                                    <input type="text" class="form-control" id="aadhaar_card"
                                                        name="aadhaar_card"
                                                        value="{{ old('aadhaar_card', $user->aadhaar_card) }}"
                                                        placeholder="Enter Aadhar Card Number">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Gender</label><br />
                                                    <div class="d-flex">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                value="Male" id="gender_male"
                                                                {{ old('gender', $user->gender) == 'Male' ? 'checked' : '' }} />
                                                            <label class="form-check-label" for="gender_male">Male</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                value="Female" id="gender_female"
                                                                {{ old('gender', $user->gender) == 'Female' ? 'checked' : '' }} />
                                                            <label class="form-check-label"
                                                                for="gender_female">Female</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="dob">Date of Birth</label>
                                                    <input type="date" class="form-control" id="dob"
                                                        name="dob" value="{{ old('dob', $user->dob) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3">Update User</button>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
