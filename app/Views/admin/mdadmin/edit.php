<?= $this->extend('admin/layout/default'); ?>

<?= $this->section('content'); ?>
<title>Edit Admin GCA | Master Data Admin</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="page">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-6">
                <div class="card">
                    <div class="header mx-3">
                        <h1>Edit Admin</h1>
                    </div>
                    <div class="body">
                        <?php $errors = session()->getFlashdata('errors') ?>
                        <form id="basic-form" method="post" novalidate action="<?= site_url('mdadmin/update/' . $users->id_users) ?>" autocomplete="off" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="form-group mx-3">
                                <label>Nama</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user-o"></i></span>
                                    </div>
                                    <input type="text" name="username" value="<?= $users->username; ?>" class="form-control">
                                </div>
                            </div>

                            <div class="form-group  mx-3">
                                <label>Email</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
                                    </div>
                                    <input type="email" name="email" value="<?= $users->email; ?>" class="form-control email">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <label for="password" class="form-label">Password</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                                </div>
                                                <input type="password" class="form-control" id="password" name="password" value="<?= $users->password; ?>">
                                            </div>
                                        </div>
                                        <div class="col ml-0">
                                            <label for="confirmPassword" class="form-label">Konfirmasi Password</label>
                                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group  mx-3">
                                <label>Nomor Hp/WA</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-mobile-phone"></i></span>
                                    </div>
                                    <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');" name="no_hp" class="form-control mobile-phone-number <?= isset($errors['no_hp']) ? 'is-invalid' : null ?>" value="<?= $users->no_hp; ?>" placeholder="Ex: 08**-****-****">
                                </div>
                            </div>

                            <label for="formFile" class="form-label mx-3">Gambar</label>
                            <div class="input-group mb-3">
                                <div class="custom-file mx-3">
                                    <input type="file" class="custom-file-input" id="inputGroupFile04" name="gambar" onchange="updateFileName()">
                                    <label class="custom-file-label" for="inputGroupFile04" id="fileLabel"><?= $users->gambar; ?></label>
                                </div>
                            </div>
                            <div class="form-group mx-3">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat" rows="5" cols="30"><?= $users->alamat; ?></textarea>
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