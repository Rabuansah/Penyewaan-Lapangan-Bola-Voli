<?= $this->extend('admin/layout/default'); ?>

<?= $this->section('content'); ?>
<title>Admin GCA | Edit Data Lapangan</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="page">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-6">
                <div class="card">
                    <div class="header mx-3">
                        <h1>Edit Data Lapangan</h1>
                    </div>
                    <div class="body">
                        <?php $errors = session()->getFlashdata('errors') ?>
                        <form id="basic-form" method="post" novalidate action="<?= site_url('mdlapangan/update/' . $lapangan->id_lapangan) ?>" autocomplete="off" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="form-group mx-3">
                                <label>Nama Lapangan</label>
                                <input type="text" name="nama_lapangan" value="<?= $lapangan->nama_lapangan; ?>" class="form-control" required>
                            </div>
                            <label for="formFile" class="form-label mx-3">Gambar</label>
                            <div class="input-group mb-3">
                                <div class="custom-file mx-3">
                                    <input type="file" class="custom-file-input" id="inputGroupFile04" name="gambar" value="<?= $lapangan->gambar; ?>" onchange="updateFileName()">
                                    <label class="custom-file-label" for="inputGroupFile04" id="fileLabel"><?= $lapangan->gambar; ?>"</label>
                                </div>
                            </div>
                            <div class="form-group mx-3">
                                <label>Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" rows="5" cols="30"><?= $lapangan->deskripsi; ?></textarea>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary"><span>Simpan</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function updateFileName() {
                var input = document.getElementById('inputGroupFile04');
                var label = document.getElementById('fileLabel');
                label.innerHTML = input.files[0].name;
            }
        </script>
        <?= $this->endSection(); ?>