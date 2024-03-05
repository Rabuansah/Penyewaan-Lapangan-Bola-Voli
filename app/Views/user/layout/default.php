<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?= $this->renderSection('title'); ?>

    <!-- Bootstrap css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template_user/css/bootstrap.min.css" type="text/css" />

    <!-- slider -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template_user/css/swiper-bundle.min.css" />

    <!-- calendar -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/vendor/fullcalendar/fullcalendar.min.css">

    <!-- Icon -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template_user/css/materialdesignicons.min.css" type="text/css" />

    <!-- css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template_user/css/style.min.css" type="text/css" />

    <!-- JQuery -->
    <script src="<?= base_url(); ?>/template/assets/vendor/jquery/jquery-3.6.0.min.js"></script>


</head>

<body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-offset="71">

    <nav class="navbar navbar-expand-lg fixed-top navbar-white navbar-custom sticky" id="navbar">
        <div class="container">

            <!-- LOGO -->
            <a class="navbar-brand text-uppercase text-white" href="<?= site_url('user'); ?>">
                <img src="<?= base_url(); ?>/template/assets/images/brand/logo.png" alt="" height="50"> <strong>GCA</strong>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="mdi mdi-menu"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mx-auto" id="navbar-navlist">
                    <li class="nav-item ">
                        <a class="nav-link text-white <?php if (current_url() == site_url('user')) echo 'active'; ?>" href="<?= site_url('user'); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white <?php if (current_url() == site_url('lapangan_user')) echo 'active'; ?>" href="<?= site_url('lapangan_user'); ?>">Lapangan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white <?php if (current_url() == site_url('detail_transaksi')) echo 'active'; ?>" href="<?= site_url('detail_transaksi'); ?>">Detail Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white <?php if (current_url() == site_url('informasi')) echo 'active'; ?>" href="<?= site_url('informasi'); ?>">Informasi</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <div class="me-5 flex-shrink-0 d-none d-lg-block">
                        <a class="btn btn-primary nav-btn" href="<?= site_url('auth/logout'); ?>">
                            LogOut
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <?= $this->renderSection('content'); ?>


    <!-- START FOOTER -->
    <footer class="section bg-footer">
        <div class="container">
            <div class="row g-sm-4">
                <div class="col-lg-6 col-md-4 col-6">
                    <div class="mb-3 mb-sm-0">
                        <img src="<?= base_url(); ?>/template/assets/images/brand/logo.png" class="logo-dark" alt="" height="40"> <strong>Gor Chandra Alkadrie</strong>
                    </div>
                    <ul class="list-unstyled footer-link mt-3 mb-0 fs-14">
                        <li>Kompelek Miari 9, Jl. Ampera Raya</li>
                        <li>Kecamatan Sungai Ambawang</li>
                        <li>Kabupaten Kubu Raya</li>
                    </ul>
                    <h6 class="text-uppercase fw-semibold mt-4">Contact</h6>
                    <ul class="list-unstyled footer-link mt-1 mb-0 fs-14">
                        <li>
                            <span class="mdi mdi-whatsapp"></span>
                            <a href="https://wa.me/6285251913225">+62 852 5191 3225</a>
                        </li>
                    </ul>
                </div><!-- End col -->

                <div class="col-lg-6 col-6">
                    <h6 class="text-uppercase fw-semibold mt-3">Maps
                        <span class="text-primary text-uppercase fs-17">GCA</span>
                    </h6>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.8165721252776!2d109.3900894910549!3d-0.05363630649121065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d57562e719d5d%3A0xa4a1cc2b551d1c09!2sKomplek%20miari%20residen%209!5e0!3m2!1sid!2sid!4v1687231575686!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 150px;" allowfullscreen></iframe>
                </div>
            </div><!-- End row -->
        </div><!-- End container -->
    </footer>
    <!-- END FOOTER -->

    <!-- FOOTER-ALT -->
    <div class="footer-alt pt-3 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="mb-0 text-white">©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <strong><a href="https://www.instagram.com/rabuansah/" class="text-light">Rabuansah.</a></strong>
                            <span>All Rights Rseserved</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END FOOTER-ALT -->

    <!--start back-to-top-->
    <button onclick="topFunction()" id="back-to-top">
        <i class="mdi mdi-arrow-up"></i>
    </button>
    <!--end back-to-top-->

    <!--Custom js-->
    <script src="<?= base_url(); ?>/template_user/js/counter.js"></script>
    <script src="<?= base_url(); ?>/template_user/js/swiper-bundle.min.js"></script>

    <!--Bootstrap Js-->
    <script src="<?= base_url(); ?>/template_user/js/bootstrap.bundle.min.js"></script>



    <!-- calendar -->
    <script src="<?= base_url(); ?>/template/assets/bundles/libscripts.bundle.js"></script>
    <script src="<?= base_url(); ?>/template/assets/bundles/vendorscripts.bundle.js"></script>
    <script src="<?= base_url(); ?>/template/assets/bundles/fullcalendarscripts.bundle.js"></script>
    <script src="<?= base_url(); ?>/template/assets/js/theme.js"></script>
    <script src="<?= base_url(); ?>/template/assets/js/pages/calendar.js"></script>

    <!-- App Js -->
    <script src="<?= base_url(); ?>/template_user/js/app.js"></script>

</body>

</html>