<?php $__env->startSection('title', 'Edit User'); ?>
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
                        <a href="#">Edit User</a>
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
                                    
                                    <form action="<?php echo e(route('users.update', $user->id)); ?>" method="POST" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="usertype">User Type</label>
                                                    <p class="form-control-static" readonly><?php echo e($user->user_type); ?></p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <input type="text" class="form-control" id="username" name="username"
                                                        value="<?php echo e(old('username', $user->username)); ?>"
                                                        placeholder="Enter Username" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">  
                                                    <label for="first_name">First Name (Applicant Name):</label>
                                                    <input type="text" class="form-control" id="firstname" name="firstname"
                                                        value="<?php echo e(old('firstname', $user->first_name)); ?>"
                                                        placeholder="Enter First Name" />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                <label for="last_name">Last Name (Surname):</label>
                                                    <input type="text" class="form-control" id="lastname" name="lastname"
                                                        value="<?php echo e(old('lastname', $user->last_name)); ?>"
                                                        placeholder="Enter Last Name" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="fullname">Full Name</label>
                                                    <input type="text" class="form-control" id="father_full_name"
                                                        name="father_full_name"
                                                        value="<?php echo e(old('father_full_name', $user->father_full_name)); ?>"
                                                        placeholder="Enter father_full_name" />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control" id="address" name="address"
                                                        value="<?php echo e(old('address', $user->address)); ?>"
                                                        placeholder="Enter Address" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="city">City</label>
                                                    <input type="text" class="form-control" id="city" name="city"
                                                        value="<?php echo e(old('city', $user->city)); ?>" placeholder="Enter City" />

                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="pincode">Pincode</label>
                                                    <input type="text" class="form-control" id="pincode" name="pincode"
                                                        value="<?php echo e(old('pincode', $user->pincode)); ?>"
                                                        placeholder="Enter Pincode" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="adharcard">Aadhar Card</label>
                                                    <input type="text" class="form-control" id="aadhar_card"
                                                        name="aadhar_card"
                                                        value="<?php echo e(old('aadhar_card', $user->aadhar_card)); ?>"
                                                        placeholder="Enter Aadhar Card" />
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="pancard">PAN Card</label>
                                                    <input type="text" class="form-control" id="pan_card" name="pan_card"
                                                        value="<?php echo e(old('pan_card', $user->pan_card)); ?>"
                                                        placeholder="Enter Pan Card" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="dob">Date of Birth</label>
                                                    <input class="form-control datepicker" id="dob" name="dob"
                                                        value="<?php echo e(old('dob', $user->dob)); ?>" />
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="mobile">Mobile</label>
                                                    <input type="text" class="form-control" id="mobile" name="mobile"
                                                        value="<?php echo e(old('mobile', $user->mobile)); ?>"
                                                        placeholder="Enter Mobile Number" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="anniversary_date">Anniversary Date</label>
                                                    <input class="form-control datepicker" id="anniversary_date"
                                                        name="anniversary_date"
                                                        value="<?php echo e(old('anniversary_date', $user->anniversary_date)); ?>" />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="profile_image">Profile Image</label>
                                                    <input type="file" class="form-control" id="profile_image"
                                                        name="profile_image" />
                                                    <?php if($user->profile_image): ?>
                                                        <img src="<?php echo e(asset($user->profile_image)); ?>"
                                                            alt="Profile Image" class="img-thumbnail mt-2" width="150" />
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="text" class="form-control" id="email" name="email"
                                                        value="<?php echo e(old('email', $user->email)); ?>"
                                                        placeholder="Enter Email" />

                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="text" class="form-control" id="password" name="password"
                                                        placeholder="Enter Password" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="company-name">Business Name</label>
                                                    <input type="text" class="form-control" id="business_name"
                                                        name="business_name"
                                                        value="<?php echo e(old('business_name', $user->business_name)); ?>"
                                                        placeholder="Enter Company Name" />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Gender</label><br />
                                                    <div class="d-flex">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                value="Male" id="gender_male" <?php echo e(old('gender', $user->gender) == 1 ?
        'checked' : ''); ?> />
                                                            <label class="form-check-label" for="gender_male">Male</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                value="Female" id="gender_female" <?php echo e(old('gender', $user->gender) == 0
        ? 'checked' : ''); ?> />
                                                            <label class="form-check-label"
                                                                for="gender_female">Female</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <button type="submit" class="btn btn-primary mt-3">Update
                                                    User</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/ca-app/resources/views/admin/users/edit.blade.php ENDPATH**/ ?>