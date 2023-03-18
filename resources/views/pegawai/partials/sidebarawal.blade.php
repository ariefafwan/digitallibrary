<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon">
            <img src="/img/logo.png" style="width: 60%;margin-left:5px"/>
        </div>
        <div class="sidebar-brand-text mx-3" style="color:#ff9a01;font-size:12pt">POS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0 mb-3">

    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ ($page === "Dashboard Pegawai") ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('pegawai') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
