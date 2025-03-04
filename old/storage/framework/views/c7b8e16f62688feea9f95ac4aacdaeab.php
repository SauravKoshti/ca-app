<?php $__env->startSection('title', 'Create Group'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Group</h3>
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
                    <a href="<?php echo e(route('groups.index')); ?>">Group</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Group Create</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Create Group</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form action="<?php echo e(route('groups.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="groupName">Group Name</label>
                                                <input type="text"
                                                    class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="groupName" name="name" placeholder="Enter Group Name"
                                                    value="<?php echo e(old('name')); ?>">
                                                <?php $__errorArgs = ['name'];
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
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="groupDescription">Group Description</label>
                                                <textarea class="form-control" id="groupDescription" name="description"
                                                    placeholder="Enter Last Name">
                                                        </textarea>

                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Create Group</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/ca-app/resources/views/admin/groups/create.blade.php ENDPATH**/ ?>