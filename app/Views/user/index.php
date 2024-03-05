<?= $this->extend('user/layout/default'); ?>

<?= $this->section('content'); ?>
<title>User GCA | Home</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<!-- Start Home -->
<!-- START pricing -->
<section class="section pricing" id="pricing">
    <div class="container">
        <div class="row gy-5 justify-content-center mt-3">
            <div class="col-lg-12">
                <div class="text-center">
                    <h3 class="heading">Pemesanan Lapangan</h3>
                    <p class="text-muted">Lapangan 1 Gor Chandra Alkadrie</p>
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

        var events = <?php echo json_encode($data); ?>;

        calendar.fullCalendar({
            events: events.map(function(event) {
                return {
                    title: event.kategori,
                    start: event.tanggal_penyewaan, // Pastikan tanggal disesuaikan
                    allDay: false,
                    className: 'bg-success',
                };
            }),

        });
    });
</script>

</div><?= $this->endSection(); ?>