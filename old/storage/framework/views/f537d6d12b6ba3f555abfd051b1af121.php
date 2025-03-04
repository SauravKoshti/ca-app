<?php $__env->startSection('title', 'Create User'); ?>
<?php $__env->startSection('content'); ?>
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
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="profile-card">

                                    <?php if(!empty($user->profile_image)): ?>
                                        <img src="<?php echo e(asset($user->profile_image)); ?>" alt="Profile Image" class="profile-img">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('profiles/dummy.png')); ?>" alt="Profile Image" class="profile-img">
                                    <?php endif; ?>

                                    <div class="profile-info">
                                        <h3><?php echo e($user->first_name); ?> <?php echo e($user->lastname); ?></h3>
                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label">Username</label>
                                                <p> <?php echo e($user->user_type ?? 'N/A'); ?></p>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Username</label>
                                                <p><?php echo e($user->username ?? 'N/A'); ?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <p><?php echo e($user->father_full_name ?? 'N/A'); ?></p>
                                            <div class="col">
                                                <label class="form-label">Full Name</label>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Address</label>
                                                <p><?php echo e($user->address ?? 'N/A'); ?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label">City</label>
                                                <p><?php echo e($user->city ?? 'N/A'); ?></p>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Pincode</label>
                                                <p><?php echo e($user->pincode ?? 'N/A'); ?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label">Aadhar Card</label>
                                                <p><?php echo e($user->aadhar_card ?? 'N/A'); ?></p>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">PAN Card</label>
                                                <p><?php echo e($user->pan_card ?? 'N/A'); ?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label">Date of Birth</label>
                                                <p><?php echo e(\Carbon\Carbon::parse($user->dob)->format('d-m-Y') ?? 'N/A'); ?></p>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Mobile</label>
                                                <p><?php echo e($user->mobile ?? 'N/A'); ?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label">Anniversary Date</label>
                                                <p><?php echo e(\Carbon\Carbon::parse($user->anniversary_date)->format('d-m-Y') ?? 'N/A'); ?>

                                                </p>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Email</label>
                                                <p><?php echo e($user->email ?? 'N/A'); ?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label">Business Name</label>
                                                <p><?php echo e($user->business_name ?? 'N/A'); ?></p>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Gender</label>
                                                <p>
                                                    <?php echo e($user->gender == 0 ? 'Female' : ($user->gender == 1 ? 'Male' : 'N/A')); ?>

                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="user-profile-card">
                                    <div class="card-body">
                                        <form action="<?php echo e(route('users.upload.document', $user->id)); ?>" method="POST"
                                            id="fileUploadForm" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                                            <input type="hidden" name="created_by" value="<?php echo e($loggedInUserId); ?>">
                                            <div class="col-3">
                                                <label>Select Financial Year</label>
                                                <select class="form-control" id="financial_year">
                                                    <option value="" selected disabled>Select Financial Year</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label>Document Name:</label>
                                                <input type="text" name="document_name" class="form-control">
                                                <?php $__errorArgs = ['document_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                            </div>
                                            <div class="mb-3">
                                                <select id="documentSelect select2-multiple-input-sm" select2-multiple" name="documentData[]"  multiple>

                                                    <option value="">Select Document</option>
                                                    <optgroup label="Income Tax Return (ITR)">
                                                        <option value="pan_card">PAN Card</option>
                                                        <option value="aadhar_card">Aadhar Card</option>
                                                        <option value="form_16">Form 16 (For Salaried Individuals)</option>
                                                        <option value="salary_slips">Salary Slips (Last 3 Months)</option>
                                                        <option value="bank_statements">Bank Statements (Last 6 Months)
                                                        </option>
                                                        <option value="investment_proofs">Investment Proofs (LIC, PPF, ELSS,
                                                            etc.)</option>
                                                        <option value="rental_income_docs">Rental Income Documents</option>
                                                        <option value="loan_interest_certificates">Home Loan Interest
                                                            Certificate</option>
                                                        <option value="capital_gains_statements">Capital Gains Statements
                                                            (If Any)</option>
                                                        <option value="other_income_proofs">Other Income Proofs (FD
                                                            Interest, etc.)</option>
                                                    </optgroup>

                                                    <optgroup label="Goods and Services Tax (GST)">
                                                        <option value="gst_certificate">GST Registration Certificate
                                                        </option>
                                                        <option value="gstin">GSTIN (GST Identification Number)</option>
                                                        <option value="sales_purchase_bills">Sales & Purchase Bills</option>
                                                        <option value="input_tax_credit_docs">Input Tax Credit Documents
                                                        </option>
                                                        <option value="gst_return_filings">Previous GST Return Filings
                                                        </option>
                                                        <option value="bank_statements_gst">Bank Statements (For GST
                                                            Transactions)</option>
                                                        <option value="stock_register">Stock Register</option>
                                                        <option value="expense_bills">Expense Bills</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label>Document Type:</label>
                                                <?php if(
                                                    auth()->user()->user_type == 'personal' || auth()->user()->user_type ==
                                                    'gst'
                                                ): ?>
                                                                                                <select name="doc_type" class="form-control">
                                                                                                    <option value="aadhaar_card">Aadhaar Card / આધાર કાર્ડ</option>
                                                                                                    <option value="pan_card">PAN Card / પાન કાર્ડ</option>
                                                                                                    <option value="form_16">Form 16 / ફોર્મ 16</option>
                                                                                                    <!-- <option value="election_card">Election Card / ચૂંટણી કાર્ડ </option> -->
                                                                                                    <option value="rc_book">RC Book / આરસી બુક</option>
                                                                                                    <option value="bank_statement">Bank Statement / Passbook / બેંક
                                                                                                        સ્ટેટમેન્ટ /પાસબુક</option>
                                                                                                    <option value="fd_statement">Fixed Deposit statment & Certicate / બાંધી
                                                                                                        મુદતની થાપણ / પ્રમાણપત્ર</option>
                                                                                                    <option value="loan_statement">Loan Statement & interest certificate /
                                                                                                        લોન સ્ટેટમેન્ટ / લોન પત્ર</option>
                                                                                                    <option value="driving_license">Driving License / ડ્રાઈવિંગ લાયસન્સ
                                                                                                    </option>
                                                                                                    <option value="residential_proof">Residential Proof / રહેઠાણ પુરાવો
                                                                                                    </option>
                                                                                                    <option value="property_tax_receipt">Property Tax Receipt / મિલ્કત કર
                                                                                                        રસીદ</option>
                                                                                                    <option value="electricity_bill">Latest Electricity or Telephone Bill /
                                                                                                        તાજેતરની વીજળી અથવા ટેલિફોન બીલ</option>
                                                                                                    <option value="business_proof">Business Proof / Registration Certificate
                                                                                                        / વ્યવસાય પુરાવો / નોંધણી પ્રમાણપત્ર</option>
                                                                                                    <option value="etc">ETC (Toll, FASTag, Other) / ETC (ટોલ, ફાસ્ટેગ, અન્ય)
                                                                                                    </option>
                                                                                                    <option value="purchase_bill">Purchase Bill / ખરીદી બિલ</option>
                                                                                                    <option value="sales_bill">Sales Bill / વેચાણ બિલ</option>
                                                                                                    <option value="expense_bill">Expense Bill / ખર્ચ બિલ</option>
                                                                                                </select>
                                                <?php elseif(auth()->user()->user_type == 'admin'): ?>
                                                    <select name="doc_type" class="form-control">
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
                                                    </select>
                                                <?php endif; ?>

                                                <?php $__errorArgs = ['doc_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label>Upload File:</label>
                                                <input type="file" if name="document_image_path" class="form-control"
                                                    accept="image/*,.pdf">
                                                <?php $__errorArgs = ['document_image_path'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <button type="submit" class="btn btn-success">Upload</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="list-tab">
                                <div class="document-card">
                                    <div class="card-header d-flex justify-content-between">

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
                                                    <th>Uploaded By</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if($documentDataArray->isEmpty()): ?>
                                                    <tr>
                                                        <td colspan="4" class="text-center">No documet records found.</td>
                                                    </tr>
                                                <?php else: ?>
                                                    <?php $__currentLoopData = $documentDataArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $documentData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <!-- <td><?php echo e($documentData); ?></td> -->
                                                            <td>
                                                                <input type="checkbox" name="document_id"
                                                                    data-id="<?php echo e($documentData->id); ?>">
                                                            </td>
                                                            <td><?php echo e($documentData->document_name); ?></td>
                                                            <td><?php echo e($documentData->doc_type); ?></td>
                                                            <td>
                                                                <img src="<?php echo e(asset($documentData->document_image_path)); ?>"
                                                                    alt="Document Image" height="100" width="100">

                                                            </td>
                                                            <td>
                                                                <p> <?php echo e($documentData->uploaded_by); ?></p>
                                                                <p> <?php echo e($user->id); ?></p>
                                                                <p> <?php echo e(\Carbon\Carbon::parse($user->created_at)->format('d-m-Y H:i:s') ?? 'N/A'); ?>

                                                                </p>
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo e(asset($documentData->document_image_path)); ?>" download
                                                                    class="btn btn-success">
                                                                    <i class="fas fa-download"></i>
                                                                </a>

                                                                <form action="<?php echo e(route('users.document.destroy')); ?>"
                                                                    id="documentUpload" method="POST" style="display:inline;">
                                                                    <?php echo csrf_field(); ?>
                                                                    <input type="hidden" name="id" value="<?php echo e($documentData->id); ?>">
                                                                    <input type="hidden" name="user_id"
                                                                        value="<?php echo e($documentData->user_id); ?>">
                                                                    <button type="submit"
                                                                        class="btn btn-danger btn-sm">Delete</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="download-document" role="tabpanel"
                                aria-labelledby="download-document-tab">
                                <div class="download-document-card">
                                    <div class="card-header d-flex justify-content-between">

                                        <div>
                                            <label for="yearSelect">Select Year:</label>
                                            <select id="downloadYearSelect" name="year">
                                                <option value="">Select Year</option>
                                                <?php
                                                    $currentYear = date('Y');
                                                    for ($i = $currentYear; $i >= $currentYear - 10; $i--) {
                                                        echo "<option value='$i'>$i</option>";
                                                    }
                                                ?>
                                            </select>

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
                                                    <th>Uploaded By</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if($documentDataArray->isEmpty()): ?>
                                                    <tr>
                                                        <td colspan="4" class="text-center">No documet records found.</td>
                                                    </tr>
                                                <?php else: ?>
                                                    <?php $__currentLoopData = $documentDataArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $documentData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <!-- <td><?php echo e($documentData); ?></td> -->
                                                            <td>
                                                                <input type="checkbox" name="document_id"
                                                                    data-id="<?php echo e($documentData->id); ?>">
                                                            </td>
                                                            <td><?php echo e($documentData->document_name); ?></td>
                                                            <td><?php echo e($documentData->doc_type); ?></td>
                                                            <td>
                                                                <img src="<?php echo e(asset($documentData->document_image_path)); ?>"
                                                                    alt="Document Image" height="100" width="100">

                                                            </td>
                                                            <td>
                                                                <p> <?php echo e($documentData->uploaded_by); ?></p>
                                                                <p> <?php echo e($user->id); ?></p>
                                                                <p> <?php echo e(\Carbon\Carbon::parse($user->created_at)->format('d-m-Y H:i:s') ?? 'N/A'); ?>

                                                                </p>
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo e(asset($documentData->document_image_path)); ?>" download
                                                                    class="btn btn-success">
                                                                    <i class="fas fa-download"></i>
                                                                </a>

                                                                <form action="<?php echo e(route('users.document.destroy')); ?>"
                                                                    id="documentUpload" method="POST" style="display:inline;">
                                                                    <?php echo csrf_field(); ?>
                                                                    <input type="hidden" name="id" value="<?php echo e($documentData->id); ?>">
                                                                    <input type="hidden" name="user_id"
                                                                        value="<?php echo e($documentData->user_id); ?>">
                                                                    <button type="submit"
                                                                        class="btn btn-danger btn-sm">Delete</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                                <div class="document-card">
                                    <div class="card-body">
                                        <div class="Payment-card">
                                            <?php if(auth()->user()->user_type == 'admin'): ?>
                                                <div class="card-header d-flex justify-content-between">
                                                    <!-- <div class="card-title">Payment List</div> -->
                                                    <div class="btn-primary btn-round ms-auto">
                                                        <a href="<?php echo e(route('users.payment', ['user' => $user->id])); ?>"
                                                            class="btn btn-primary btn-round ms-auto">
                                                            <!-- <i class="fa fa-money"></i> -->
                                                            <!-- <i class="fa-solid fa-indian-rupee-sign"></i> -->
                                                            Add Payment
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
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
                                                        <?php if($payments->isEmpty()): ?>
                                                            <tr>
                                                                <td colspan="4" class="text-center">No payment records
                                                                    found.</td>
                                                            </tr>
                                                        <?php else: ?>
                                                            <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td><?php echo e($payment->discuss_fees); ?></td>
                                                                    <td><?php echo e($payment->paid_fees); ?></td>
                                                                    <td><?php echo e($payment->payment_date); ?></td>
                                                                    <?php if(auth()->user()->user_type == 'admin'): ?>
                                                                        <td>
                                                                            <a href="<?php echo e(route('users.payment.edit', $payment->id)); ?>"
                                                                                class="btn btn-link btn-primary btn-lg"
                                                                                data-bs-toggle="tooltip" title="Edit Task">
                                                                                <i class="fa fa-edit"></i>
                                                                            </a>
                                                                            <form action="<?php echo e(route('users.payment.destroy')); ?>"
                                                                                method="POST" style="display:inline;">
                                                                                <?php echo csrf_field(); ?>

                                                                                <button type="button"
                                                                                    onClick="removeData(<?php echo e($user->id); ?>, 'user')"
                                                                                    class="btn btn-link btn-danger remove_data"
                                                                                    data-bs-toggle="tooltip" title="Remove">
                                                                                    <i class="fa fa-times"></i>
                                                                                </button>
                                                                                <input type="hidden" name="id"
                                                                                    value="<?php echo e($payment->id); ?>">
                                                                                <input type="hidden" name="user_id"
                                                                                    value="<?php echo e($payment->user_id); ?>">
                                                                                <button type="submit" onClick="removeData
                                                                                                    class=" btn btn-danger
                                                                                    btn-sm">Delete</button>
                                                                            </form>
                                                                        </td>
                                                                    <?php endif; ?>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
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
                                                        <?php if($referData->isEmpty()): ?>
                                                            <tr>
                                                                <td colspan="4" class="text-center">No payment records
                                                                    found.</td>
                                                            </tr>
                                                        <?php else: ?>
                                                            <?php $__currentLoopData = $referData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $refer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td><?php echo e($refer->username); ?></td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
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
<?php $__env->stopSection(); ?>
    <?php $__env->startSection('section_script'); ?>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                let params = new URLSearchParams(window.location.search);
                let tab = params.get('tab');
                if (tab) {
                    let tabElement = document.querySelector(`[id="${tab}"]`);
                    if (tabElement) {
                        new bootstrap.Tab(tabElement).show();
                    }
                }
            });
            $(document).ready(function () {
                function loadImages() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "/fetch-images",
                        type: "POST",
                        data: {
                            someData: "value"
                        },
                        success: function (response) {
                            console.log(response);
                        },
                        error: function (xhr) {
                            console.log(xhr.responseText);
                        }
                    });

                }

                // Load images on page load
                loadImages();

                // Reload images when year filter is changed
                $('#year').on('change', loadImages);

                // Select/Deselect all checkboxes
                $('#select-all').on('change', function () {
                    $('.image-checkbox').prop('checked', $(this).prop('checked'));
                });
            });

            function downloadSelected(type) {
                const year = $('#downloadYearSelect').val();
                // console.log(year);
                let allIds = [];
                var checkboxes = document.querySelectorAll('[name="document_id"]:checked');
                checkboxes.forEach(function (checkbox) {
                    allIds.push(checkbox.getAttribute('data-id'));
                });
                $.ajax({
                    url: "<?php echo e(route('users.download.documents')); ?>",
                    type: 'POST',
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>',
                        type: type,
                        document_ids: allIds
                    },
                    xhrFields: {
                        responseType: 'blob'
                    },
                    success: function (response) {
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
                    error: function (xhr, status, error) {
                        console.error('Error:', error);
                        console.log('Response:', xhr.responseText);
                    }
                });
            }
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
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/ca-app/resources/views/admin/users/show.blade.php ENDPATH**/ ?>