<?php $__env->startSection('title', 'Create Group'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <!-- <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Forms</h3>
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
                    <a href="#">Forms</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Basic Form</a>
                </li>
            </ul>
        </div> -->
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Group Details</div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs nav-line nav-color-secondary" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">Group</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile" aria-selected="false">Users</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="list-tab" data-bs-toggle="tab" data-bs-target="#list"
                                type="button" role="tab" aria-controls="list" aria-selected="false">Users
                                List</button>
                        </li>
                    </ul>
                </div>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- <div class="card"> -->
                        <!-- <div class="card-header">
                            <div class="card-title">Group</div>
                        </div> -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <p class="form-control-static"><?php echo e($groupData->name); ?></p>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <p class="form-control-static"><?php echo e($groupData->description ?? 'N/A'); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- </div> -->
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="user-profile-card">
                            <!-- <div class="card-header">
                                <div class="card-title">Upload Documents</div>
                            </div> -->
                            <form method="post" action="<?php echo e(route('groups.store.users')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="card-body">
                                    <div class="mb-3">

                                        <div class="container">
                                            <div class='col-sm-6'>
                                                <label>Add User in group:</label>
                                                <select id="select2-multiple-input-sm" name="usersGroup[]"
                                                    class="form-control input-sm select2-multiple" multiple>
                                                    <?php $__currentLoopData = $userData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->username); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" name="group_id" value="<?php echo e($groupData->id); ?>">
                                    </div>
                                    <button type="submit" class="btn btn-success">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="list-tab">
                        <div class="user-card">
                            <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('success')); ?>

                            </div>
                            <?php endif; ?>

                            <div class="card-body"> 
                            <table id="basic-datatables" class=" display table table-striped table-hover">
                                <!-- <table class="table table-bordered"> -->
                                    <thead>
                                        <tr>
                                            <th>User Name</th>
                                            <?php if(auth()->user()->user_type == 'admin'): ?>
                                            <th>Actions</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($userListData->isEmpty()): ?>
                                        <tr>
                                            <td colspan="4" class="text-center">No User records found.</td>
                                        </tr>
                                        <?php else: ?>
                                        <?php $__currentLoopData = $userListData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($user->username); ?></td>
                                            <?php if(auth()->user()->user_type == 'admin'): ?>
                                            <td>
                                                <form action="<?php echo e(route('user.remove.from.group')); ?>" method="POST"
                                                    style="display:inline;">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="user_id" value=<?php echo e($user->id); ?>>
                                                    <input type="hidden" name="group_id" value=<?php echo e($user->group_id); ?>>
                                                    <button type="submit" class="btn btn-link btn-danger"
                                                        data-bs-toggle="tooltip" title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </button>
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
                </div> <!-- End of User List Tab -->
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<script>
$(".select2-multiple").select2({
    theme: "bootstrap",
    placeholder: "Select a User",
    containerCssClass: ':all:'
});
</script>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/ca-app/resources/views/admin/groups/show.blade.php ENDPATH**/ ?>