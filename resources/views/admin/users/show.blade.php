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
            <div class="row">
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
                                    <button class="nav-link" id="download-document-tab" data-bs-toggle="tab"
                                        data-bs-target="#download-document" type="button" role="tab"
                                        aria-controls="download-document" aria-selected="false">
                                        Download Document
                                    </button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment"
                                        type="button" role="tab" aria-controls="payment" aria-selected="false">Payment
                                        List</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="refer-tab" data-bs-toggle="tab" data-bs-target="#refer"
                                        type="button" role="tab" aria-controls="refer" aria-selected="false">Reference
                                        List</button>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="profile-tab">
                                <div class="profile-card">

                                    @if (!empty($user->profile_image))
                                        <img src="{{ asset($user->profile_image) }}" alt="Profile Image"
                                            class="profile-img">
                                    @else
                                        <img src="{{ asset('profiles/dummy.png') }}" alt="Profile Image"
                                            class="profile-img">
                                    @endif

                                    <div class="profile-info">
                                        <h3>{{ $user->first_name }} {{ $user->lastname }}</h3>
                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label">Username</label>
                                                <p> {{ $user->user_type ?? 'N/A' }}</p>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Username</label>
                                                <p>{{ $user->username ?? 'N/A' }}</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <p>{{ $user->father_full_name ?? 'N/A' }}</p>
                                            <div class="col">
                                                <label class="form-label">Full Name</label>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Address</label>
                                                <p>{{ $user->address ?? 'N/A' }}</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label">City</label>
                                                <p>{{ $user->city ?? 'N/A' }}</p>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Pincode</label>
                                                <p>{{ $user->pincode ?? 'N/A' }}</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label">Aadhar Card</label>
                                                <p>{{ $user->aadhar_card ?? 'N/A' }}</p>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">PAN Card</label>
                                                <p>{{ $user->pan_card ?? 'N/A' }}</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label">Date of Birth</label>
                                                <p>{{ \Carbon\Carbon::parse($user->dob)->format('d-m-Y') ?? 'N/A' }}</p>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Mobile</label>
                                                <p>{{ $user->mobile ?? 'N/A' }}</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label">Anniversary Date</label>
                                                <p>{{ \Carbon\Carbon::parse($user->anniversary_date)->format('d-m-Y') ?? 'N/A' }}
                                                </p>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Email</label>
                                                <p>{{ $user->email ?? 'N/A' }}</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label">Business Name</label>
                                                <p>{{ $user->business_name ?? 'N/A' }}</p>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Gender</label>
                                                <p>
                                                    {{ $user->gender == 0 ? 'Female' : ($user->gender == 1 ? 'Male' : 'N/A') }}
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="user-profile-card">
                                    <div class="card-body">
                                        <form id="fileUploadForm" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            <input type="hidden" name="created_by" value="{{ $loggedInUserId }}">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label>Select Type</label>
                                                    <select class="form-control" name="upload_type"
                                                        onclick="changeType(this.value)">
                                                        <option value="Online">Online</option>
                                                        <option value="Manual">Manual</option>
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label>Select Financial Year</label>
                                                    <select class="form-control" name="financial_year"
                                                        id="financial_year">
                                                        <option value="" selected disabled>Select Financial Year
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label>Date From</label>
                                                    <input name="date_from" id="date_from" class="form-control datepicker">
                                                </div>
                                                <div class="col-6">
                                                    <label>Date To</label>
                                                    <input name="date_to" id="date_to" class="form-control datepicker">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label>Document Name:</label>
                                                <input type="text" name="document_name" class="form-control">
                                                @error('document_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                            <div class="mb-3">
                                                <label>Document Type:</label>
                                                <select name="doc_type" id="doc_type"
                                                    class="form-control select2-multiple">
                                                    <option value="aadhaar_card">Aadhaar Card / આધાર કાર્ડ</option>
                                                    <option value="pan_card">PAN Card / પાન કાર્ડ</option>
                                                    <option value="form_16">Form 16 / ફોર્મ 16</option>
                                                    <!-- <option value="election_card">Election Card / ચૂંટણી કાર્ડ </option> -->
                                                    <option value="rc_book">RC Book / આરસી બુક</option>
                                                    <option value="bank_statement">Bank Statement / Passbook / બેંક
                                                        સ્ટેટમેન્ટ /પાસબુક</option>
                                                    <option value="fd_statement">Fixed Deposit statment & Certicate /
                                                        બાંધી
                                                        મુદતની થાપણ / પ્રમાણપત્ર</option>
                                                    <option value="loan_statement">Loan Statement & interest
                                                        certificate /
                                                        લોન સ્ટેટમેન્ટ / લોન પત્ર</option>
                                                    <option value="driving_license">Driving License / ડ્રાઈવિંગ લાયસન્સ
                                                    </option>
                                                    <option value="residential_proof">Residential Proof / રહેઠાણ પુરાવો
                                                    </option>
                                                    <option value="property_tax_receipt">Property Tax Receipt / મિલ્કત
                                                        કર
                                                        રસીદ</option>
                                                    <option value="electricity_bill">Latest Electricity or Telephone
                                                        Bill /
                                                        તાજેતરની વીજળી અથવા ટેલિફોન બીલ</option>
                                                    <option value="business_proof">Business Proof / Registration
                                                        Certificate
                                                        / વ્યવસાય પુરાવો / નોંધણી પ્રમાણપત્ર</option>
                                                    <option value="etc">ETC (Toll, FASTag, Other) / ETC (ટોલ,
                                                        ફાસ્ટેગ, અન્ય)
                                                    </option>
                                                    <option value="purchase_bill">Purchase Bill / ખરીદી બિલ</option>
                                                    <option value="sales_bill">Sales Bill / વેચાણ બિલ</option>
                                                    <option value="expense_bill">Expense Bill / ખર્ચ બિલ</option>
                                                    @if (auth()->user()->user_type == 'admin')
                                                        <option value="computation">Computation</option>
                                                        <option value="trading">Trading</option>
                                                        <option value="p&l">P&L</option>
                                                        <option value="capital">Capital</option>
                                                        <option value="balance_sheet">Balance Sheet</option>
                                                        <option value="26aS">26AS</option>
                                                        <option value="aib">AIB</option>
                                                        <option value="ttb">TTB</option>
                                                        <option value="gstr_1_excel">GSTR 1 Excel</option>
                                                        <option value="gstr_1_json">GSTR 1 JSON</option>
                                                        <option value="gstr_1_pdf">GSTR 1 PDF</option>
                                                        <option value="gst_3b_pdf">GST 3B PDF</option>
                                                        <option value="gst_2b_pdf">GST 2B PDF</option>
                                                        <option value="gst_challan_pdf">GST Challan PDF</option>
                                                        <option value="gst_summary">GST Summary</option>
                                                    @endif
                                                </select>

                                                @error('doc_type')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label>Upload File:</label>
                                                <input type="file" if name="document_image_path" id="fileInput"
                                                    class="form-control" accept="image/*,.pdf">
                                                @error('document_image_path')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <button type="submit" class="btn btn-success">Upload</button>
                                        </form>
                                        <div class="progress mt-3" style="display: none;">
                                            <div id="progressBar" class="progress-bar" role="progressbar"
                                                style="width: 0%;" aria-valuenow="0" aria-valuemin="0"
                                                aria-valuemax="100">0%</div>
                                        </div>

                                        <div id="message" class="mt-3"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="list-tab">
                                <div class="document-card">
                                    <div class="card-body">
                                        <table class="datatables table table-bordered" id="documentTable"
                                            data-order='[]'>
                                            <thead>
                                                <tr>
                                                    <th>Document Name</th>
                                                    <th>Document Type</th>
                                                    <th>Upload Type</th>
                                                    <th>Uploaded By</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($documentDataArray->isEmpty())
                                                    <tr>
                                                        <td colspan="4" class="text-center">No document records found.
                                                        </td>
                                                    </tr>
                                                @else
                                                    @foreach ($documentDataArray as $documentData)
                                                        <tr>
                                                            <td>{{ $documentData->document_name }}</td>
                                                            <td>
                                                                @if ($documentData->doc_type)
                                                                    @foreach (explode(',', $documentData->doc_type) as $doc_type)
                                                                        <p class="mb-0">
                                                                            {{ Config::get('constant.doc_type')[$doc_type] }}
                                                                        </p>
                                                                    @endforeach
                                                                @endif
                                                            </td>
                                                            <td>{{ $documentData->upload_type }} </td>
                                                            <td>
                                                                <p> {{ $documentData->uploader->user_full_name }}</p>
                                                                <p> {{ \Carbon\Carbon::parse($user->created_at)->format('d-m-Y H:i:s') ?? 'N/A' }}
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <a href="{{ asset($documentData->document_image_path) }}"
                                                                    download class="btn btn-success">
                                                                    <i class="fas fa-download"></i>
                                                                </a>

                                                                <form action="{{ route('users.document.destroy') }}"
                                                                    id="documentUpload" method="POST"
                                                                    style="display:inline;">
                                                                    @csrf
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $documentData->id }}">
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

                            <div class="tab-pane fade" id="download-document" role="tabpanel"
                                aria-labelledby="download-document-tab">
                                <div class="download-document-card">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="d-flex align-items-center" style="width: 220px;">
                                            <label for="yearSelect" class="w-100">Select Year:</label>
                                            <select id="downloadYearSelect" class="form-control"
                                                onchange="handleYearChange(this.value)" name="year">
                                                <option value="">Select Year</option>
                                            </select>
                                        </div>
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
                                        <div class="table-responsive">
                                            <table class="datatables display table table-striped table-hover"
                                                id="downloadDocTable">
                                                <thead>
                                                    <tr>
                                                        <th><input type="checkbox" name="select_all"></th>
                                                        <th>Document Name</th>
                                                        <th>Document Type</th>
                                                        <th>Upload Type</th>
                                                        <th>Uploaded By</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($documentDataArray->isEmpty())
                                                        <tr>
                                                            <td colspan="6" class="text-center">No document records
                                                                found.
                                                            </td>
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
                                                                <td>
                                                                    @if ($documentData->doc_type)
                                                                        @foreach (explode(',', $documentData->doc_type) as $doc_type)
                                                                            <p class="mb-0">
                                                                                {{ Config::get('constant.doc_type')[$doc_type] }}
                                                                            </p>
                                                                        @endforeach
                                                                    @endif
                                                                </td>
                                                                <td>{{ $documentData->upload_type }} </td>
                                                                <td>
                                                                    <p> {{ $documentData->uploader->user_full_name }}</p>
                                                                    <p> {{ \Carbon\Carbon::parse($user->created_at)->format('d-m-Y H:i:s') ?? 'N/A' }}
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <a href="{{ asset($documentData->document_image_path) }}"
                                                                        download class="btn btn-success">
                                                                        <i class="fas fa-download"></i>
                                                                    </a>

                                                                    <form action="{{ route('users.document.destroy') }}"
                                                                        id="documentUpload" method="POST"
                                                                        style="display:inline;">
                                                                        @csrf
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $documentData->id }}">
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
                                                <div class="table-responsive">
                                                    <table class="datatables display table table-striped table-hover">
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
                                                                    <td colspan="4" class="text-center">No payment
                                                                        records
                                                                        found.</td>
                                                                </tr>
                                                            @else
                                                                @foreach ($payments as $payment)
                                                                    <tr>
                                                                        <td>{{ $payment->discuss_fees }}</td>
                                                                        <td>{{ $payment->paid_fees }}</td>
                                                                        <td>{{ $payment->payment_date }}</td>
                                                                        @if (auth()->user()->user_type == 'admin')
                                                                            <td>
                                                                                <a href="{{ route('users.payment.edit', $payment->id) }}"
                                                                                    class="btn btn-link btn-primary btn-lg"
                                                                                    data-bs-toggle="tooltip"
                                                                                    title="Edit Task">
                                                                                    <i class="fa fa-edit"></i>
                                                                                </a>

                                                                                <button type="button"
                                                                                    onClick="removeData({{ $payment->id }}, 'payment')"
                                                                                    class="btn btn-link btn-danger remove_data"
                                                                                    data-bs-toggle="tooltip"
                                                                                    title="Remove">
                                                                                    <i class="fa fa-times"></i>
                                                                                </button>
                                                                                </form>
                                                                            </td>
                                                                        @endif
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
                            <div class="tab-pane fade" id="refer" role="tabpanel" aria-labelledby="refer-tab">
                                <div class="document-card">
                                    <div class="card-body">
                                        <div class="Refer-card">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="datatables display table table-striped table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>User Name</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if ($referData->isEmpty())
                                                                <tr>
                                                                    <td colspan="4" class="text-center">No payment
                                                                        records
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
        </div>
    @endsection
    @section('section_script')
        <script>
            function handleYearChange(year) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "/fetch-images",
                    type: "POST",
                    data: {
                        year: year
                    },
                    success: function(response) {
                        $('#downloadDocTable tbody').html(response);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });

            }

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
            $(document).ready(function() {
                // Load images on page load
                handleYearChange();
                // Select/Deselect all checkboxes
                $('#fileUploadForm').on('submit', function(event) {
                    event.preventDefault();

                    let formData = new FormData(this);
                    let file = $('#fileInput')[0].files[0];

                    if (!file) {
                        alert("Please select a file to upload.");
                        return;
                    }

                    $('.progress').show();
                    $('#progressBar').css('width', '0%').text('0%');
                    // Disable form fields and button
                    $('#fileUploadForm input, #fileUploadForm select, #uploadBtn').prop('disabled', true);
                    $.ajax({
                        url: "{{ route('users.upload.document', $user->id) }}",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        },
                        xhr: function() {
                            let xhr = new window.XMLHttpRequest();
                            xhr.upload.addEventListener("progress", function(evt) {
                                if (evt.lengthComputable) {
                                    let percentComplete = Math.round((evt.loaded / evt
                                        .total) * 100);
                                    $('#progressBar').css('width', percentComplete + '%')
                                        .text(percentComplete + '%');
                                }
                            }, false);
                            return xhr;
                        },
                        success: function(response) {
                            successMessage('Document created successfully.')
                            $('#progressBar').css('width', '100%').text('Upload Complete');
                        },
                        error: function(xhr) {
                            $('#message').html(
                                '<div class="alert alert-danger">Error uploading file.</div>');
                            $('#progressBar').css('width', '0%').text('0%');
                        },
                        complete: function() {
                            // Enable form fields and button after upload completes
                            $('#fileUploadForm input, #fileUploadForm select, #uploadBtn').prop(
                                'disabled', false);
                        }
                    });
                });

            });

            $('[name="select_all"]').on('change', function() {
                $('[name="document_id"]').prop('checked', this.checked);
            });

            function changeType(uploadType) {
                if (uploadType === 'Manual') {
                    $('#doc_type').prop('multiple', true).attr('name', 'doc_type[]').select2();
                } else {
                    $('#doc_type').prop('multiple', false).attr('name', 'doc_type').select2();
                }
            }

            function downloadSelected(type) {
                const year = $('#downloadYearSelect').val();
                // console.log(year);
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
                        document_ids: allIds,
                        select_all: $('[name="select_all"]').val(),
                        year: year
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

            $(document).ready(function() {
                $(".datepicker").prop("disabled", true);

                // Function to set date range based on selected financial year
                $("#financial_year").change(function() {
                    var financialYear = $(this).val();
                    var years = financialYear.split("-"); // Split into [startYear, endYear]
                    var startDate = `04/01/${years[0]}`; // April 1st of start year
                    var endDate = `03/31/${years[1]}`;   // March 31st of end year

                    if (startDate && endDate) {
                        $("#date_from").datepicker("destroy").datepicker({
                            dateFormat: "mm/dd/yy",
                            minDate: new Date(startDate),
                            maxDate: new Date(endDate)
                        }).val(startDate);

                        $("#date_to").datepicker("destroy").datepicker({
                            dateFormat: "mm/dd/yy",
                            minDate: new Date(startDate),
                            maxDate: new Date(endDate)
                        }).val(endDate);

                        $(".datepicker").prop("disabled", false); // Enable date pickers
                    }
                });
                $(".datatables").DataTable({});
            });
        </script>
        <style>
            .profile-card {
                /* max-width: 800px; */
                background: #fff;
                /* border-radius: 10px; */
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
                overflow: hidden;
                /* padding: 20px;
                                                                                margin: 50px auto; */
                display: flex;
                align-items: center;
            }

            .profile-img {
                width: 150px;
                height: 150px;
                border-radius: 50%;
                border: 4px solid #007bff;
                object-fit: cover;
            }

            .profile-info {
                flex: 1;
                margin-left: 20px;
            }

            .profile-info h3 {
                font-size: 24px;
                color: #333;
                margin-bottom: 10px;
            }

            .profile-info p {
                color: #666;
                font-size: 14px;
                margin-bottom: 5px;
            }

            .profile-info .row {
                margin-bottom: 10px;
            }

            .form-label {
                font-weight: bold;
                color: #444;
            }

            .form-control-static {
                background: #f8f9fa;
                padding: 8px;
                border-radius: 5px;
                border: 1px solid #ddd;
            }
        </style>
    @endsection
