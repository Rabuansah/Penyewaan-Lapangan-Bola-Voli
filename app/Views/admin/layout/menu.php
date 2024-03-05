<div class="left_sidebar">
    <nav class="sidebar">
        <div class="user-info">
            <div class="image"><a href="javascript:void(0);"><img src="<?= base_url(); ?>/uploads/admin/<?= userLogin()->gambar; ?>" alt="User"></a></div>
            <div class="detail mt-3">
                <h5 class="mb-0"><?= userLogin()->username; ?></h5>
                <small>Admin</small>
            </div>
            <!-- Sosial Meida -->
            <!-- <div class="social">
                <a href="javascript:void(0);" title="facebook"><i class="ti-twitter-alt"></i></a>
                <a href="javascript:void(0);" title="twitter"><i class="ti-linkedin"></i></a>
                <a href="javascript:void(0);" title="instagram"><i class="ti-facebook"></i></a>
            </div> -->
        </div>
        <ul id="main-menu" class="metismenu">
            <li class="g_heading">Main</li>
            <li class="<?php if (current_url() == site_url('admin')) echo 'active'; ?>"><a href="<?= site_url('admin'); ?>"><i class="ti-home"></i><span>Dashboard</span></a></li>

            <li class="g_heading">Master Data</li>
            <li class="<?php if (current_url() == site_url('mdadmin')) echo 'active'; ?>"><a href="<?= site_url('mdadmin'); ?>"><i class="ti-id-badge"></i><span>Admin</span></a></li>
            <li class="<?php if (current_url() == site_url('mdusers')) echo 'active'; ?>"><a href="<?= site_url('mdusers'); ?>"><i class="ti-user"></i><span>User</span></a></li>
            <li class="<?php if (current_url() == site_url('mdlapangan')) echo 'active'; ?>"><a href="<?= site_url('mdlapangan'); ?>"><i class="ti-layout-column3-alt"></i><span>Lapangan</span></a></li>
            <li class="<?php if (current_url() == site_url('mdjadwal')) echo 'active'; ?>"><a href="<?= site_url('mdjadwal'); ?>"><i class="ti-menu-alt"></i><span>Jadwal</span></a></li>

            <li class="g_heading">Extra</li>
            <li class="<?php if (current_url() == site_url('laporan')) echo 'active'; ?>"><a href="<?= site_url('laporan'); ?>"><i class="ti-pencil-alt"></i><span>Laporan</span></a></li>

            <li class="g_heading">Pengaturan</li>
            <li><a href="<?= site_url('auth/logout'); ?>"><i class="ti-power-off"></i><span>Keluar</span></a></li>
        </ul>
    </nav>