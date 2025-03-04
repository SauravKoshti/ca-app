<?php $__env->startSection('title', 'Create Payment'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Payment</h3>
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
                    <a href="<?php echo e(route('users.index')); ?>">Payment</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="">Create Payment</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col">
                <!-- Tab Content -->
                <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
                <?php endif; ?>

                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Create Payment</div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <form action="<?php echo e(route('users.payment.store')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <div class="mb-3">
                                                <label>Paid Fees:</label>
                                                <select id="payament_mode" name="payament_mode" class="form-control">
                                                    <option value="Cash">Cash</option>
                                                    <option value="Online">Online</option>
                                                </select>
                                                <?php $__errorArgs = ['payament_mode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label>Discuss Fees:</label>
                                                <input type="text" step="0.01" name="discuss_fees"
                                                    class="form-control amount">
                                                <?php $__errorArgs = ['discuss_fees'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label>Paid Fees:</label>
                                                <input type="text" step="0.01" name="paid_fees" class="form-control amount">
                                            </div>

                                            <div class="mb-3">
                                                <label>Payment Date Fees:</label>
                                                <input name="payment_date" class="form-control datepicker">
                                                <?php $__errorArgs = ['payment_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <input type="hidden" name="user_id" class="form-control"
                                                value="<?php echo e($user); ?>">
                                            <button type="submit" class="btn btn-success">Save</button>
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
            $(".amount").on("input", function() {
                let value = $(this).val();

                // Remove invalid characters (only allow numbers and a single ".")
                value = value.replace(/[^0-9.]/g, "");

                // Allow only one decimal point
                let parts = value.split(".");
                if (parts.length > 2) {
                    value = parts[0] + "." + parts.slice(1).join(""); // Keep only first decimal
                }

                // Limit to two decimal places if decimal exists
                if (parts.length === 2 && parts[1].length > 2) {
                    value = parts[0] + "." + parts[1].substring(0, 2);
                }

                $(this).val(value);
            });

            $(".amount").on("blur", function() {
                let value = $(this).val();

                if (value !== "" && !value.includes(".")) {
                    $(this).val(value + ".00"); // Add .00 if decimal is missing
                } else if (value.includes(".")) {
                    let parts = value.split(".");
                    if (parts[1].length === 0) {
                        $(this).val(value + "00"); // If only "." exists, add "00"
                    } else if (parts[1].length === 1) {
                        $(this).val(value + "0"); // If only one decimal digit, add "0"
                    }
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/ca-app/resources/views/admin/users/createpayment.blade.php ENDPATH**/ ?>