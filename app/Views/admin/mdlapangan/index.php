<?= $this->extend('admin/layout/default'); ?>

<?= $this->section('content'); ?>
<title>Admin GCA | Master Data Lapangan</title>
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
                        <h1>Master Data Lapangan</h1>
                        <div class="section-header-button">
                            <a href="<?= site_url('mdlapangan/new') ?>" class="btn btn-primary"><i class="ti-plus"></i><span>Lapangan Baru</span></a>
                        </div>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Lapangan</th>
                                        <th>Gambar</th>
                                        <th>Deskripsi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($lapangan as $key => $value) { ?>
                                        <tr>
                                            <td><?= $key + 1; ?></td>
                                            <td><?= $value->nama_lapangan; ?></td>
                                            <td><img src="<?= base_url('uploads/' . $value->gambar) ?>" style="max-width: 100px;" alt=""></td>
                                            <td>
                                                <div class="mobile-description">
                                                    <?= $value->deskripsi; ?>
                                                </div>
                                            </td>
                                            <td class="text-center" style="width: 15%;">
                                                <a href="<?= site_url('mdlapangan/edit/' . $value->id_lapangan) ?>" class="btn btn-warning btn-sm"><i class="ti-pencil"></i></a>
                                                <form action="<?= site_url('mdlapangan/delete/' . $value->id_lapangan); ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data lapangan?')">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button class="btn btn-danger btn-sm"><i class="fas ti-trash"></i></button>
                                                </form>
                                            </td>
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