<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>
<div class="container row d-flex justify-content-center align-items-center min-vh-100">
    <div class="login-box shadow p-4 bg-white rounded">
        <h2 class="text-center mb-4">Login</h2>
        <?php if(session()->has('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session()->get('success')); ?>

    </div>
<?php endif; ?>
        <?php if(session('error')): ?>
            <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
        <?php endif; ?>
        <form method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group mb-3">
                <label for="username"><i class="fa fa-user"></i> Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Enter Username" required>
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
                <div class="col align-self-end">
                    <a href="<?php echo e(route('forgot.username')); ?>" class="text-primary">Forgot Username?</a>
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="password"><i class="fa fa-lock"></i> Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" required>
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

            <div class="d-flex justify-content-between">
                
                <div>
                    <a href="<?php echo e(route('forgot.password.form')); ?>" class="text-primary">Forgot Password?</a>
                </div>
            </div>

            <div class="form-group text-center mt-4">
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </div>

            <div class="text-center mt-3">
                <p>Don't have an account? <a href="<?php echo e(route('register')); ?>" class="text-primary">Register here</a></p>
            </div>
        </form>
    </div>
</div>

<style>
    .login-box {
        margin:10px;
        width: 400px;
        padding: 30px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .form-control {
        border-radius: 5px;
        padding: 10px;
    }
    .btn-primary {
        background-color: #007bff;
        border: none;
        padding: 10px;
        border-radius: 5px;
        font-size: 16px;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('users.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/ca-app/resources/views/users/auth/login.blade.php ENDPATH**/ ?>