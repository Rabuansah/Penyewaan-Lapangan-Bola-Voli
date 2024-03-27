<?= $this->extend('user/layout/default'); ?>

<?= $this->section('content'); ?>
<title>User GCA | Home</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<style>
    .fc-time {
        display: none !important;
    }
</style>

<!-- Start Home -->
<!-- START pricing -->
<section class="section pricing" id="pricing">
    <div class="container">
        <div class="row gy-5 justify-content-center mt-3">
            <div class="col-lg-12">
                <div class="text-center">
                    <h3 class="heading">Pemesanan Lapangan</h3>
                    <div class="dropdown ">
                        <select class="form-control text-center" id="lapanganDropdown">
                            <!-- Loop untuk menampilkan pilihan lapangan dari database -->
                            <?php foreach ($lapangan as $value) : ?>
                                <option value="<?= $value->id_lapangan; ?>"><?= $value->nama_lapangan; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div><!-- End col -->
            <div class="container">
                <div class="row">
                    <div class="body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
            <!-- col end -->
        </div><!-- End row -->
    </div><!-- End container -->
</section>

<!-- END pricing -->
<!-- End Home -->
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



</div><?= $this->endSection(); ?>