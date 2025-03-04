<?php $__env->startSection('title', 'Edit Group'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Group</h3>
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
                    <a href="#">Group</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Group</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Group</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Form for Editing Group -->
                            <form action="<?php echo e(route('groups.update', $group->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="name">Group Name</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Enter Group Name"
                                                    value="<?php echo e(old('name', $group->name)); ?>">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="description">Group Description</label>
                                                <textarea class="form-control" id="description" name="description"
                                                    placeholder="Enter Description">
                                                        <?php echo e(old('description', $group->description)); ?>

                                                    </textarea>
                                            </div>
                                        </div>
                                        </div>
                                        <!-- <select> -->
                                        <div class="col-6">
                                            <label for="name">Add User in group:</label>
                                            <select id="select2-multiple-input-sm" name="groupUsers[]" 
                                                    class="form-control input-sm select2-multiple" multiple>
                                                    <?php $__currentLoopData = $userData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->username); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <!-- <select name="groupUsers[]" class="form-control" multiple>
                                                <?php $__currentLoopData = $userData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="aadhar_card"><?php echo e($user->username); ?>

                                                </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select> -->
                                        </div>
                                    <!-- </div> -->
                                    <button type="submit" class="btn btn-primary mt-3">Update Group</button>
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
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/ca-app/resources/views/admin/groups/edit.blade.php ENDPATH**/ ?>