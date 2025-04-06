@extends('admin.layout.master')
@section('title', 'User Details')
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
                    <span>Show User</span>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <input type="hidden" name="user_type" id="user_type" value="{{ auth()->user()->user_type }}">
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
                                    @if (auth()->user()->user_type == 'admin')
                                    Upload Document
                                    @else
                                    Download Document
                                    @endif

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
                            <div class="container mt-5">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="profile-card">
                                            <!-- Left Side: Profile Image -->
                                            <div class="text-center me-4">
                                                @if (!empty($user->profile_image))
                                                <img src="{{ asset($user->profile_image) }}" alt="Profile Image"
                                                    class="profile-img">
                                                @else
                                                <img src="{{ asset('profiles/dummy.png') }}" alt="Profile Image"
                                                    class="profile-img">
                                                @endif
                                                <h5 class="mt-3">{{ $user->first_name }} {{ $user->middle_name }}
                                                    {{ $user->last_name }}
                                                </h5>
                                                <p class="text-muted">
                                                    {{ $user->user_type == 'personal' ? 'Personal' : ($user->user_type == 'gst' ? 'GST' : 'N/A') }}
                                                    User
                                                </p>
                                            </div>

                                            <!-- Right Side: User Information -->
                                            <div class="flex-grow-1">
                                                <div class="profile-info">
                                                    <div><span class="info-label">Username:</span>
                                                        {{ $user->username ?? 'N/A' }}
                                                    </div>
                                                    <div><span class="info-label">Email:</span>
                                                        {{ $user->email ?? 'N/A' }}
                                                    </div>
                                                    <div><span class="info-label">Mobile:</span>
                                                        {{ $user->mobile ?? 'N/A' }}
                                                    </div>
                                                    <div><span class="info-label">Gender:</span>
                                                        {{ $user->gender == 0 ? 'Female' : ($user->gender == 1 ? 'Male' : 'N/A') }}
                                                    </div>
                                                    <div><span class="info-label">State:</span>
                                                        {{ $user->state ?? 'N/A' }}
                                                    </div>
                                                    <div><span class="info-label">Address:</span>
                                                        {{ $user->address ?? 'N/A' }}
                                                    </div>
                                                    <div><span class="info-label">City:</span>
                                                        {{ $user->city ?? 'N/A' }}
                                                    </div>
                                                    <div><span class="info-label">Pincode:</span>
                                                        {{ $user->pincode ?? 'N/A' }}
                                                    </div>
                                                    <div><span class="info-label">Full Name:</span>
                                                        {{ $user->user_full_name ?? 'N/A' }}
                                                    </div>
                                                    <div><span class="info-label">Aadhar Card:</span>
                                                        {{ $user->aadhar_card ?? 'N/A' }}
                                                    </div>
                                                    <div><span class="info-label">PAN Card:</span>
                                                        {{ $user->pan_card ?? 'N/A' }}
                                                    </div>
                                                    <div><span class="info-label">Father's Name:</span>
                                                        {{ $user->father_full_name ?? 'N/A' }}
                                                    </div>
                                                    <div><span class="info-label">DOB:</span>
                                                        {{ !empty($user->dob) ? \Carbon\Carbon::parse($user->dob)->format('d-m-Y') : 'N/A' }}
                                                    </div>
                                                    <div><span class="info-label">Anniversary Date:</span>
                                                        {{ !empty($user->anniversary_date) ? \Carbon\Carbon::parse($user->anniversary_date)->format('d-m-Y') : 'N/A' }}
                                                    </div>
                                                    <div><span class="info-label">Business Name:</span>
                                                        {{ $user->company_name ?? 'N/A' }}
                                                    </div>
                                                    <div><span class="info-label">Reference By:</span>
                                                        {{ $user->refer ?? 'N/A' }}
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
                                <div class="card-body">
                                    <div class="progress mt-3" style="display: none;">
                                        <div id="progressBar" class="progress-bar" role="progressbar"
                                            style="width: 0%;" aria-valuenow="0" aria-valuemin="0"
                                            aria-valuemax="100">0%</div>
                                    </div>
                                    <form id="fileUploadForm" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" id="user_id" name="user_id"
                                            value="{{ $user->id }}">
                                        <input type="hidden" name="created_by" value="{{ $loggedInUserId }}">
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Select Type</label>
                                                <select class="form-control" name="upload_type"
                                                    onclick="changeType(this.value)" value="Online">
                                                    <option value="Online">Online</option>
                                                    <option value="Manual">Manual</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label>Select Financial Year</label>
                                                <select class="form-control" name="financial_year"
                                                    id="financial_year" required>
                                                    <option value="" selected disabled>Select Financial Year
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label>Date From</label>
                                                <input name="date_from" id="date_from"
                                                    class="form-control datepicker">
                                            </div>
                                            <div class="col-6">
                                                <label>Date To</label>
                                                <input name="date_to" id="date_to" class="form-control datepicker">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label>Document Name:</label>
                                            <input type="text" id="document_name" name="document_name"
                                                class="form-control">
                                            @error('document_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                        <div class="mb-3">
                                            <label>Document Type:</label>
                                            <select name="doc_type" id="doc_type"
                                                class="form-control select2-multiple">

                                                @if (auth()->user()->user_type == 'admin')
                                                <option>Select document type</option>
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
                                                @else
                                                <option>Select document type</option>
                                                <option value="aadhaar_card">Aadhaar Card / આધાર કાર્ડ</option>
                                                <option value="pan_card">Pan Card / પાન કાર્ડ</option>
                                                <option value="form_16">Form 16 / ફોર્મ 16</option>
                                                <option value="rc_book">Vehicle R.C Book / વાહન ની આર.સી. બુક
                                                </option>
                                                <option value="bank_statement">Bank Statement / Passbook / બેંક
                                                    સ્ટેટમેન્ટ /પાસબુક</option>
                                                <option value="fd_statement">Fixed Deposit Receipt & Certificate /
                                                    ફિક્સ્ડ ડિપોઝિટ રસીદ અને સ્ટેટમેન્ટ</option>
                                                <option value="loan_statement">Loan Statement & Interest
                                                    Certificate /
                                                    લોન સ્ટેટમેન્ટ અને વ્યાજ નું સર્ટી</option>
                                                <option value="post_investment">Post Office Investment / પોસ્ટ માં
                                                    રોકાણ
                                                </option>
                                                <option value="insurance_investment">Insurance Investment / વીમા
                                                    માં
                                                    રોકાણ
                                                </option>
                                                <option value="property_documents">Property Documents / મિલકત
                                                    દસ્તાવેજો
                                                </option>
                                                <option value="capital_account">Capital Account From Partnership
                                                    Firm /
                                                    ભાગીદારી પેઢીમાંથી ભાગીદાર નું મૂડી ખાતું</option>
                                                <option value="agriculture_invoice">Agriculture Invoice /
                                                    ખેતીવાડીના બિલ
                                                </option>
                                                <option value="sharemarket_detail">Share Market Statement (Ledger,
                                                    Profit & Loss, Holding) / શેર બજાર સ્ટેટમેન્ટ (લેજર, નફો અને
                                                    નુકસાન,
                                                    હોલ્ડિંગ)
                                                </option>
                                                <option value="purchase_bill">Purchase Invoice / ખરીદી ના બિલ
                                                </option>
                                                <option value="sales_bill">Sales Invoice / વેચાણ ના બિલ</option>
                                                <option value="expense_bill">Expense Invoice / ખર્ચ ના બિલ</option>
                                                <option value="other_details">Other Details / અન્ય વિગતો </option>
                                                @endif
                                            </select>

                                            @error('doc_type')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label>Upload File:</label>
                                            <input type="file" name="document_image_path" id="fileInput"
                                                class="form-control" accept="image/*,.pdf">
                                            @error('document_image_path')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-success">Upload</button>
                                    </form>
                                    <div id="message" class="mt-3"></div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="list-tab">
                            <div class="document-card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="d-flex align-items-center" style="width: 220px;">
                                        <label for="yearSelect" class="w-100">Select Year:</label>
                                        <select id="documentDownloadYearSelect" class="form-control"
                                            onchange="handleYearChange(this.value,'')" name="year">
                                            <option value="">Select Year</option>
                                        </select>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary ms-auto"
                                            onclick="documentDownloadSelected('pdf')">Download
                                            Pdf</button>
                                        <button class="btn btn-primary ms-auto"
                                            onclick="documentDownloadSelected('zip')">Download
                                            Zip</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <table class="table table-bordered table-striped table-hover w-100"
                                        id="documentTable">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" name="document_select_all"></th>
                                                <th>Document Name</th>
                                                <th>Document Type</th>
                                                <th>Upload Type</th>
                                                <th>Uploaded By</th>
                                                <th>Uploaded Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
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
                                            onchange="handleYearChange(this.value,'admin')" name="year">
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
                                        <table class="display table table-striped table-hover w-100"
                                            id="downloadDocTable">
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox" name="select_all"></th>
                                                    <th>Document Name</th>
                                                    <th>Document Type</th>
                                                    <th>Upload Type</th>
                                                    <th>Uploaded By</th>
                                                    <th>Uploaded Date</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
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
                                            <div class="btn-primary btn-round ms-auto">
                                                <a href="{{ route('users.payment', ['user' => $user->id]) }}"
                                                    class="btn btn-primary btn-round ms-auto">
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
                                                            @if (auth()->user()->user_type == 'admin')
                                                            <th>Actions</th>
                                                            @endif
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($payments->isEmpty())
                                                        <tr>
                                                            @if (auth()->user()->user_type == 'admin')
                                                            <td colspan="4" class="text-center">No payment
                                                                records
                                                                found.</td>
                                                            @else
                                                            <td colspan="3" class="text-center">No payment
                                                                records
                                                                found.</td>
                                                            @endif

                                                        </tr>
                                                        @else
                                                        @foreach ($payments as $payment)
                                                        <tr>
                                                            <td>{{ $payment->discuss_fees }}</td>
                                                            <td>{{ $payment->paid_fees }}</td>
                                                            <td>{{ $payment->payment_date }}</td>
                                                            @if (auth()->user()->user_type == 'admin')
                                                            <td>
                                                                <button type="button"
                                                                    onClick="editData('{{ route('users.payment.edit', $payment->id) }}')"
                                                                    class="btn btn-link btn-primary btn-lg edit_data"
                                                                    data-bs-toggle="tooltip"
                                                                    title="edit">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>

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
                                                            <td colspan="4" class="text-center">No
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
        <input type="hidden" id="selectedYear" />
        @endsection
        @section('section_script')
        <script>
            $(document).ready(function() {
                let currentYear = getCurrentFinancialYear();
                // var userType = document.getElementById('user_type').value;
                $('#downloadDocTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('users.documents') }}",
                        type: "POST",
                        data: function(d) {
                            d.year = $('#selectedYear').val();
                            d.user_id = "{{ $user->id }}";
                            d.user_type = "admin";
                            d._token = "{{ csrf_token() }}";
                        }
                    },
                    columns: [{
                            data: 'checkbox',
                            name: 'checkbox',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'document_name',
                            name: 'document_name',
                            orderable: false,
                        },
                        {
                            data: 'doc_type',
                            name: 'doc_type',
                            orderable: false,
                        },
                        {
                            data: 'upload_type',
                            name: 'upload_type',
                            orderable: false,
                        },
                        {
                            data: 'uploader_name',
                            name: 'uploader_name',
                            orderable: false,
                        },
                        {
                            data: 'created_at',
                            name: 'created_at',
                            orderable: false,
                        },
                        {
                            data: 'actions',
                            name: 'actions',
                            orderable: false,
                            searchable: false
                        }
                    ]
                });
                $('#documentTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('users.documents') }}",
                        type: "POST",
                        data: function(d) {
                            d.year = $('#documentDownloadYearSelect').val();
                            d.user_id = "{{ $user->id }}";
                            // d.user_type = ;
                            d._token = "{{ csrf_token() }}";
                        }
                    },
                    columns: [{
                            data: 'checkbox',
                            name: 'checkbox',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'document_name',
                            name: 'document_name',
                            orderable: false,
                        },
                        {
                            data: 'doc_type',
                            name: 'doc_type',
                            orderable: false,
                        },
                        {
                            data: 'upload_type',
                            name: 'upload_type',
                            orderable: false,
                        },
                        {
                            data: 'uploader_name',
                            name: 'uploader_name',
                            orderable: false,
                        },
                        {
                            data: 'created_at',
                            name: 'created_at',
                            orderable: false,
                        },
                        {
                            data: 'actions',
                            name: 'actions',
                            orderable: false,
                            searchable: false
                        }
                    ]
                });
                $('#download-document-tab').click(() => {
                    $('#downloadDocTable').DataTable().ajax.reload();
                })
                $('#list-tab').click(() => {
                    $('#documentTable').DataTable().ajax.reload();
                })

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

                    $('#fileUploadForm input, #fileUploadForm select, #uploadBtn').prop('disabled', true);
                    $.ajax({
                        url: "{{ route('users.upload.document') }}",
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
                            $('#progressBar').css('width', '100%').html('100% Complete ✅');
                        },
                        error: function(xhr) {
                            $('#message').html(
                                '<div class="alert alert-danger">Error uploading file.</div>');
                            $('#progressBar').css('width', '0%').text('0%');
                        },
                        complete: function() {
                            $('#fileUploadForm input, #fileUploadForm select, #uploadBtn').prop(
                                'disabled', false);
                        }
                    });
                });
            });

            // Function to get the current financial year
            function getCurrentFinancialYear() {
                let today = new Date();
                let year = today.getFullYear();
                let month = today.getMonth() + 1;

                // Assuming financial year starts in April and ends in March
                if (month < 4) {
                    return (year - 1) + "-" + year;
                } else {
                    return year + "-" + (year + 1);
                }
            }

            // Function to handle financial year change
            function handleYearChange(year, userType) {
                $('#selectedYear').val(year);
                if (userType === 'admin') {
                    $('#downloadDocTable').DataTable().ajax.reload();
                } else {
                    $('#documentTable').DataTable().ajax.reload();
                }
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

            $('[name="select_all"]').on('change', function() {
                $('[name="document_id"]').prop('checked', this.checked);
            });

            $('[name="document_select_all"]').on('change', function() {
                $('[name="document_select_id"]').prop('checked', this.checked);
            });

            function changeType(uploadType) {
                if (uploadType === 'Manual') {
                    $('#doc_type').prop('multiple', true).attr('name', 'doc_type[]').select2();
                } else {
                    $('#doc_type').prop('multiple', false).attr('name', 'doc_type').select2();
                }
            }

            function documentDownloadSelected(type) {
                const year = $('#documentDownloadYearSelect').val();
                // console.log(year);
                let allIds = [];
                var checkboxes = $('[name="document_select_id"]:checked');
                checkboxes.each(function() {
                    allIds.push($(this).val());
                });

                $.ajax({
                    url: "{{ route('users.download.documents') }}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        type: type,
                        document_ids: allIds,
                        select_all: $('[name="document_select_all"]').val(),
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

            function downloadSelected(type) {
                const year = $('#downloadYearSelect').val();
                // console.log(year);
                let allIds = [];
                var checkboxes = document.querySelectorAll('[name="document_id"]:checked');
                checkboxes.forEach(function(checkbox) {
                    allIds.push(checkbox.getAttribute('value'));
                });
                $.ajax({
                    url: "{{ route('users.download.documents') }}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        type: type,
                        document_ids: allIds,
                        select_all: $('[name="select_all"]:checked').val(),
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
                $('#doc_type').change(function() {
                    var selectedValue = $(this).val();
                    $('#document_name').val(selectedValue);
                });
                // $(".datepicker").prop("disabled", true);

                // Function to set date range based on selected financial year
                $("#financial_year").change(function() {
                    var financialYear = $(this).val();
                    var years = financialYear.split("-"); // Split into [startYear, endYear]

                    var startDate = new Date(years[0], 3,
                        1);
                    var endDate = new Date(years[1], 2, 31);

                    if (startDate && endDate) {
                        $("#date_from").datepicker("destroy").datepicker({
                            dateFormat: "dd/mm/yyyy",
                            minDate: startDate,
                            maxDate: endDate
                        }).val($.datepicker.formatDate("dd/mm/yyyy", startDate));

                        $("#date_to").datepicker("destroy").datepicker({
                            dateFormat: "dd/mm/yyyy",
                            minDate: startDate,
                            maxDate: endDate
                        }).val($.datepicker.formatDate("dd/mm/yyyy", endDate));

                        $(".datepicker").prop("disabled", false); // Enable date pickers
                    }
                });

                $(".datatables").DataTable({});
            });
        </script>

        <style>
            .profile-card {
                border-radius: 10px;
                background: white;
                padding: 20px;
                display: flex;
                align-items: center;
            }

            .profile-img {
                width: 180px;
                height: 180px;
                border-radius: 10px;
                border: 4px solid #007bff;
                object-fit: cover;
            }

            .profile-info {
                display: flex;
                flex-wrap: wrap;
                padding-left: 20px;
            }

            .profile-info div {
                width: 50%;
                padding: 5px 0;
            }

            .info-label {
                font-weight: bold;
                color: #333;
            }

            .form-control-static {
                background: #f8f9fa;
                padding: 8px;
                border-radius: 5px;
                border: 1px solid #ddd;
            }
        </style>
        @endsection