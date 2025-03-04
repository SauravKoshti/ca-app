<?php $__env->startSection('title', 'Create User'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">User</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="<?php echo e(route('admin.index')); ?>">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('users.index')); ?>">User</a>
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
            
            <div class="col">
                <!-- Tab Content -->
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">User Create</div>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <form action="<?php echo e(route('users.store')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="userType">User Type</label><span class="text-danger ms-1">*</span>
                                                        <select id="userType" name="user_type" class="form-control"
                                                            required onchange="toggleGstNumberField()">
                                                            <option value="personal"
                                                                <?php echo e(old('user_type') == 'personal' ? 'selected' : ''); ?>>
                                                                Personal User</option>
                                                            <option value="gst"
                                                                <?php echo e(old('user_type') == 'gst' ? 'selected' : ''); ?>>
                                                                GST User</option>
                                                        </select>
                                                        <?php $__errorArgs = ['user_type'];
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
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="username">Username</label><span class="text-danger ms-1">*</span>
                                                        <input type="text" id="username" name="username"
                                                            class="form-control" value="<?php echo e(old(key: 'username')); ?>"
                                                            required>
                                                        <?php $__errorArgs = ['username'];
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
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="first_name">First Name (Applicant Name)</label>
                                                        <span class="text-danger ms-1">*</span>
                                                        <input type="text" id="firstName" name="first_name"
                                                            class="form-control" value="<?php echo e(old('first_name')); ?>"
                                                            required>
                                                        <?php $__errorArgs = ['first_name'];
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
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="middle_name">Middle Name (Father
                                                            Name/Husband)</label>
                                                            <span class="text-danger ms-1">*</span>
                                                        <input type="text" id="middleName" name="middle_name"
                                                            class="form-control" value="<?php echo e(old('middle_name')); ?>"
                                                            required>
                                                        <?php $__errorArgs = ['middle_name'];
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
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="last_name">Last Name (Surname)</label>
                                                        <span class="text-danger ms-1">*</span>
                                                        <input type="text" id="lastName" name="last_name"
                                                            class="form-control" value="<?php echo e(old('last_name')); ?>"
                                                            required>
                                                        <?php $__errorArgs = ['last_name'];
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
                                                </div>
                                                
                                                <div class="col-md-6">
                                                <!-- <div class="col"> -->
                                    <label>Same as above</label>
                                    <input type="checkbox" id="fullName">
                                <!-- </div> -->
                                                    <div class="form-group">
                                                        <label for="user_full_name">Full name <small>(as per
                                                                pancard)</small></label>
                                                                <span class="text-danger ms-1">*</span>
                                                        <input type="text" id="user_full_name" name="user_full_name"
                                                            class="form-control" value="<?php echo e(old('user_full_name')); ?>"
                                                            required>
                                                        <?php $__errorArgs = ['user_full_name'];
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
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="father_full_name">Father Full Name</label>
                                                        <span class="text-danger ms-1">*</span>
                                                        <input type="text" id="father_full_name" name="father_full_name"
                                                            class="form-control" value="<?php echo e(old('father_full_name')); ?>"
                                                            required>
                                                        <?php $__errorArgs = ['father_full_name'];
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
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="aadharCard">Aadhar Card</label>
                                                        <span class="text-danger ms-1">*</span>
                                                        <input type="text" id="aadharCard" name="aadhar_card"
                                                            class="form-control" value="<?php echo e(old('aadhar_card')); ?>"
                                                            placeholder="XXXX XXXX XXXX" maxlength="14" required>
                                                        <?php $__errorArgs = ['aadhar_card'];
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
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="panCard">PAN Card</label>
                                                        <span class="text-danger ms-1">*</span>
                                                        <input type="text" id="panCard" name="pan_card"
                                                            class="form-control" value="<?php echo e(old('pan_card')); ?>"
                                                            placeholder="ABCDE1234F"
                                                            pattern="[A-Za-z]{5}[0-9]{4}[A-Za-z]" maxlength="10"
                                                            required>
                                                        <?php $__errorArgs = ['pan_card'];
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
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="dob">Date of Birth</label>
                                                        <span class="text-danger ms-1">*</span>
                                                        <input id="dob" name="dob" class="form-control datepicker"
                                                            value="<?php echo e(old('dob')); ?>" required>
                                                        <?php $__errorArgs = ['dob'];
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
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="anniversary_date">Anniversary Date</label>
                                                        <input id="anniversary_date" name="anniversary_date"
                                                            class="form-control datepicker"
                                                            value="<?php echo e(old('anniversary_date')); ?>">
                                                        <?php $__errorArgs = ['anniversary_date'];
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
                                                </div>
                                                
                                                <div class="col-md-6 gstNumberField">
                                                    <div class="form-group">
                                                        <label for="business_name">Business Name</label>
                                                        <input type="text" id="business_name" name="business_name"
                                                            class="form-control" value="<?php echo e(old('business_name')); ?>">
                                                        <?php $__errorArgs = ['business_name'];
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
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <span class="text-danger ms-1">*</span>
                                                        <input type="password" id="password" name="password"
                                                            class="form-control" autocomplete="new-password"
                                                            value="<?php echo e(old('password')); ?>" required>
                                                        <?php $__errorArgs = ['password'];
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
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="address">Address</label>
                                                        <span class="text-danger ms-1">*</span>
                                                        <input type="text" id="address" name="address"
                                                            class="form-control" value="<?php echo e(old('address')); ?>" required>
                                                        <?php $__errorArgs = ['address'];
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
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="city">City</label>
                                                        <span class="text-danger ms-1">*</span>
                                                        <input type="text" id="city" name="city" class="form-control"
                                                            value="<?php echo e(old('city')); ?>" required>
                                                        <?php $__errorArgs = ['city'];
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
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="state">State</label>
                                                        <span class="text-danger ms-1">*</span>
                                                        <input type="text" id="state" name="state" class="form-control"
                                                            value="<?php echo e(old('state')); ?>" required>
                                                        <?php $__errorArgs = ['state'];
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
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="pincode">Pincode</label>
                                                        <span class="text-danger ms-1">*</span>
                                                        <input type="text" id="pincode" name="pincode"
                                                            class="form-control" value="<?php echo e(old('pincode')); ?>" required>
                                                        <?php $__errorArgs = ['pincode'];
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
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="mobile">Mobile <small>(linked with
                                                                aadhar)</small></label>
                                                                <span class="text-danger ms-1">*</span>
                                                        <input type="text" id="mobile" name="mobile"
                                                            class="form-control" value="<?php echo e(old('mobile')); ?>" required>
                                                        <?php $__errorArgs = ['mobile'];
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
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <span class="text-danger ms-1">*</span>
                                                        <input type="email" id="email" name="email" class="form-control"
                                                            value="<?php echo e(old('email')); ?>" required>
                                                        <?php $__errorArgs = ['email'];
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
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="gender">Gender</label>
                                                        <span class="text-danger ms-1">*</span>
                                                        <select id="gender" name="gender" class="form-control">
                                                            <option value="1"
                                                                <?php echo e(old('gender') == '1' ? 'selected' : ''); ?>>Male
                                                            </option>
                                                            <option value="0"
                                                                <?php echo e(old('gender') == '0' ? 'selected' : ''); ?>>Female
                                                            </option>
                                                        </select>
                                                        <?php $__errorArgs = ['gender'];
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
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="profile-image">Profile Image</label>
                                                        <input type="file" id="profile-image" name="profile_image"
                                                            class="form-control" accept="image/*">
                                                        <?php $__errorArgs = ['profile_image'];
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
                                                </div>

                                                <div class="col-md-6 gstNumberField">
                                                    <div class="form-group">
                                                        <label for="gstNumber">GST Number</label>
                                                        <input type="text" id="gstNumber" name="gst_number"
                                                            class="form-control" value="<?php echo e(old('gst_number')); ?>">
                                                        <?php $__errorArgs = ['gst_number'];
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
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="refer">Refer User Name</label>
                                                        <input type="text" id="refer" name="refer" class="form-control"
                                                            value="<?php echo e(old('refer')); ?>">
                                                        <?php $__errorArgs = ['refer'];
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('section_script'); ?>
<script>
$(document).ready(function() {
    $('.gstNumberField').hide();
    $('#userType').on('change', function() {
        $('.gstNumberField').hide();
        if ($(this).val() === 'gst') {
            $('.gstNumberField').show();
        }
    });
    // aadhar card number format XXXX XXXX XXXX
    $("#aadharCard").on("input", function() {
        let value = $(this).val().replace(/\D/g, ""); // Remove non-digits
        if (value.length > 12) value = value.substring(0, 12); // Limit to 12 digits

        // Format as XXXX XXXX XXXX
        let formattedValue = value.replace(/(\d{4})/g, "$1 ").trim();

        $(this).val(formattedValue);
    });

    // contact number format XXXX XXXX XXXX
    $("#mobile").on("input", function() {
        let value = $(this).val().replace(/\D/g, ""); // Remove non-digits
        if (value.length > 11) value = value.substring(0, 10); // Limit to 12 digits

        // Format as XXXX XXXX XXXX
        let formattedValue = value.replace(/(\d{4})/g, "$1").trim();

        $(this).val(formattedValue);
    });

    $("#pincode").on("input", function() {
        let value = $(this).val().replace(/\D/g, ""); // Remove non-digits
        if (value.length > 7) value = value.substring(0, 6); // Limit to 6 digits

        // Format as XXXXXX
        let formattedValue = value.replace(/(\d{4})/g, "$1").trim();

        $(this).val(formattedValue);
    });

    // pancard number format XXXXXXXXXX
    $("#panCard").on("keydown", function(event) {
        event.preventDefault(); // Prevent default input

        let value = $(this).val();
        let currentLength = value.length;

        // Allow Backspace
        if (event.key === "Backspace") {
            $(this).val(value.slice(0, -1));
            return;
        }

        // Allow only specific characters based on position
        let isAlpha = (currentLength < 5 || currentLength === 9);
        let isNumeric = (currentLength >= 5 && currentLength < 9);

        if (isAlpha && /^[a-zA-Z]$/.test(event.key)) {
            $(this).val(value + event.key.toUpperCase());
        } else if (isNumeric && /^[0-9]$/.test(event.key)) {
            $(this).val(value + event.key);
        }
    });

    $("#fullName").change(function() {
        if ($(this).is(":checked")) {
            let firstName = $("#firstName").val().trim();
            let middleName = $("#middleName").val().trim();
            let lastName = $("#lastName").val().trim();

            let fullName = [firstName, middleName, lastName].filter(name => name !== "").join(" ");

            $("#user_full_name").val(fullName).prop("disabled", true);
        } else {
            $("#user_full_name").val("").prop("disabled", false);;
        }
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/ca-app/resources/views/admin/users/create.blade.php ENDPATH**/ ?>