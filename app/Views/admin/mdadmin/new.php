<?= $this->extend('admin/layout/default'); ?>

<?= $this->section('content'); ?>
<title>New Admin GCA | Master Data Admin</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="page">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-6">
                <div class="card">
                    <div class="header mx-3">
                        <h1>New Admin</h1>
                    </div>
                    <div class="body">
                        <?php $errors = session()->getFlashdata('errors') ?>
                        <form id="basic-form" method="post" novalidate action="<?= site_url('Mdusers/Create') ?>" autocomplete="off" enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <div class="form-group mx-3">
                                <label>Nama</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user-o"></i></span>
                                    </div>
                                    <input type="text" name="username" class="form-control <?= isset($errors['username']) ? 'is-invalid' : null ?>" placeholder="Ex: Rabuansah" value="<?= old('username'); ?>">
                                    <div class="invalid-feedback">
                                        <?= isset($errors['username']) ? $errors['username'] : null ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group  mx-3">
                                <label>Email</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
                                    </div>
                                    <input type="text" name="email" class="form-control email <?= isset($errors['email']) ? 'is-invalid' : null ?>" placeholder="Ex: example@example.com" value="<?= old('email'); ?>">
                                    <div class="invalid-feedback">
                                        <?= isset($errors['email']) ? $errors['email'] : null ?>
                                    </div>
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
                                                <input type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : null ?>" value="<?= old('password'); ?>" id="password" placeholder="Min 6 karakter" name="password">
                                                <div class="invalid-feedback">
                                                    <?= isset($errors['password']) ? $errors['password'] : null ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col ml-0">
                                            <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                                            <input type="password" class="form-control <?= isset($errors['confirm_password']) ? 'is-invalid' : null ?>" value="<?= old('confirm_password'); ?>" id="confirm_password" name="confirm_password">
                                            <div class="invalid-feedback">
                                                <?= isset($errors['confirm_password']) ? $errors['confirm_password'] : null ?>
                                            </div>
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
                                    <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');" name="no_hp" class="form-control mobile-phone-number <?= isset($errors['no_hp']) ? 'is-invalid' : null ?>" value="<?= old('no_hp'); ?>" placeholder="Ex: 08**-****-****">
                                    <div class="invalid-feedback">
                                        <?= isset($errors['no_hp']) ? $errors['no_hp'] : null ?>
                                    </div>
                                </div>
                            </div>

                            <label for="formFile" class="form-label mx-3">Gambar</label>
                            <div class="input-group mb-3">
                                <div class="custom-file mx-3">
                                    <input type="file" class="custom-file-input <?= isset($errors['gambar']) ? 'is-invalid' : null ?>" id="inputGroupFile04" name="gambar" onchange="updateFileName()">
                                    <div class="invalid-feedback">
                                        <?= isset($errors['gambar']) ? $errors['gambar'] : null ?>
                                    </div>
                                    <label class="custom-file-label" for="inputGroupFile04" id="fileLabel">Choose file</label>
                                </div>
                            </div>

                            <div class="form-group mx-3">
                                <label>Alamat</label>
                                <textarea class="form-control <?= isset($errors['alamat']) ? 'is-invalid' : null ?>" name="alamat" rows="5" cols="30"><?= old('alamat'); ?></textarea>
                                <div class="invalid-feedback">
                                    <?= isset($errors['alamat']) ? $errors['alamat'] : null ?>
                                </div>
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