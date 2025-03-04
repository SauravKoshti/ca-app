<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="<?php echo e(route('home')); ?>" class="logo">
                <img src="<?php echo e(asset('assets/img/kaiadmin/logo_light.svg')); ?>" alt="navbar brand" class="navbar-brand"
                    height="20" />

                <!-- <img src="<?php echo e(asset('assets/img/admin-backend.jpeg')); ?>" alt="navbar brand" class="navbar-brand img-fluid rounded"
                    height="20" /> -->
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item <?php echo e(request()->routeIs('admin.index') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('admin.index')); ?>">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item <?php echo e(request()->routeIs('users.*') ? 'active submenu' : ''); ?>">
                    <a data-bs-toggle="collapse" href="#userManagement"
                        aria-expanded="<?php echo e(request()->routeIs('users.*') ? 'true' : 'false'); ?>">
                        <i class="fas fa-user"></i>
                        <p>Users Management</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse <?php echo e(request()->routeIs('users.*') ? 'show' : ''); ?>" id="userManagement">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?php echo e(route('users.index')); ?>">
                                    <span class="sub-item">Users</span>
                                </a>
                            </li>
                            <?php if(auth()->user()->user_type == 'admin'): ?>
                            <li>
                                <a href="<?php echo e(route('users.create')); ?>">
                                    <span class="sub-item">Create User</span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </li>
                <li class="nav-item <?php echo e(request()->routeIs('groups.*') ? 'active submenu' : ''); ?>">
                    <a data-bs-toggle="collapse" href="#groupManagement"
                        aria-expanded="<?php echo e(request()->routeIs('groups.*') ? 'true' : 'false'); ?>">
                        <i class="fas fa-users"></i>
                        <p>Group Management</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse <?php echo e(request()->routeIs('groups.*') ? 'show' : ''); ?>" id="groupManagement">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?php echo e(route('groups.index')); ?>">
                                    <span class="sub-item">Group</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('groups.create')); ?>">
                                    <span class="sub-item">Create Group</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php if(auth()->user()->user_type == 'admin'): ?>
                <li class="nav-item <?php echo e(request()->routeIs('contacts.index') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('contacts.index')); ?>">
                        <i class="fas fa-users"></i>
                        <p>Contact Us</p>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar --><?php /**PATH /var/www/html/ca-app/resources/views/admin/layout/sidebar.blade.php ENDPATH**/ ?>