<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route ('home') }}">
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

    {{-- <!-- Nav Item - Akun Saya -->
    <li class="nav-item {{ ($page === "Akun Saya") ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('layaruser.index') }}">
            <i class="fas fa-fw fa-id-card-alt"></i>
            <span>Akun Saya</span></a>
    </li> --}}

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ ($page === "Dashboard User") ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('user') }}">
            <i class="fas fa-fw fa-columns"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ ($page === "Record Peminjaman") ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('record') }}">
            <i class="fas fa-fw fa-columns"></i>
            <span>Record Peminjaman</span></a>
    </li>

    <!-- Divider -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
