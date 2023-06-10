<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Ke Beranda</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= ($title == 'Admin | Kegiatan') ? 'active' : ''; ?>">
        <a class="nav-link pb-1" href="<?= base_url('admin'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dasbor</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider mt-3">
    
    <!-- Heading -->
    <div class="sidebar-heading">Kegiatan</div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?= ($title == 'Semua | Kegiatan') ? 'active' : ''; ?>">
        <a class="nav-link pb-1" href="<?= base_url('admin/kegiatan'); ?>">
            <i class="fas fa-fw fa-thumbtack" style="transform: rotate(45deg);"></i>
            <span>Semua Kegiatan</span>
            <a class="collapse-item pt-1" href="<?= base_url('admin/kegiatan'); ?>">Kegiatan</a>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3 mt-3 d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>