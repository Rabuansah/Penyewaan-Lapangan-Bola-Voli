<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GOR Chandra Alkadrie</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="<?= base_url(); ?>/template/landingpage/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/template/landingpage/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <!-- CSS -->
    <link href="<?= base_url(); ?>/template/landingpage/style.css" rel="stylesheet">

    <!-- calendar -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/vendor/fullcalendar/fullcalendar.min.css">
    <!-- JQuery -->
    <script src="<?= base_url(); ?>/template/assets/vendor/jquery/jquery-3.6.0.min.js"></script>

    <style>
        .fc-time {
            display: none !important;
        }
    </style>

</head>

<body>
    <!--========== Header ==========-->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-lg-center">
            <a href="<?= site_url('/'); ?>" class="logo me-auto"><img src="<?= base_url(); ?>/template/assets/images/logo.png" alt="" class="img-fluid"></a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="#hero" class="nav-link scrollto active">Home</a></li>
                    <li><a href="#about" class="nav-link scrollto">About</a></li>
                    <li><a href="#jabo" class="nav-link scrollto">Jadwal Booking</a></li>
                    <li><a href="#gallery" class="nav-link scrollto">Gallery</a></li>
                    <li><a href="#footer" class="nav-link scrollto">Contact Us</a></li>
                    <li><a href="<?= base_url('login'); ?>" class="getstarted scrollto">Login</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>
    <!-- ======= End Header ======= -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                    <h1>GOR CHANDRA ALKADRIE</h1>
                    <h2>Komplek Miari Residen 9 Jalan Ampera Raya Kecamatan Sungai Ambawang, Kabupaten Kubu Raya, Kalimantan Barat</h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="<?= base_url('login'); ?>" class="btn-get-started scrollto">Login</a>
                        <a href="<?= base_url('register'); ?>" class="btn-get-registed scrollto">Registrasi</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="<?= base_url(); ?>/template/assets/images/Untitled-1.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->

    <main id="main">
        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>About Us</h2>
                </div>
                <div class="row content">
                    <div class="col-lg-6">
                        <p>
                            Bola voli adalah salah satu olahraga yang sudah cukup terkenal di kalangan masyarakat Indonesia. Permainan bola voli merupakan suatu permainan yang dimainkan oleh dua tim, yang masing-masing tim dipisahkan oleh sebuah net, dengan jumlah pemain setiap tim yaitu enam orang. Pada jaman dahulu bola voli banyak dimainkan di halaman terbuka dikarenakan masih kurangnya fasilitas. Seiring berjalannya waktu, permainan bola voli sampai saat ini sudah sangat berkembang sehingga hampir semua turnamen besar sudah dilaksanakan di dalam gor.
                        </p>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <p>
                            Gelanggang Olahraga (GOR) Chandra Alkadire merupakan gedung olahraga untuk bola voli. Gedung ini baru diresmikan pada awal tahun 2023, alamat GOR Chandra Alkadrie berada di Komplek Miari Resident 9, Jalan Ampera Raya, Kecamatan Sungai Ambawang, Kabupaten Kubu Raya, Kalimantan Barat. GOR Chandra Alkadrie memiliki 2 lapangan yang beroprasional setiap hari dari pukul 14.00 - 22.00 WIB.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Us Section -->

        <!-- ======= Jadwal Booking Section ======= -->
        <section id="jabo" class="jabo">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Jadwal Booking</h2>
                </div>
                <!-- Dropdown Menu menggunakan <select> -->
                <div class="dropdown">
                    <select class="form-control text-center" id="lapanganDropdown">
                        <!-- Loop untuk menampilkan pilihan lapangan dari database -->
                        <?php foreach ($lapangan as $value) : ?>
                            <option value="<?= $value->id_lapangan; ?>"><?= $value->nama_lapangan; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="container mt-3">
                    <div class="row">
                        <div class="body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                    <div class="mt-3 d-flex justify-content-center justify-content-md-end">
                        <a href="<?= base_url('login'); ?>" class="btn btn-lg btn-outline-primary" type="button">Booking</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Jadwal Booking Section -->

        <!-- ======= gallery Section ======= -->
        <section id="gallery" class="gallery">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>gallery</h2>
                </div>
                <div class="row gallery-container" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-lg-4 col-md-6 gallery-item filter-app">
                        <div class="gallery-img">
                            <img src="<?= base_url(); ?>/template/assets/images/gallery/gallery1.jpeg" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 gallery-item filter-web">
                        <div class="gallery-img">
                            <img src="<?= base_url(); ?>/template/assets/images/gallery/gallery9.jpeg" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 gallery-item filter-app">
                        <div class="gallery-img">
                            <img src="<?= base_url(); ?>/template/assets/images/gallery/gallery2.jpeg" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 gallery-item filter-card">
                        <div class="gallery-img">
                            <img src="<?= base_url(); ?>/template/assets/images/gallery/gallery4.jpg" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 gallery-item filter-web">
                        <div class="gallery-img">
                            <img src="<?= base_url(); ?>/template/assets/images/gallery/gallery3.jpeg" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 gallery-item filter-app">
                        <div class="gallery-img">
                            <img src="<?= base_url(); ?>/template/assets/images/gallery/gallery6.jpg" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 gallery-item filter-card">
                        <div class="gallery-img">
                            <img src="<?= base_url(); ?>/template/assets/images/gallery/gallery7.jpeg" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 gallery-item filter-card">
                        <div class="gallery-img">
                            <img src="<?= base_url(); ?>/template/assets/images/gallery/gallery5.jpg" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 gallery-item filter-web">
                        <div class="gallery-img">
                            <img src="<?= base_url(); ?>/template/assets/images/gallery/gallery8.jpeg" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End gallery Section -->
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-6 col-md-6 footer-contact">
                        <h3>CONTACT</h3>
                        <p>
                            Komplek Miari 9, Jl. Ampera Raya <br>
                            Kec. Sungai Ambawang<br>
                            Kab. Kubu Raya <br><br>
                            <strong>Telpon:</strong> +62 852 5191 3225<br>
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-6 footer-links">
                        <h3>Maps</h3>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.8165721252776!2d109.3900894910549!3d-0.05363630649121065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d57562e719d5d%3A0xa4a1cc2b551d1c09!2sKomplek%20miari%20residen%209!5e0!3m2!1sid!2sid!4v1687231575686!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 150px;" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright <strong><span>Rabuansah</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- JS -->
    <script src="<?= base_url(); ?>/template/landingpage/main.js"></script>
    <script src="<?= base_url(); ?>/template/assets/bundles/fullcalendarscripts.bundle.js"></script>
    <script>
        document.getElementById('lapanganDropdown').addEventListener('change', function() {
            var selectedLapanganId = this.value;
            // Lakukan sesuatu dengan id lapangan yang dipilih (misalnya, tampilkan jadwal yang sesuai)
        });
    </script>
    <script>
        $(document).ready(function() {
            var calendar = $('#calendar');

            // Inisialisasi kalender
            calendar.fullCalendar({
                // Konfigurasi kalender
            });

            setDefaultCalendar();

            // Fungsi untuk memuat jadwal lapangan A secara default pada kalender
            function setDefaultCalendar() {
                var selectedLapanganId = $('#lapanganDropdown').val(); // Ambil id lapangan yang dipilih dari dropdown
                reloadCalendar(selectedLapanganId); // Memuat ulang kalender sesuai dengan lapangan yang dipilih
            }

            // Event handler saat pilihan lapangan berubah
            $('#lapanganDropdown').change(function() {
                var selectedLapanganId = $(this).val();
                reloadCalendar(selectedLapanganId); // Memuat ulang kalender sesuai dengan lapangan yang dipilih
            });

            // Fungsi untuk memuat ulang kalender berdasarkan lapangan yang dipilih
            function reloadCalendar(lapanganId) {
                var events = <?php echo json_encode($penyewaan); ?>; // data penyewaan yang sudah ada

                // Filter events sesuai dengan lapangan yang dipilih
                var filteredEvents = events.filter(function(event) {
                    return event.id_lapangan == lapanganId;
                });

                // Hapus kalender sebelum membuat yang baru
                calendar.fullCalendar('destroy');

                // Inisialisasi kalender baru dengan data penyewaan yang baru
                calendar.fullCalendar({
                    events: filteredEvents.map(function(event) {
                        var startTime = moment(event.tanggal_penyewaan + ' ' + event.start_hour).format('HH:mm');
                        var endTime = moment(event.tanggal_penyewaan + ' ' + event.end_hour).format('HH:mm');
                        var title = startTime + ' - ' + endTime + ' ' + event.username;
                        return {
                            title: title,
                            start: event.tanggal_penyewaan,
                            allDay: false,
                            className: event.status_pembayaran == 0 ? 'bg-warning' : 'bg-success', // Memilih kelas CSS berdasarkan status pembayaran
                            display: 'block',
                        };
                    }),
                    eventClick: function(calEvent, jsEvent, view) {
                        alert('Lapangan di Sewa: ' + calEvent.title);
                    }
                });
            }
        });
    </script>


</body>

</html>