@extends('admin.layout.master')
@section('title', 'Create User')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">User</h3>
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
                    <a href="#">User</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Show User</a>
                </li>
            </ul>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">User Details</div>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-line nav-color-secondary" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">Profile</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="document-tab" data-bs-toggle="tab"
                                    data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                    aria-selected="false">Document</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="list-tab" data-bs-toggle="tab" data-bs-target="#list"
                                    type="button" role="tab" aria-controls="list" aria-selected="false">Document
                                    List</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment"
                                    type="button" role="tab" aria-controls="payment" aria-selected="false">Payment
                                    List</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="refer-tab" data-bs-toggle="tab" data-bs-target="#refer"
                                    type="button" role="tab" aria-controls="refer" aria-selected="false">Refer
                                    List</button>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="usertype">User Type</label>
                                                    <p class="form-control-static">{{ $user->user_type ?? 'N/A' }}</p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <p class="form-control-static">{{ $user->username ?? 'N/A'}}</p>
                                                    <!-- <input type="text" class="form-control" id="username" name="username"
                                                        value="{{ old('username', $user->username) }}"
                                                        placeholder="Enter Username" /> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                <label for="first_name">First Name (Applicant Name):</label>
                                                    <p class="form-control-static">{{ $user->first_name ?? 'N/A' }}</p>
                                                    <!-- <input type="text" class="form-control" id="firstname" name="firstname"
                                                        value="{{ old('firstname', $user->first_name) }}"
                                                        placeholder="Enter First Name" /> -->
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                <label for="last_name">Last Name (Surname):</label>
                                                    <p class="form-control-static">{{ $user->lastname ?? 'N/A'}}</p>
                                                    <!-- <input type="text" class="form-control" id="lastname" name="lastname"
                                                        value="{{ old('lastname', $user->last_name) }}"
                                                        placeholder="Enter Last Name" /> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="fullname">Full Name</label>
                                                    <p class="form-control-static">
                                                        {{ $user->father_full_name ?? 'N/A' }}</p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <p class="form-control-static">{{ $user->address ?? 'N/A' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="city">City</label>
                                                    <p class="form-control-static">{{ $user->city ?? 'N/A' }}</p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="pincode">Pincode</label>
                                                    <p class="form-control-static">{{ $user->pincode ?? 'N/A' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="adharcard">Aadhar Card</label>
                                                    <p class="form-control-static">{{ $user->aadhar_card ?? 'N/A' }}</p>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="pancard">PAN Card</label>
                                                    <p class="form-control-static">{{ $user->pan_card ?? 'N/A' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="dob">Date of Birth</label>
                                                    <p class="form-control-static">{{ \Carbon\Carbon::parse($user->dob)->format('d-m-Y') ?? 'N/A' }}</p>
                                                    <!-- <input type="date" class="form-control" id="dob" name="dob"
                                                        value="{{ old('dob', $user->dob) }}" /> -->
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="mobile">Mobile</label>
                                                    <p class="form-control-static">{{ $user->mobile ?? 'N/A' }}
                                                        <!-- <input type="text" class="form-control" id="mobile" name="mobile"
                                                        value="{{ old('mobile', $user->mobile) }}"
                                                        placeholder="Enter Mobile Number" /> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="anniversary_date">Anniversary Date</label>
                                                    <p class="form-control-static">
                                                        {{ \Carbon\Carbon::parse($user->anniversary_date)->format('d-m-Y') ?? 'N/A' }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="profile_image">Profile Image</label>
                                                    <br>
                                                    <img src="{{ asset($user->profile_image) }}" alt="Profile Image"
                                                        class="img-thumbnail mt-2" width="150" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <p class="form-control-static">{{ $user->email ?? 'N/A' }}</p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <p class="form-control-static">*******</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="company-name">Business Name</label>
                                                    <p class="form-control-static">{{ $user->business_name ?? 'N/A' }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Gender</label><br />
                                                    <div class="d-flex">
                                                        <div class="form-check">
                                                            <p class="form-control-static">{{
  $user->gender == 0 ? 'Female' : ($user->gender == 1 ? 'Male' : 'N/A');
 }}</p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="user-profile-card">
                                <!-- <div class="card-header">
                                                    <div class="card-title">Upload Documents</div>
                                                </div> -->
                                <div class="card-body">
                                    <form action="{{ route('users.upload.document', $user->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        <input type="hidden" name="created_by" value="{{ $loggedInUserId }}">
                                        <div class="mb-3">
                                            <label>Document Name:</label>
                                            <input type="text" name="document_name" class="form-control">
                                            @error('document_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                        <div class="mb-3">
                                            <label>Document Type:</label>
                                            @if (auth()->user()->user_type == 'personal' || auth()->user()->user_type == 'gst')
                                            <select name="doc_type" class="form-control">
                                                <option value="aadhar_card">Aadhar Card</option>
                                                <option value="pan_card">Pan Card</option>
                                                <option value="form_16">Form 16</option>
                                                <option value="rc_book">RC Book</option>
                                                <option value="bank_statement">Bank Statement</option>
                                            </select>
                                            @elseif(auth()->user()->user_type == 'admin')
                                            <select name="doc_type" class="form-control">
                                                <option value="computation">Computation</option>
                                                <option value="trading">Trading</option>
                                                <option value="p&l">P&L</option>
                                                <option value="capital">Capital</option>
                                                <option value="balance_sheet">Balance Sheet</option>
                                                <option value="26a5">26A5</option>
                                                <option value="aib">AIB</option>
                                                <option value="ttb">TTB</option>
                                                <option value="gstr_1_excel">GSTR 1 Excel</option>
                                                <option value="gstr_1_json">GSTR 1 JSON</option>
                                                <option value="gstr_1_pdf">GSTR 1 PDF</option>
                                                <option value="gst_3b_pdf">GST 3B PDF</option>
                                                <option value="gst_2b_pdf">GST 2B PDF</option>
                                                <option value="gst_challan_pdf">GST Challan PDF</option>
                                                <option value="gst_summary">GST Summary</option>
                                            </select>
                                            @endif

                                            @error('doc_type')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label>Upload File:</label>
                                            <input type="file" name="document_image_path" class="form-control">
                                            @error('document_image_path')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-success">Upload</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="list-tab">
                            <div class="document-card">
                                <div class="card-header d-flex justify-content-between">
                                    <!-- <div class="card-title">Document List</div> -->
                                    <div>
                                        <button class="btn btn-primary ms-auto"
                                            onclick="downloadSelected('pdf')">Download
                                            Pdf</button>
                                        <button class="btn btn-primary ms-auto"
                                            onclick="downloadSelected('zip')">Download
                                            Zip</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Select</th>
                                                <th>Document Name</th>
                                                <th>Document Type</th>
                                                <th>Document Image</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($documentDataArray->isEmpty())
                                            <tr>
                                                <td colspan="4" class="text-center">No documet records found.</td>
                                            </tr>
                                            @else
                                            @foreach ($documentDataArray as $documentData)
                                            <tr>
                                                <!-- <td>{{ $documentData }}</td> -->
                                                <td>
                                                    <input type="checkbox" name="document_id"
                                                        data-id="{{ $documentData->id }}">
                                                </td>
                                                <td>{{ $documentData->document_name }}</td>
                                                <td>{{ $documentData->doc_type }}</td>
                                                <td>
                                                    <img src="{{ asset($documentData->document_image_path) }}"
                                                        alt="Document Image" height="100" width="100">

                                                </td>

                                                <td>
                                                    <a href="{{ asset($documentData->document_image_path) }}" download
                                                        class="btn btn-success">
                                                        <i class="fas fa-download"></i> Download
                                                    </a>

                                                    <form action="{{ route('users.document.destroy') }}" method="POST"
                                                        style="display:inline;">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $documentData->id }}">
                                                        <input type="hidden" name="user_id"
                                                            value="{{ $documentData->user_id }}">
                                                        <button type="submit"
                                                            class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                            <div class="document-card">
                                <div class="card-body">
                                    <div class="Payment-card">
                                    @if (auth()->user()->user_type == 'admin')
                                        <div class="card-header d-flex justify-content-between">
                                            <!-- <div class="card-title">Payment List</div> -->
                                            <div class="btn-primary btn-round ms-auto">
                                                <a href="{{ route('users.payment', ['user' => $user->id]) }}"
                                                    class="btn btn-primary btn-round ms-auto">
                                                    <!-- <i class="fa fa-money"></i> -->
                                                    <!-- <i class="fa-solid fa-indian-rupee-sign"></i> -->
                                                    Add Payment
                                                </a>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Payment Discuss</th>
                                                        <th>Paid Amount</th>
                                                        <th>Payment Date</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($payments->isEmpty())
                                                    <tr>
                                                        <td colspan="4" class="text-center">No payment records
                                                            found.</td>
                                                    </tr>
                                                    @else
                                                    @foreach ($payments as $payment)
                                                    <tr>
                                                        <td>{{ $payment->discuss_fees }}</td>
                                                        <td>{{ $payment->paid_fees }}</td>
                                                        <td>{{ $payment->payment_date }}</td>
                                                        <td>
                                                            <a href="{{ route('users.payment.edit', $payment->id) }}"
                                                                class="btn btn-link btn-primary btn-lg"
                                                                data-bs-toggle="tooltip" title="Edit Task">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <form action="{{ route('users.payment.destroy') }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                <input type="hidden" name="id"
                                                                    value="{{ $payment->id }}">
                                                                <input type="hidden" name="user_id"
                                                                    value="{{ $payment->user_id }}">
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="refer" role="tabpanel" aria-labelledby="refer-tab">
                            <div class="document-card">
                                <div class="card-body">
                                    <div class="Refer-card">
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>User Name</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($referData->isEmpty())
                                                    <tr>
                                                        <td colspan="4" class="text-center">No payment records
                                                            found.</td>
                                                    </tr>
                                                    @else
                                                    @foreach ($referData as $refer)
                                                    <tr>
                                                        <td>{{ $refer->username }}</td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
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
    @section('section_script')
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        let params = new URLSearchParams(window.location.search);
        let tab = params.get('tab');
        if (tab) {
            let tabElement = document.querySelector(`[id="${tab}"]`);
            if (tabElement) {
                new bootstrap.Tab(tabElement).show();
            }
        }
    });

    function downloadSelected(type) {
        let allIds = [];
        var checkboxes = document.querySelectorAll('[name="document_id"]:checked');
        checkboxes.forEach(function(checkbox) {
            allIds.push(checkbox.getAttribute('data-id'));
        });
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
                var blob = new Blob([response], {
                    type: 'application/pdf'
                });
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
    @endsection