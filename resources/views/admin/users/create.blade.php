@extends('admin.layout.master')
@section('title', 'Create User')
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
                    <a href="#">Basic Form</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-3">
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
            </div>
            <div class="col">
                <!-- Tab Content -->
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                        <h3>Home</h3>
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Form Elements</div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <form action="{{ route('users.store') }}" method="POST">
                                            @csrf
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="firstname">First Name</label>
                                                            <input type="text" class="form-control" id="firstname"
                                                                name="firstname" placeholder="Enter First Name">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="lastname">Last Name</label>
                                                            <input type="text" class="form-control" id="lastname"
                                                                name="lastname" placeholder="Enter Last Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="username">Username</label>
                                                            <input type="text" class="form-control" id="username"
                                                                name="username" placeholder="Enter Username">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="mobile">Mobile</label>
                                                            <input type="text" class="form-control" id="mobile"
                                                                name="mobile" placeholder="Enter Mobile Number">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input type="email" class="form-control" id="email"
                                                                name="email" placeholder="Enter Email">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="password">Password</label>
                                                            <input type="password" class="form-control" id="password"
                                                                name="password" placeholder="Enter Password">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="pancard">PAN Card</label>
                                                            <input type="text" class="form-control" id="pancard"
                                                                name="pancard" placeholder="Enter PAN Card Number">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="adharcard">Aadhar Card</label>
                                                            <input type="text" class="form-control" id="adharcard"
                                                                name="adharcard" placeholder="Enter Aadhar Card Number">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>Gender</label><br />
                                                            <div class="d-flex">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="flexRadioDefault"
                                                                        id="flexRadioDefault1" />
                                                                    <label class="form-check-label"
                                                                        for="flexRadioDefault1">
                                                                        Male
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="flexRadioDefault" id="flexRadioDefault2"
                                                                        checked />
                                                                    <label class="form-check-label"
                                                                        for="flexRadioDefault2">
                                                                        Female
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="dob">Date of Birth</label>
                                                            <input type="date" class="form-control" id="dob" name="dob">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="terms">
                                                    <label class="form-check-label" for="terms">
                                                        Agree with terms and conditions
                                                    </label>
                                                </div>
                                                <button type="submit" class="btn btn-primary mt-3">Create
                                                    User</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab">
                        <h3>Profile</h3>
                        <p>This is your profile information.</p>
                    </div>
                    <div class="tab-pane fade" id="v-pills-document" role="tabpanel"
                        aria-labelledby="v-pills-document-tab">
                        <h3>Document</h3>
                        <div class="mb-3">
                            <label>Document Type:</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Form Elements</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <form action="{{ route('users.store') }}" method="POST">
                                                    @csrf
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="firstname">First Name</label>
                                                                    <input type="text" class="form-control"
                                                                        id="firstname" name="firstname"
                                                                        placeholder="Enter First Name">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="lastname">Last Name</label>
                                                                    <input type="text" class="form-control"
                                                                        id="lastname" name="lastname"
                                                                        placeholder="Enter Last Name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="username">Username</label>
                                                                    <input type="text" class="form-control"
                                                                        id="username" name="username"
                                                                        placeholder="Enter Username">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="mobile">Mobile</label>
                                                                    <input type="text" class="form-control" id="mobile"
                                                                        name="mobile" placeholder="Enter Mobile Number">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="email">Email</label>
                                                                    <input type="email" class="form-control" id="email"
                                                                        name="email" placeholder="Enter Email">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="password">Password</label>
                                                                    <input type="password" class="form-control"
                                                                        id="password" name="password"
                                                                        placeholder="Enter Password">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Gender</label><br />
                                                                    <div class="d-flex">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="flexRadioDefault"
                                                                                id="flexRadioDefault1" />
                                                                            <label class="form-check-label"
                                                                                for="flexRadioDefault1">
                                                                                Male
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="flexRadioDefault"
                                                                                id="flexRadioDefault2" checked />
                                                                            <label class="form-check-label"
                                                                                for="flexRadioDefault2">
                                                                                Female
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="dob">Date of Birth</label>
                                                                    <input type="date" class="form-control" id="dob"
                                                                        name="dob">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="terms">
                                                            <label class="form-check-label" for="terms">
                                                                Agree with terms and conditions
                                                            </label>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary mt-3">Create
                                                            User</button>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Document Name:</label>
                                                        <input type="text" name="name" class="form-control" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label>Document Type:</label>
                                                        <select name="type" class="form-control" required>
                                                            <option value="aadhar_card">Aadhar Card</option>
                                                            <option value="pan_card">Pan Card</option>
                                                            <option value="form_16">Form 16</option>
                                                            <option value="rc_book">RC Book</option>
                                                            <option value="bank_statement">Bank Statement</option>
                                                            <option value="fd_statement">FD / Statement</option>
                                                            <option value="loan_certificate">Loan / Interest Certificate
                                                            </option>
                                                            <option value="post">Post</option>
                                                            <option value="purchase_bill">Purchase Bill</option>
                                                            <option value="sales_bill">Sales Bill</option>
                                                            <option value="gst_license">GST / Other License</option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label>Upload File:</label>
                                                        <input type="file" name="file" class="form-control" required>
                                                    </div>

                                                    <button type="submit" class="btn btn-success">Upload</button>
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
    </div>
</div>
@endsection