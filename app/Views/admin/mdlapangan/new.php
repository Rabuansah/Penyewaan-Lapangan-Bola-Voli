<?= $this->extend('admin/layout/default'); ?>

<?= $this->section('content'); ?>
<title>Admin GCA | Lapangan Baru</title>

<div class="page">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-6">
                <div class="card">
                    <div class="header mx-3">
                        <h1>Lapangan Baru</h1>
                    </div>
                    <div class="body">
                        <form id="basic-form" method="post" novalidate action="<?= site_url('mdlapangan/create') ?>" autocomplete="off" enctype="multipart/form-data">
                            <?php $errors = session()->getFlashdata('errors') ?>
                            <?= csrf_field() ?>

                            <div class="form-group mx-3">
                                <label for="nama_lapangan">Nama Lapangan</label>
                                <input type="text" name="nama_lapangan" class="form-control <?= isset($errors['nama_lapangan']) ? 'is-invalid' : '' ?>" id="nama_lapangan" aria-label="nama_lapangan" value="<?= old('nama_lapangan'); ?>">
                                <div class="invalid-feedback">
                                    <?= isset($errors['nama_lapangan']) ? $errors['nama_lapangan'] : '' ?>
                                </div>
                            </div>

                            <div class="form-group mx-3">
                                <label for="gambar" class="form-label">Gambar</label>
                                <input type="file" class="form-control-file <?= isset($errors['gambar']) ? 'is-invalid' : '' ?>" id="gambar" name="gambar" onchange="updateFileName()" aria-describedby="gambarHelp">
                                <div class="invalid-feedback">
                                    <?= isset($errors['gambar']) ? $errors['gambar'] : '' ?>
                                </div>
                                <small id="gambarHelp" class="form-text text-muted">Pilih file gambar untuk diunggah.</small>
                            </div>

                            <div class="form-group mx-3">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="5" cols="30"></textarea>
                            </div>

                            <br>
                            <button type="submit" class="btn btn-primary"><span>Simpan</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateFileName() {
        var input = document.getElementById('gambar');
        var label = input.nextElementSibling;
        var fileName = input.files[0].name;
        label.innerHTML = fileName;
    }
</script>
<?= $this->endSection(); ?>