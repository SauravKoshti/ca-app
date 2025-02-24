@extends('admin.layout.master')
@section('title', 'Create User')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">User</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="{{ route('admin.index') }}">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="{{route('users.index')}}">User</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="">User Create</a>
                </li>
            </ul>
        </div>
        <div class="row">
            {{-- <div class="col-md-3">
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Vertical Tabs -->
                            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                                    aria-selected="true">Home</button>
                                <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-profile" type="button" role="tab"
                                    aria-controls="v-pills-profile" aria-selected="false">Profile</button>
                                <button class="nav-link" id="v-pills-document-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-document" type="button" role="tab"
                                    aria-controls="v-pills-document" aria-selected="false">Document</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col">
                <!-- Tab Content -->
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                        <h3>Home</h3>
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">User Create</div>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <form action="{{ route('register') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <!-- User Type -->
                                                <div class="col-md-6">
                                                    <label for="userType" class="form-label">User Type</label>
                                                    <select id="userType" name="user_type" class="form-control"
                                                        onchange="toggleGstNumberField()" >
                                                        <option value="personal">Personal User</option>
                                                        <option value="gst">GST</option>
                                                    </select>
                                                    @error('user_type') <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <!-- Username -->
                                                <div class="col-md-6">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" id="username" name="username"
                                                        class="form-control" >
                                                    @error('username') <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                <label for="first_name">First Name (Applicant Name):</label>
                                                    <input type="text" id="firstName" name="first_name"
                                                        class="form-control" >
                                                    @error('first_name') <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6">
                                                <label for="last_name">Last Name (Surname):</label>
                                                    <input type="text" id="lastName" name="last_name"
                                                        class="form-control" >
                                                    @error('last_name') <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="fatherFullName" class="form-label">Father's Full
                                                        Name</label>
                                                    <input type="text" id="fatherFullName" name="father_full_name"
                                                        class="form-control" >
                                                    @error('father_full_name') <span
                                                        class="text-danger">{{ $message }}</span> @enderror
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="dob" class="form-label">Date of Birth</label>
                                                    <input type="date" id="dob" name="dob" class="form-control"
                                                        >
                                                    @error('dob') <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" id="email" name="email" class="form-control"
                                                        >
                                                    @error('email') <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="mobile" class="form-label">Mobile</label>
                                                    <input type="text" id="mobile" name="mobile" class="form-control"
                                                        >
                                                    @error('mobile') <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="aadharCard" class="form-label">Aadhar Card</label>
                                                    <input type="text" id="aadharCard" name="aadhar_card"
                                                        class="form-control" >
                                                    @error('aadhar_card') <span
                                                        class="text-danger">{{ $message }}</span> @enderror
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="panCard" class="form-label">PAN Card</label>
                                                    <input type="text" id="panCard" name="pan_card" class="form-control"
                                                        >
                                                    @error('pan_card') <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6" id="gstNumberField" style="display: none;">
                                                    <label for="gstNumber" class="form-label">GST Number</label>
                                                    <input type="text" id="gstNumber" name="gst_number"
                                                        class="form-control">
                                                    @error('gst_number') <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="address" class="form-label">Address</label>
                                                    <textarea id="address" name="address" class="form-control"
                                                        ></textarea>
                                                    @error('address') <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="city" class="form-label">City</label>
                                                    <input type="text" id="city" name="city" class="form-control"
                                                        >
                                                    @error('city') <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="pincode" class="form-label">Pincode</label>
                                                    <input type="text" id="pincode" name="pincode" class="form-control"
                                                        >
                                                    @error('pincode') <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="anniversaryDate" class="form-label">Anniversary
                                                        Date</label>
                                                    <input type="date" id="anniversaryDate" name="anniversary_date"
                                                        class="form-control">
                                                    @error('anniversary_date') <span
                                                        class="text-danger">{{ $message }}</span> @enderror
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="gender" class="form-label">Gender</label>
                                                    <select id="gender" name="gender" class="form-control">
                                                        <option value="1">Male</option>
                                                        <option value="0">Female</option>
                                                    </select>
                                                    @error('gender') <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" id="password" name="password"
                                                        class="form-control" >
                                                    @error('password') <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Register</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection