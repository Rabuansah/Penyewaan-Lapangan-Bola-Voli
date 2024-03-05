<?= $this->extend('admin/layout/default'); ?>

<?= $this->section('content'); ?>
<title>Admin GCA | Jadwal</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="page">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-12">
                <div class="table-responsive">
                    <form action="<?= site_url('mdjadwal/proses_simpan') ?>" method="post">
                        <?= csrf_field() ?>
                        <table class="table table-hover mb-0 c_table">
                            <thead>
                                <tr>
                                    <th class="w60">#</th>
                                    <th>Start Hour</th>
                                    <th>End Hour</th>
                                    <th>Tarif</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($jadwal as $key => $value) { ?>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck<?= $key ?>" name="checked_jadwal[]" value="<?= $value->id_jadwal ?>" <?= ($value->status === 'active') ? 'checked' : '' ?>>
                                                <label class="custom-control-label" for="customCheck<?= $key ?>">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td><?= $value->start_hour; ?></td>
                                        <td><?= $value->end_hour; ?></td>
                                        <td><?= $value->tarif; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary"><span>Simpan</span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>