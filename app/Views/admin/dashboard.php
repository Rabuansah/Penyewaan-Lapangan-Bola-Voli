<?= $this->extend('admin/layout/default'); ?>

<?= $this->section('content'); ?>
<title>Admin GCA | Dashboard</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="page">

    <div class="container-fluid">
        <div class="header mb-3">
            <h2>Dashboard</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card" style="background-color: #0c3c53;">
                    <div class="body" style="display: flex; justify-content: space-between; align-items: center; padding: 15px; color: white;">
                        <div style="text-align: left; color:white;">
                            <h6 style="color:white;">Laporan Pemasukkan</h6>
                            <h2 style="color:white;">Rp <small class="info"><?= number_format($totalAmount, 2); ?></small></h2>
                            <a href="<?= site_url('laporan'); ?>">Lihat detail ->></a>
                        </div>
                        <div style="text-align: right;">
                            <div class="ti-money" style="font-size: 48px; "></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card" style="background-color: #37517e;">
                    <div class="body" style="display: flex; justify-content: space-between; align-items: center; padding: 15px; ">
                        <div style="text-align: left;">
                            <h6 style="color:white;">Jumlah Admin</h6>
                            <h2 style="color:white;"><?= $totalAdmin; ?></h2>
                            <a href="<?= site_url('mdadmin'); ?>">Lihat detail ->></a>
                        </div>
                        <div style="text-align: right;">
                            <div class="ti-id-badge" style="font-size: 48px; color: white;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card" style="background-color: #47b2e4;">
                    <div class="body" style="display: flex; justify-content: space-between; align-items: center; padding: 15px; color: white;">
                        <div style="text-align: left;">
                            <h6 style="color:white;">Jumlah User</h6>
                            <h2 style="color:white;"><?= $totalUser; ?></h2>
                            <a href="<?= site_url('mdusers'); ?>">Lihat detail ->></a>
                        </div>
                        <div style="text-align: right;">
                            <div class="ti-user" style="font-size: 48px; color: white;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div><?= $this->endSection(); ?>