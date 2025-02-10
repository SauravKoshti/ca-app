<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
                <img src="{{ asset('assets/img/kaiadmin/logo_light.svg')}}" alt="navbar brand" class="navbar-brand"
                    height="20" />

                <!-- <img src="{{ asset('assets/img/admin-backend.jpeg')}}" alt="navbar brand" class="navbar-brand img-fluid rounded"
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
                <li class="nav-item active">
                    <a data-bs-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                        <span class="caret"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#userManagement">
                        <i class="fas fa-user"></i>
                        <p>Users Management</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="userManagement">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('users.index')}}">
                                    <span class="sub-item">Users</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('users.create')}}">
                                    <span class="sub-item">Create User</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#groupManagement">
                        <i class="fas fa-users"></i>
                        <p>Group Management</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="groupManagement">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('groups.index')}}">
                                    <span class="sub-item">Group</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('groups.create')}}">
                                    <span class="sub-item">Create Group</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#contact" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Contact Us</p>
                        <span class="caret"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->