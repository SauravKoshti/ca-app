<?php $__env->startSection('title', 'Forgot Username'); ?>

<?php $__env->startSection('content'); ?>
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="shadow p-4 bg-white rounded">
        <h2 class="text-center mb-4">Forgot Username</h2>

        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <?php if(session('error')): ?>
            <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('forgot.username')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group mb-3">
                <label for="email">Enter your registered email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="form-group text-center mt-3">
                <button type="submit" class="btn btn-primary w-100">Retrieve Username</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('users.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/ca-app/resources/views/users/auth/forgot-username.blade.php ENDPATH**/ ?>