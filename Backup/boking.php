<?= $this->extend('user/layout/default'); ?>

<?= $this->section('content'); ?>
<title>User GCA | Booking Lapangan</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row gy-5 justify-content-center mt-5 pt-5">
        <div class="col-lg-12">
            <div class="text-center">
                <h3 class="heading">Booking Lapangan</h3>
                <p class="text-muted">Gor Chandra Alkadrie</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-12 mb-4">
                <div class="card shadow-sm">
                    <form action="<?= site_url('user/proses_sewa') ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img src="<?= base_url('uploads/' . $lapangan->gambar) ?>" class="img-fluid rounded" alt="Lapangan">
                                </div>
                                <div class="col-lg-8">
                                    <h5 class="card-title"><strong><?= $lapangan->nama_lapangan ?></strong></h5>
                                    <p class="card-text"><?= $lapangan->deskripsi ?></p>
                                    <label for="date" class="form-label">Pilih Tanggal Booking</label>
                                    <input type="date" name="tanggal_penyewaan" id="date" class="form-control" min="<?= date('Y-m-d') ?>" value="<?= date('Y-m-d') ?>">
                                    <label for="date" class="form-label mt-3">Pilih Kategori Lapangan</label>
                                    <select name="kategori" id="kategori" class="form-select">
                                        <option value="putra"><Strong>Putra</Strong> (Tinggi Net : 2,43m)</option>
                                        <option value="putri"><strong>Putri</strong> (Tinggi Net : 2,24m)</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <h5 class="my-4">Tap pada item di bawah untuk memilih <strong>Jadwal Booking</strong></h5>
                            <!-- Modal untuk validasi -->
                            <div class="modal fade" id="validationModal" tabindex="-1" aria-labelledby="validationModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="validationModalLabel">Peringatan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Harap pilih minimal satu jadwal untuk booking.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center" id="jadwal">
                                <?php foreach ($jadwal as $itemJadwal) : ?>
                                    <div class="col-lg-2 col-md-4 col-6 mb-3">
                                        <?php
                                        // $isDisabled = in_array($itemJadwal->id_jadwal, array_column($getPaidBookings, 'id_jadwal'));
                                        $isDisabled = false; // Awalnya dianggap tidak disabled

                                        // Loop melalui data pembayaran yang sudah terpilih
                                        foreach ($getPaidBookings as $paidBooking) {
                                            // Bandingkan id_jadwal, id_lapangan, dan tanggal_penyewaan
                                            if (
                                                $paidBooking->id_jadwal == $itemJadwal->id_jadwal &&
                                                $paidBooking->id_lapangan == $lapangan->id_lapangan
                                                // $paidBooking->tanggal_penyewaan == $selectedDate
                                            ) {
                                                $isDisabled = true; // Jadikan sebagai disabled jika sesuai
                                                break; // Keluar dari loop, sudah tidak perlu dicek lagi
                                            }
                                        }

                                        $cardClass = $isDisabled ? 'disabled-card' : '';
                                        ?>
                                        <div class="card shadow-sm border rounded card-jam <?= $cardClass ?>">
                                            <div class="card-body text-center">
                                                <?php if ($isDisabled) : ?>
                                                    <span class="disabled-label">Terbooking</span>
                                                <?php else : ?>
                                                    <input type="checkbox" name="jam[]" id="" value="<?= $itemJadwal->id_jadwal ?>">
                                                <?php endif; ?>
                                                <h3 class="text-dark"><span class="mdi mdi-clock-outline" style="font-size: 50px;"></span></h3>
                                                <p class="text-dark mt-1 mb-0" style="font-size: 12px;"><?= substr($itemJadwal->start_hour, 0, 5) . " - " . substr($itemJadwal->end_hour, 0, 5) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success btn-lg" onclick="return validateForm()"></i>Booking</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        const cardJamList = document.querySelectorAll('.card-jam');
        cardJamList.forEach(cardJam => {
            cardJam.addEventListener('click', () => {
                const checkbox = cardJam.querySelector('input[type="checkbox"]');
                checkbox.checked = !checkbox.checked;
            });
        });

        function validateForm() {
            const checkboxes = document.querySelectorAll('input[name="jam[]"]');
            let isChecked = false;
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    isChecked = true;
                }
            });
            if (!isChecked) {
                $('#validationModal').modal('show'); // Munculkan modal
                return false; // Berhentikan submit form
            }
            return true; // Lanjutkan submit form
        }

        let crsfToken = '<?= csrf_token(); ?>';
        let crsfHash = '<?= csrf_hash(); ?>';

        var selectedDate = document.getElementById('date');
        var jadwal = document.getElementById('jadwal');
        // Tambahkan event listener untuk input tanggal
        selectedDate.addEventListener('change', function() {
            var selectedDate = $(this).val(); // Ambil tanggal yang dipilih

            // Kirim permintaan AJAX ke backend untuk mendapatkan jadwal booking yang tersedia
            $.ajax({
                url: '/user/proses_sewa', // Ganti dengan URL endpoint yang sesuai
                method: 'POST',
                data: {
                    [crsfToken]: crsfHash,
                    selected_date: selectedDate
                }, // Kirim tanggal yang dipilih sebagai data
                success: function(response) {
                    // Panggil fungsi untuk memperbarui tampilan jadwal booking dengan data yang diterima
                    updateBookingSchedule(response);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + '\n' + thrownError);
                }
            });
        });

        // Fungsi untuk memperbarui tampilan jadwal booking di frontend
        function updateBookingSchedule(availableTimes) {
            // Hapus jadwal booking yang sedang ditampilkan saat ini
            $('.card-jam').remove();

            // Iterasi melalui data jadwal booking yang diterima dari backend
            availableTimes.forEach(function(time) {
                // Buat elemen card baru untuk setiap jadwal booking
                var cardHtml = '<div class="col-lg-2 col-md-4 col-6 mb-3">' +
                    '<div class="card shadow-sm border rounded card-jam">' +
                    '<div class="card-body text-center">' +
                    '<input type="checkbox" name="jam[]" value="' + time.id_jadwal + '">' +
                    '<h3 class="text-dark"><span class="mdi mdi-clock-outline" style="font-size: 50px;"></span></h3>' +
                    '<p class="text-dark mt-1 mb-0" style="font-size: 12px;">' + time.start_hour.substring(0, 5) + ' - ' + time.end_hour.substring(0, 5) + '</p>' +
                    '</div>' +
                    '</div>' +
                    '</div>';

                // Tambahkan elemen card ke dalam container jadwal booking
                $('.row.justify-content-center').append(cardHtml);
            });
        }

    </script>

</div><?= $this->endSection(); ?>




<!-- // var selectedDate = document.getElementById('date');
        // var jadwal = document.getElementById('jadwal');

        // // Tambahkan event listener untuk input tanggal
        // selectedDate.addEventListener('change', function() {
        //     // console.log('Tambahkan event listener')
        //     // /buat object ajax
        //     var xhr = new XMLHttpRequest();

        //     //cek kesiapan ajax
        //     xhr.onreadystatechange = function() {
        //         if (xhr.readyState == 4 && xhr.status == 200) {
        //             jadwal.innerHTML = xhr.responseText;
        //         }
        //     }

        //     //eksekusi ajax
        //     xhr.open('GET', '', true);
        //     xhr.setRequestHeader('Content-Type', 'application/json');
        //     xhr.send(JSON.stringify({
        //         selected_date: selectedDate.value
        //     }));
        // }); -->