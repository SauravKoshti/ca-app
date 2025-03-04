<?php $__env->startSection('title','Groups'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Dashboard</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Groups</a>
                </li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Groups</h4>
                        <a
                            href="<?php echo e(route('groups.create')); ?>"
                            class="btn btn-primary btn-round ms-auto">
                            <i class="fa fa-plus"></i>
                            Add Groups
                        </a>
                    </div>
                </div>
                <div class="col-md-12">
                    <!-- <div class="card"> -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                id="basic-datatables"
                                class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <?php if($groups->isEmpty()): ?>
                                    <tr>
                                        <td colspan="4" class="text-center">No documet records found.</td>
                                    </tr>
                                    <?php else: ?>
                                    
                                    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($user->name); ?> </td>
                                        <td><?php echo e($user->description); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('groups.show', $user->id)); ?>" class="btn btn-link btn-primary btn-lg" data-bs-toggle="tooltip" title="Show Group">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <div class="form-button-action">
                                                <a href="<?php echo e(route('groups.edit', $user->id)); ?>" class="btn btn-link btn-primary btn-lg" data-bs-toggle="tooltip" title="Edit Group">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <?php if(auth()->user()->user_type == 'admin'): ?>
                                                    <button onClick="removeData(<?php echo e($user->id); ?>, 'group')" class="btn btn-link btn-danger remove_data" data-bs-toggle="tooltip" title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/ca-app/resources/views/admin/groups/index.blade.php ENDPATH**/ ?>