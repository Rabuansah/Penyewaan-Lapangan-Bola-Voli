<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <?= $this->renderSection('title'); ?>

    <!-- CSS Style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/vendor/fontawesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/vendor/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/vendor/charts-c3/plugin.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/vendor/jvectormap/jquery-jvectormap-2.0.3.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/main.css" type="text/css">

</head>

<body class="theme-indigo">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="<?= base_url(); ?>/template/assets/images/brand/logo.png" width="48" height="48" alt="ArrOw"></div>
            <p>Please wait...</p>
        </div>
    </div>

    <nav class="navbar custom-navbar navbar-expand-lg py-2">
        <div class="container-fluid px-0" style="flex-wrap: nowrap !important;">
            <a href="javascript:void(0);" class="menu_toggle"><i class="fa fa-align-left"></i></a>
            <a href="<?= base_url('admin'); ?>" class="navbar-brand"><img src="<?= base_url(); ?>/template/assets/images/brand/logo.png" alt="GCA" /> <strong>Gor Chandra Alkadrie</strong> </a>
            <div id="navbar_main">
                <ul class="navbar-nav mr-auto hidden-xs">
                    <li class="nav-item page-header">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('/'); ?>"><i class="fa fa-globe"></i></a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item hidden-xs">
                        <form class="form-inline main_search">
                            <input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Search..." aria-label="Search">
                        </form>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-icon" href="javascript:void(0);" id="navbar_1_dropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <h6 class="dropdown-header">User menu</h6>
                            <a class="dropdown-item" href="<?= site_url('mdadmin'); ?>"><i class="fa fa-user text-primary"></i>My Profile</a>
                            <a class="dropdown-item" href="javascript:void(0);"><i class="fa fa-cog text-primary"></i>Settings</a>
                            <div class="dropdown-divider" role="presentation"></div>
                            <a class="dropdown-item" href="<?= site_url('auth/logout'); ?>"><i class="fa fa-sign-out text-primary"></i>Log out</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main_content" id="main-content">

        <?= $this->include('admin/layout/menu'); ?>

    </div>

    <?= $this->renderSection('content'); ?>


    <!-- Core -->
    <script src="<?= base_url(); ?>/template/assets/bundles/libscripts.bundle.js"></script>
    <script src="<?= base_url(); ?>/template/assets/bundles/vendorscripts.bundle.js"></script>

    <script src="<?= base_url(); ?>/template/assets/bundles/c3.bundle.js"></script>
    <script src="<?= base_url(); ?>/template/assets/bundles/jvectormap.bundle.js"></script>
    <!-- JVectorMap Plugin Js -->

    <!-- jquery datatable -->
    <script src="<?= base_url(); ?>/template/assets/bundles/datatablescripts.bundle.js"></script>
    <script src="<?= base_url(); ?>/template/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
    <script src="<?= base_url(); ?>/template/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>/template/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js"></script>
    <script src="<?= base_url(); ?>/template/assets/vendor/jquery-datatable/buttons/buttons.flash.min.js"></script>
    <script src="<?= base_url(); ?>/template/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js"></script>
    <script src="<?= base_url(); ?>/template/assets/vendor/jquery-datatable/buttons/buttons.print.min.js"></script>

    <script src="<?= base_url(); ?>/template/assets/js/theme.js"></script>
    <script src="<?= base_url(); ?>/template/assets/js/pages/index.js"></script>
    <script src="<?= base_url(); ?>/template/assets/js/pages/todo-js.js"></script>
    <script src="<?= base_url(); ?>/template/assets/js/pages/tables/jquery-datatable.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Temukan semua item menu yang dapat diklik
            var menuItems = document.querySelectorAll('#main-menu li a');

            // Tambahkan event listener untuk setiap item menu
            menuItems.forEach(function(item) {
                item.addEventListener('click', function() {
                    // Dapatkan teks dan ikon dari item menu yang diklik
                    var menuText = item.querySelector('span').textContent;
                    var menuIcon = item.querySelector('i').className;

                    // Simpan status menu yang dipilih ke dalam localStorage
                    localStorage.setItem('selectedMenuText', menuText);
                    localStorage.setItem('selectedMenuIcon', menuIcon);

                    // Ubah judul halaman dan ikon di bagian atas
                    var breadcrumbItem = document.querySelector('.breadcrumb-item.active');
                    breadcrumbItem.textContent = menuText;
                    breadcrumbItem.firstChild.className = menuIcon;

                    // Ubah judul di navbar
                    document.querySelector('.navbar-brand span').textContent = menuText;
                    document.querySelector('.navbar-brand i').className = menuIcon;
                });
            });

            // Memeriksa jika ada menu yang dipilih sebelumnya dan mengatur judul dan ikon sesuai
            var selectedMenuText = localStorage.getItem('selectedMenuText');
            var selectedMenuIcon = localStorage.getItem('selectedMenuIcon');
            if (selectedMenuText && selectedMenuIcon) {
                // Ubah judul halaman dan ikon di bagian atas
                var breadcrumbItem = document.querySelector('.breadcrumb-item.active');
                breadcrumbItem.textContent = selectedMenuText;
                breadcrumbItem.firstChild.className = selectedMenuIcon;

                // Ubah judul di navbar
                document.querySelector('.navbar-brand span').textContent = selectedMenuText;
                document.querySelector('.navbar-brand i').className = selectedMenuIcon;
            }
        });
    </script>





</html>