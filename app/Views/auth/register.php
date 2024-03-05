<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>

    <!-- Bootstrap css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template_user/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/vendor/fontawesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/vendor/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/vendor/charts-c3/plugin.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/vendor/jvectormap/jquery-jvectormap-2.0.3.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/main.css" type="text/css">
</head>

<body>
    <section class="vh-100" style="background-color: #37517e;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="<?= base_url(); ?>/template/assets/images/orang1.png" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">

                                <div class="card-body text-black">
                                    <form id="basic-form" method="post" novalidate action="<?= site_url('Mdusers/Create') ?>" autocomplete="off" enctype="multipart/form-data">

                                        <?php $errors = session()->getFlashdata('errors') ?>
                                        <?= csrf_field() ?>

                                        <div class=" d-flex align-items-center">
                                            <span class="h1 fw-bold ">Registrasi GCA</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Lengkapi form dibawah ini untuk mendaftar</h5>

                                        <div class="form-outline mb-3">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-user-o"></i></span>
                                                </div>
                                                <input placeholder="Username" class="form-control <?= isset($errors['username']) ? 'is-invalid' : null ?>" id="username" type="text" name="username" aria-label="username" value="<?= old('username'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= isset($errors['username']) ? $errors['username'] : null ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-outline mb-3">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
                                                </div>
                                                <input placeholder="Email" class="form-control email <?= isset($errors['email']) ? 'is-invalid' : null ?>" id="email" type="email" name="email" aria-label="email" value="<?= old('email'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= isset($errors['email']) ? $errors['email'] : null ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-key"></i></span>
                                                        </div>
                                                        <input placeholder="Password" type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : null ?>" id="password" name="password" value="<?= old('password'); ?>">
                                                        <div class="invalid-feedback">
                                                            <?= isset($errors['password']) ? $errors['password'] : null ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col ml-0">
                                                    <input placeholder="Konfirmasi Password" type="password" class="form-control <?= isset($errors['confirm_password']) ? 'is-invalid' : null ?>" id="confirm_password" name="confirm_password" value="<?= old('confirm_password'); ?>">
                                                    <div class="invalid-feedback">
                                                        <?= isset($errors['confirm_password']) ? $errors['confirm_password'] : null ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                </div>
                                                <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');" name="no_hp" class="form-control mobile-phone-number <?= isset($errors['no_hp']) ? 'is-invalid' : null ?>" value="<?= old('no_hp'); ?>" placeholder="Nomor Hp/WA">
                                                <div class="invalid-feedback">
                                                    <?= isset($errors['no_hp']) ? $errors['no_hp'] : null ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-home"></i></span>
                                            </div>
                                            <textarea placeholder="Alamat" class="form-control <?= isset($errors['alamat']) ? 'is-invalid' : null ?>" aria-label="alamat" name="alamat"><?= old('alamat'); ?></textarea>
                                            <div class="invalid-feedback">
                                                <?= isset($errors['alamat']) ? $errors['alamat'] : null ?>
                                            </div>
                                        </div>

                                        <div class="d-grid gap-2 mx-auto mb-4">
                                            <button class="btn btn-primary" type="submit">Daftar</button>
                                        </div>

                                        <!-- <a class="small text-muted" href="#!">Forgot password?</a> -->
                                        <p class="mt-2" style="color: #393f81;">Sudah punya akun? <a href="<?= site_url('login'); ?>" style="color: #393f81;">Login disini</a></p>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>