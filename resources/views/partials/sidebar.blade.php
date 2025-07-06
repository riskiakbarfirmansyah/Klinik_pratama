<ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #00CED1;" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <i class="fas fa-hospital text-white"></i>
        </div>
        <div class="sidebar-brand-text mx-3 text-white font-bold">KALISARI HEALTHCARE</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @if(auth()->check() && auth()->user()->is_dokter == 1)
        <!-- Only for Dokter -->
        <li class="nav-item active">
            <a class="nav-link" href="/diagnosa">
                <i class="fas fa-fw fa-stethoscope text-white"></i>
                <span class="text-white font-bold">Diagnosa / Resep</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/laporan-harian">
                <i class="fas fa-fw fa-folder-open text-white"></i>
                <span class="text-white font-bold">Laporan Harian</span>
            </a>
        </li>
    @else
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="/dashboard">
                <i class="fas fa-fw fa-cog text-white"></i>
                <span class="text-white font-bold">Dashboard</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading text-white font-bold">Umum</div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-pen text-white"></i>
                <span class="text-white font-bold">Pendaftaran</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Daftar Harian</h6>
                    <a class="collapse-item fas fa-pen text-black font-bold" href="/pendaftaran"> Pendaftaran Pasien</a>
                    <a class="collapse-item fas fa-users text-black font-bold" href="/antrian-pasien-admin"> Antrian Pasien</a>
                    <a class="collapse-item fas fa-home text-black font-bold" href="/antrian-homecare"> Antrian Homecare</a>
                    <a class="collapse-item fas fa-stethoscope text-black font-bold" href="/diagnosa"> diagnosa/resep</a>
                    <a class="collapse-item fas fa-folder-open text-black font-bold" href="/laporan-harian"> Laporan Harian</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="/pasien">
                <i class="fas fa-fw fa-book text-white"></i>
                <span class="text-white font-bold">Pasien</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading text-white font-bold">Data</div>

        <!-- Nav Item - Dokter -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fa fa-user-md text-white"></i>
                <span class="text-white font-bold">Dokter</span>
            </a>
            <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Dokter</h6>
                    <a class="collapse-item fa fa-user-md text-black font-bold" href="/dokter"> Dokter</a>
                    <a class="collapse-item fa fa-clock text-black font-bold" href="/jadwal"> Jadwal Praktek</a>
                    <a class="collapse-item fa fa-heartbeat text-black font-bold" href="/poli-form"> Poli/Spesialis</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/pegawai">
                <i class="fa fa-id-card text-white"></i>
                <span class="text-white font-bold">Pegawai</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fa fa-flask text-white"></i>
                <span class="text-white font-bold">Farmasi</span>
            </a>
            <div id="collapsePages3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Obat-obatan</h6>
                    <a class="collapse-item fa fa-archive text-black font-bold" href="/obat-total-stok"> Stok Obat</a>
                    <a class="collapse-item fa fa-flask text-black font-bold" href="/obat-jenis"> Jenis Obat</a>
                </div>
            </div>
        </li>

        @if(auth()->user()->is_superadmin === 1)
            <li class="nav-item">
                <a class="nav-link" href="/akun">
                    <i class="fas fa-fw fa-user text-white"></i>
                    <span class="text-white font-bold">Akun</span>
                </a>
            </li>
        @endif
    @endif

    <li class="nav-item">
        <div class="sidebar-card d-none d-lg-flex">
            <img class="sidebar-card-illustration mb-2" src="img/logo_bulet_kalisari.png" alt="...">
            <p class="text-center mb-2 text-white font-bold">Klinik Kalisari Healthcare</p>
            <a class="btn btn-success btn-sm" href="/">Ke Beranda</a>
        </div>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </li>

    <div class="text-white font-bold sidebar-heading">
        Powered by © KLINIK KALISARI HEALTHCARE <br>2025
    </div>
</ul>
