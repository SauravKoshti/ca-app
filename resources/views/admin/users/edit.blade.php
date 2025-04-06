@extends('admin.layout.master')
@section('title', 'Edit User')
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
                    <a href="{{ route('users.index') }}">User</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <span>Edit User</span>
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
                            <div class="row">
                                <!-- Form for Editing User -->

                                <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <!-- <form action="{{ route('users.store') }}" method="POST">
                                        @csrf -->
                                    <div class="row">
                                        {{-- User Type --}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userType">User Type</label><span class="text-danger ms-1">*</span>
                                                <select id="userType" name="user_type" class="form-control"
                                                    required onchange="toggleGstNumberField()">
                                                    <option value="personal"
                                                        {{ old('user_type', $user->user_type) == 'personal' ? 'selected' : '' }}>
                                                        Personal User
                                                    </option>
                                                    <option value="gst"
                                                        {{ old('user_type', $user->user_type) == 'gst' ? 'selected' : '' }}>
                                                        GST User
                                                    </option>
                                                </select>
                                                @error('user_type')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Business Name --}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="company_name">Business Name</label>
                                                <input type="text" id="company_name" name="company_name"
                                                    class="form-control" value="{{ old('company_name', $user->company_name) }}">
                                                @error('company_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        {{-- Example for username --}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="username">Username</label><span class="text-danger ms-1">*</span>
                                                <input type="text" id="username" name="username" class="form-control"
                                                    value="{{ old('username', $user->username) }}" required>
                                                @error('username')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Repeat the above pattern for each field: --}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password">Password</label> <span class="text-danger ms-1">*</span>
                                                <input type="password" id="password" name="password" class="form-control" autocomplete="new-password">
                                                <small class="text-muted">Leave blank if you don't want to change</small>
                                                @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- First Name --}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="first_name">First Name</label><span class="text-danger ms-1">*</span>
                                                <input type="text" id="firstName" name="first_name" class="form-control"
                                                    value="{{ old('first_name', $user->first_name) }}" required>
                                                @error('first_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Repeat this for all fields, replacing `$user->field_name` appropriately --}}
                                        {{-- Example for textarea (address) --}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address">Address</label><span class="text-danger ms-1">*</span>
                                                <textarea id="address" name="address" class="form-control" required>{{ old('address', $user->address) }}</textarea>
                                                @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="middle_name">Middle Name (Father Name/Husband)</label>
                                                <span class="text-danger ms-1">*</span>
                                                <input type="text" id="middleName" name="middle_name"
                                                    class="form-control" value="{{ old('middle_name', $user->middle_name) }}" required>
                                                @error('middle_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <span class="text-danger ms-1">*</span>
                                                <input type="text" id="city" name="city" class="form-control"
                                                    value="{{ old('city', $user->city) }}" required>
                                                @error('city')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="last_name">Last Name (Surname)</label>
                                                <span class="text-danger ms-1">*</span>
                                                <input type="text" id="lastName" name="last_name"
                                                    class="form-control" value="{{ old('last_name', $user->last_name) }}" required>
                                                @error('last_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pincode">Pincode</label>
                                                <span class="text-danger ms-1">*</span>
                                                <input type="text" id="pincode" name="pincode"
                                                    class="form-control" value="{{ old('pincode', $user->pincode) }}" required>
                                                @error('pincode')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="user_full_name" class="d-flex">
                                                    <div>Full name <small>(as per pancard)</small><span class="text-danger ms-1">*</span></div>
                                                    <div class="d-flex align-items-center ms-1">Same as above
                                                        <input type="checkbox" id="fullName" class="ms-2">
                                                    </div>
                                                </label>
                                                <input type="text" id="user_full_name" name="user_full_name"
                                                    class="form-control" value="{{ old('user_full_name', $user->user_full_name) }}" required>
                                                @error('user_full_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="state">State</label>
                                                <span class="text-danger ms-1">*</span>
                                                <input type="text" id="state" name="state" class="form-control"
                                                    value="{{ old('state', $user->state) }}" required>
                                                @error('state')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="mobile">Mobile <small>(linked with aadhar)</small></label>
                                                <span class="text-danger ms-1">*</span>
                                                <input type="text" id="mobile" name="mobile"
                                                    class="form-control" value="{{ old('mobile', $user->mobile) }}" required>
                                                @error('mobile')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="father_full_name">Father Full Name</label>
                                                <span class="text-danger ms-1">*</span>
                                                <input type="text" id="father_full_name" name="father_full_name"
                                                    class="form-control" value="{{ old('father_full_name', $user->father_full_name) }}" required>
                                                @error('father_full_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <span class="text-danger ms-1">*</span>
                                                <input type="email" id="email" name="email" class="form-control"
                                                    value="{{ old('email', $user->email) }}" required>
                                                @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="aadharCard">Aadhar Card</label>
                                                <span class="text-danger ms-1">*</span>
                                                <input type="text" id="aadharCard" name="aadhar_card"
                                                    class="form-control" value="{{ old('aadhar_card', $user->aadhar_card) }}"
                                                    placeholder="XXXX XXXX XXXX" maxlength="14" required>
                                                @error('aadhar_card')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gender">Gender</label>
                                                <span class="text-danger ms-1">*</span>
                                                <select id="gender" name="gender" class="form-control">
                                                    <option value="1" {{ old('gender', $user->gender) == '1' ? 'selected' : '' }}>Male</option>
                                                    <option value="0" {{ old('gender', $user->gender) == '0' ? 'selected' : '' }}>Female</option>
                                                </select>
                                                @error('gender')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="panCard">PAN Card</label>
                                                <span class="text-danger ms-1">*</span>
                                                <input type="text" id="panCard" name="pan_card"
                                                    class="form-control" value="{{ old('pan_card', $user->pan_card) }}"
                                                    placeholder="ABCDE1234F" pattern="[A-Za-z]{5}[0-9]{4}[A-Za-z]" maxlength="10" required>
                                                @error('pan_card')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- More fields like city, state, gender, pan_card, etc. --}}
                                        {{-- For selects like gender: --}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="dob">Date of Birth</label>
                                                <span class="text-danger ms-1">*</span>
                                                <input id="dob" name="dob" class="form-control datepicker"
                                                    value="{{ old('dob', $user->dob) }}" required>
                                                @error('dob')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="anniversary_date">Anniversary Date</label>
                                                <input id="anniversary_date" name="anniversary_date"
                                                    class="form-control datepicker"
                                                    value="{{ old('anniversary_date', $user->anniversary_date) }}">
                                                @error('anniversary_date')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="profile-image">Profile Image</label>
                                                <input type="file" id="profile-image" name="profile_image"
                                                    class="form-control" accept="image/*">
                                                @error('profile_image')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                                @if (!empty($user->profile_image))
                                                <div class="mt-2">
                                                    <img src="{{ $user->profile_image ? asset($user->profile_image) : asset('images/default-profile.png') }}" alt="Profile Image"
                                                        width="100" height="100" alt="Profile Image"
                                                        class="profile-img"
                                                        style="width: 100px; height: 100px; object-fit: cover;">
                                                </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6 gstNumberField">
                                            <div class="form-group">
                                                <label for="gstNumber">GST Number</label><span class="text-danger ms-1">*</span>
                                                <input type="text" id="gstNumber" name="gst_number"
                                                    class="form-control" value="{{ old('gst_number', $user->gst_number) }}">
                                                @error('gst_number')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="refer">Reference By</label>
                                                <input type="text" id="refer" name="refer" class="form-control"
                                                    value="{{ old('refer', $user->refer) }}">
                                                @error('refer')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-md-12 text-end mt-3">
                                            <button type="submit" class="btn btn-primary">Update User</button>
                                        </div>
                                    </div>
                                    <!-- <button type="submit" class="btn btn-primary">Register</button> -->
                                </form>

                                <!-- </form> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('section_script')
<script>
    $(document).ready(function() {
        let userType = document.getElementById("userType").value;
        if (userType === 'gst') {
            $('.gstNumberField').show();
        } else {
            $('.gstNumberField').hide();
        }

        $('#userType').on('change', function() {
            $('.gstNumberField').hide();
            if ($(this).val() === 'gst') {
                $('.gstNumberField').show();
            }
        });

        $("#fullName").change(function() {
            if ($(this).is(":checked")) {
                let firstName = $("#firstName").val().trim();
                let middleName = $("#middleName").val().trim();
                let lastName = $("#lastName").val().trim();

                let fullName = [firstName, middleName, lastName].filter(name => name !== "").join(" ");

                $("#user_full_name").val(fullName).prop("readonly", true);
            } else {
                $("#user_full_name").val("").prop("readonly", false);
            }
        });
    });
</script>
@endsection