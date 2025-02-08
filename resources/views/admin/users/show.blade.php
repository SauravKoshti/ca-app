@extends('admin.layout.master')
@section('title', 'Create User')
@section('content')
<div class="container">
    <!-- <div class="page-inner">
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
        </div> -->
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <!-- <div class="card-title">Form Elements</div> -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">Profile</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile" aria-selected="false">Document</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="list-tab" data-bs-toggle="tab" data-bs-target="#list"
                                type="button" role="tab" aria-controls="list" aria-selected="false">Document
                                List</button>
                        </li>
                    </ul>
                </div>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Profile</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="firstname">First Name</label>
                                                    <p class="form-control-static">{{ $user->first_name }}</p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="lastname">Last Name</label>
                                                    <p class="form-control-static">{{ $user->last_name }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <p class="form-control-static">{{ $user->username }}</p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="mobile">Mobile</label>
                                                    <p class="form-control-static">{{ $user->mobile }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <p class="form-control-static">{{ $user->email }}</p>
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
                                                    <p class="form-control-static">{{ $user->pan_card }}</p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="adharcard">Aadhar Card</label>
                                                    <p class="form-control-static">{{ $user->aadhaar_card }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <p class="form-control-static">{{ $user->gender }}</p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="dob">Date of Birth</label>
                                                    <p class="form-control-static">{{ $user->dob }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <p class="form-control-static">{{ $user->name }}</p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="fullname">Full Name</label>
                                                    <p class="form-control-static">{{ $user->father_full_name }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <p class="form-control-static">{{ $user->address }}</p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="city">City</label>
                                                    <p class="form-control-static">{{ $user->city }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="gst">GST Number</label>
                                                    <p class="form-control-static">{{ $user->gst_number ?? 'N/A' }}</p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="anniversary_date">Anniversary Date</label>
                                                    <p class="form-control-static">{{ $user->anniversary_date ?? 'N/A' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="usertype">User Type</label>
                                                    <p class="form-control-static">{{ ucfirst($user->user_type) }}</p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="role">Role</label>
                                                    <p class="form-control-static">{{ ucfirst($user->role) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="firstname">First Name</label>
                                                    <p class="form-control-static">{{ $user->firstname }}</p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="lastname">Last Name</label>
                                                    <p class="form-control-static">{{ $user->lastname }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <p class="form-control-static">{{ $user->username }}</p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="mobile">Mobile</label>
                                                    <p class="form-control-static">{{ $user->mobile }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <p class="form-control-static">{{ $user->email }}</p>
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
                                                    <p class="form-control-static">{{ $user->pancard }}</p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="adharcard">Aadhar Card</label>
                                                    <p class="form-control-static">{{ $user->adharcard }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <p class="form-control-static">{{ $user->gender }}</p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="dob">Date of Birth</label>
                                                    <p class="form-control-static">{{ $user->dob }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="user-profile-card">
                            <div class="card-header">
                                <div class="card-title">Upload Documents</div>
                            </div>
                            <div class="card-body">
                            <form action="{{ route('users.upload.document', $user->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
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
                        <div class="document-card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="card-title">Document List</div>
                                <div>

                                    <button class="btn btn-primary" onclick="downloadSelected('pdf')">Download Pdf</button>
                                    <button class="btn btn-primary" onclick="downloadSelected('zip')">Download Zip</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>#</th> -->
                                            <th>Select</th>
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
                                            <td>
                                                <input type="checkbox" name="document_id" data-id="{{ $documentData->id }}">
                                            </td>
                                            <td>{{ $documentData->document_name }}</td>
                                            <td>{{ $documentData->doc_type }}</td>
                                            <td>
                                                <img src="{{ asset($documentData->document_image_path) }}"
                                                    alt="Document Image" height="100" width="100">

                                            </td>

                                            <td>
                                                <a href="{{ asset( $documentData->document_image_path) }}" download
                                                    class="btn btn-success">
                                                    <i class="fas fa-download"></i> Download
                                                </a>

                                                <form action="{{ route('users.document.destroy', $documentData->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- End of Document List Tab -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
<script>
    function downloadSelected(type){
        let allIds = [];
        var checkboxes = document.querySelectorAll('[name="document_id"]:checked');
        checkboxes.forEach(function(checkbox) {
            allIds.push(checkbox.getAttribute('data-id'));
        });
        console.log(allIds); // Output the array of all checked data-id values
        $.ajax({
            url: "{{ route('users.download.documents') }}",
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                type: type,
                document_ids: allIds
            },
            xhrFields: {
                responseType: 'blob'
            },
            success: function(response) {
                var blob = new Blob([response], { type: 'application/pdf' });
                var link = document.createElement('a');
                if (type === 'pdf') {
                    link.download = 'merged_document.pdf';
                } else if (type === 'zip') {
                    link.download = 'documents.zip';
                }
                link.href = window.URL.createObjectURL(blob);
                link.click();
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                console.log('Response:', xhr.responseText);
            }
        });
    }
</script>
