<?= $this->extend('user/layout/default'); ?>

<?= $this->section('content'); ?>
<title>User GCA | Lapangan</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row gy-5 justify-content-center mt-5 pt-5">
        <div class="col-lg-12">
            <div class="text-center">
                <h3 class="heading">Lapangan</h3>
                <p class="text-muted">Gor Chandra Alkadrie</p>
            </div>
        </div><!-- End col -->
        <div class="justify-content-center row row-cols-1 row-cols-md-3 g-2 mb-4">
            <?php foreach ($lapangan as $value) : ?>
                <div class="col-md-4 mx-3">
                    <div class="card">
                        <img src="<?= base_url('uploads/' . $value->gambar) ?>" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?= $value->nama_lapangan; ?></h5>
                            <p class="card-text">Deskripsi: <?= $value->deskripsi; ?></p>
                        </div>
                    </div>
                    <div class="row justify-content-center my-3">
                        <div class="col">
                            <a href="<?= site_url('booking/' . $value->id_lapangan) ?>" class="d-flex justify-content-center">
                                <button type="button" class="btn btn-primary">Sewa Lapangan</button>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

</div><?= $this->endSection(); ?>