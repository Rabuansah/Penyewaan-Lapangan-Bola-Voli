<?= $this->extend('admin/layout/default'); ?>

<?= $this->section('content'); ?>
<title>Admin GCA | Laporan</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="page">
    <!-- alert Succes -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Success !</b>
                <?= session()->getFlashdata('success') ?>
            </div>
        </div>
    <?php endif; ?>
    <!-- alert error -->
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Error !</b>
                <?= session()->getFlashdata('error') ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header mb-3">
                        <h1>Laporan Penyewaan</h1>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-md-6">
                                <b>Dari Tanggal</b>
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <b>Sampai Tanggal</b>
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control date">
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Lapangan</th>
                                        <th>Kategori</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>Tarif</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($penyewaan as $key => $value) { ?>
                                        <tr>
                                            <td><?= $key + 1; ?></td>
                                            <td><?= $value->username; ?></td>
                                            <td><?= $value->nama_lapangan; ?></td>
                                            <td><?= $value->kategori; ?></td>
                                            <td><?= $value->tanggal_penyewaan; ?></td>
                                            <td><?= substr($value->start_hour, 0, 5); ?> - <?= substr($value->end_hour, 0, 5); ?></td>
                                            <td>Rp <?= number_format($value->tarif, 0, ',', '.'); ?></td>
                                            <td class="text-primary">Lunas</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>