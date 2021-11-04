<?= $this->extend('template/template-backend-admin') ?>
<?= $this->section('content') ?>

<div class="col-sm-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subtitle ?></h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="70px">#</th>
                        <th>ID</th>
                        <th>No Pendaftaran</th>
                        <th>Nama</th>
                        <th>Password</th>
                        <th>Tahun</th>
                        <th>No Telp</th>
                        <th>Jalur Masuk</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($ppdb as $key => $value) { ?>
                        <tr>

                            <td><?= $no++ ?></td>
                            <td><?= $value['no_pendaftaran'] ?></td>
                            <td><?= $value['no_pendaftaran'] ?></td>
                            <td><?= $value['nama_lengkap'] ?></td>
                            <td><?= $value['password'] ?></td>
                            <td><label class="badge badge-success"><?= $value['tahun'] ?></label></td>
                            <td><?= $value['no_telpon'] ?></td>
                            <td><label class="badge badge-warning"><?= $value['jalur_masuk'] ?></label></td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>