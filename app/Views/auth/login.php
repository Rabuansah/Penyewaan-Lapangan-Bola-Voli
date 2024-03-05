<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap css -->
    <link rel="stylesheet" href="<?= base_url(); ?>template_user/css/bootstrap.min.css">
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
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form method="POST" action="<?= site_url('auth/loginProcess') ?>" class="needs-validation">
                                        <?= csrf_field() ?>
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <span class="h1 fw-bold ">Gor Chandra Alkadrie</span>
                                        </div>
                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Masuk ke akun Anda</h5>

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
                                        <!-- alert Error -->
                                        <?php if (session()->getFlashdata('error')) : ?>
                                            <div class="alert alert-danger alert-dismissible show fade">
                                                <div class="alert-body">
                                                    <button class="close" data-dismiss="alert"> x </button>
                                                    <b>Error !</b>
                                                    <?= session()->getFlashdata('error') ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <!-- alert warning -->
                                        <?php if (session()->getFlashdata('warning')) : ?>
                                            <div class="alert alert-warning alert-dismissible show fade">
                                                <div class="alert-body">
                                                    <button class="close" data-dismiss="alert"> x </button>
                                                    <b>Warning !</b>
                                                    <?= session()->getFlashdata('warning') ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-user-o"></i></span>
                                                </div>
                                                <input type="text" name="username" class="form-control" placeholder="Username" value="<?= old('username'); ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                                </div>
                                                <input type="password" class="form-control" value="<?= old('password'); ?>" id="password" placeholder="Password" name="password">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-light" type="button" id="togglePassword">
                                                        <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                                        <i class="fa fa-eye" aria-hidden="true" style="display: none;"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-grid gap-2 mx-auto mb-4">
                                            <button class="btn btn-primary" type="submit">Login</button>
                                        </div>
                                        <!-- <a class="small text-muted" href="#!">Forgot password?</a> -->
                                        <p class="" style="color: #393f81;">Belum punya akun? <a href="<?= base_url('register'); ?>" style="color: #47b2e4;">Daftar disini</a></p>
                                        <a href="#!" class="small text-muted">
                                            <script type="text/javascript">
                                                document.write(new Date().getFullYear());
                                            </script>
                                        </a>
                                        <a href="#!" class="small text-muted">Privacy policy</a>
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

    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            var passwordField = document.getElementById('password');
            var eyeIconVisible = document.querySelector('#togglePassword .fa-eye-slash');
            var eyeSlashIconVisible = document.querySelector('#togglePassword .fa-eye');

            var fieldType = passwordField.getAttribute('type');
            if (fieldType === 'password') {
                passwordField.setAttribute('type', 'text');
                eyeIconVisible.style.display = 'none';
                eyeSlashIconVisible.style.display = 'inline-block';
            } else {
                passwordField.setAttribute('type', 'password');
                eyeIconVisible.style.display = 'inline-block';
                eyeSlashIconVisible.style.display = 'none';
            }
        });
    </script>


</body>

</html>