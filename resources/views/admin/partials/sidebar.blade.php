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
    <li class="nav-item {{ ($page === "Dashboard Admin") ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item {{ ($page === "Edit Roles/Jadikan Pegawai") ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('roles') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Edit Roles/Jadikan Pegawai</span></a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item  {{ ($page == "Daftar User") ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('daftarmember') }}">
            <i class="fas fa-users"></i>
            <span>Daftar Member</span>
        </a>
    </li>

    <li class="nav-item  {{ ($page == "Daftar Pegawai") ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('daftarpegawai') }}">
            <i class="fa fa-address-card" aria-hidden="true"></i>
            <span>Daftar Pegawai</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-laptop"></i>
            <span>Cuti Pegawai</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pemohonan Cuti</h6>
                <a class="collapse-item" href="{{ route('cuti.index') }}">Daftar Permohonan Cuti</a>
                <a class="collapse-item" href="{{ route('cutiditerima') }}">Permohonan Cuti Diterima</a>
                <a class="collapse-item" href="{{ route('cutiditolak') }}">Permohonan Cuti Ditolak</a>
            </div>
        </div>
    </li>

    <li class="nav-item  {{ ($page == "Peminjaman") ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('peminjaman') }}">
            <i class="fa fa-briefcase" aria-hidden="true"></i>
            <span>Peminjaman Berjalan</span>
        </a>
    </li>

    <li class="nav-item  {{ ($page == "Denda Peminjaman") ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dendapinjam') }}">
            <i class="fa fa-briefcase" aria-hidden="true"></i>
            <span>Denda Peminjaman</span>
        </a>
    </li>

    <li class="nav-item  {{ ($page == "Laporan Peminjaman") ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('laporanpinjam') }}">
            <i class="fa fa-briefcase" aria-hidden="true"></i>
            <span>Laporan Peminjaman</span>
        </a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
