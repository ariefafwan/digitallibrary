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

    <li class="nav-item  {{ ($page == "Tambah Permohonan Izin Cuti") ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('izin.create') }}">
            <i class="fa fa-briefcase" aria-hidden="true"></i>
            <span>Tambah Permohonan Izin</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#izin"
            aria-expanded="true" aria-controls="izin">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Permohonan Izin Anda</span>
        </a>
        <div id="izin" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('izin.index') }}">Dikirim</a>
                <a class="collapse-item" href="{{ route('izinditerima') }}">Diterima</a>
                <a class="collapse-item" href="{{ route ('izinditolak') }}">Ditolak</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Manajemen Buku</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('kategori.index') }}">Kategori Buku</a>
                <a class="collapse-item" href="{{ route('book.index') }}">Buku</a>
                <a class="collapse-item" href="{{ route ('pengarang.index') }}">Pengarang</a>
                <a class="collapse-item" href="{{ route ('penerbit.index') }}">Penerbit</a>
            </div>
        </div>
    </li>

    <li class="nav-item  {{ ($page == "Peminjaman Berjalan") ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('pinjam.index') }}">
            <i class="fa fa-briefcase" aria-hidden="true"></i>
            <span>Peminjaman Berjalan</span>
        </a>
    </li>
    
    <li class="nav-item  {{ ($page == "Peminjaman Selesai") ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('selesai') }}">
            <i class="fa fa-check-circle" aria-hidden="true"></i>
            <span>Peminjaman Selesai</span>
        </a>
    </li>

    <li class="nav-item  {{ ($page == "Peminjaman Didenda") ? 'active' : '' }}">
        <a class="nav-link" href="{{ 'denda' }}">
            <i class="fa fa-window-close" aria-hidden="true"></i>
            <span>Peminjaman Didenda</span>
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
