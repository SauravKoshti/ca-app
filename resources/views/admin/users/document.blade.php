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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Form Elements</div>
                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="list-tab" data-bs-toggle="tab" data-bs-target="#list"
                                type="button" role="tab" aria-controls="list" aria-selected="false">User List</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Form Elements</div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="firstname">First Name</label>
                                                        <p class="form-control-static">{{ $userData->firstname }}</p>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="lastname">Last Name</label>
                                                        <p class="form-control-static">{{ $userData->lastname }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="username">Username</label>
                                                        <p class="form-control-static">{{ $userData->username }}</p>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="mobile">Mobile</label>
                                                        <p class="form-control-static">{{ $userData->mobile }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <p class="form-control-static">{{ $userData->email }}</p>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <p class="form-control-static">*******</p>
                                                        <!-- Hide actual password -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="pancard">PAN Card</label>
                                                        <p class="form-control-static">{{ $userData->pancard }}</p>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="adharcard">Aadhar Card</label>
                                                        <p class="form-control-static">{{ $userData->adharcard }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Gender</label>
                                                        <p class="form-control-static">{{ $userData->gender }}</p>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="dob">Date of Birth</label>
                                                        <p class="form-control-static">{{ $userData->dob }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Upload Documents</div>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('users.upload.document', $userId) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $userId }}">
                                        <input type="hidden" name="created_by" value="{{ $loggedInUserId }}">
                                        <div class="mb-3">
                                            <label>Document Name:</label>
                                            <input type="text" name="document_name" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Document Type:</label>
                                            <select name="doc_type" class="form-control" required>
                                                <option value="aadhar_card">Aadhar Card</option>
                                                <option value="pan_card">Pan Card</option>
                                                <option value="form_16">Form 16</option>
                                                <option value="rc_book">RC Book</option>
                                                <option value="bank_statement">Bank Statement</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label>Upload File:</label>
                                            <input type="file" name="document_image_path" class="form-control" required>
                                        </div>
                                        <button type="submit" class="btn btn-success">Upload</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="list-tab">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">User List</div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <!-- <th>#</th> -->
                                                <th>Document Name</th>
                                                <th>Document Type</th>
                                                <th>Document Image</th>
                                                <!-- <th>Mobile</th> -->
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($documentDataArray as $documentData)
                                            <tr>
                                                <!-- <td>{{ $documentData }}</td> -->
                                                <td>{{ $documentData->document_name }}</td>
                                                <td>{{ $documentData->doc_type }}</td>
                                                <td>
                                                    <img src="{{ asset($documentData->document_image_path) }}"
                                                        alt="Document Image">

                                                </td>

                                                <td>
                                                    <a href="{{ asset( $documentData->document_image_path) }}" download
                                                        class="btn btn-success">
                                                        <i class="fas fa-download"></i> Download
                                                    </a>

                                                    <form action="{{ route('users.destroy', $documentData->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- End of User List Tab -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection