<?= $this->extend('template/template-backend-admin') ?>
<?= $this->section('content') ?>

<div class="col-sm-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subtitle ?></h3>
        </div>
        <div class="card-body p-0">
            <?php
            if (session()->getFlashdata('terima')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('terima');
                echo '</h5></div>';
            }

            if (session()->getFlashdata('ditolak')) {
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('ditolak');
                echo '</h5></div>';
            }
            ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="70px">#</th>
                        <th>Foto</th>
                        <th>No Pendaftaran</th>
                        <th>Tahun</th>
                        <th>NISN</th>
                        <th>Nama Lengkap</th>
                        <th>Jalur Masuk</th>

                        <th class="notexport" width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($ppdb as $key => $value) { ?>
                        <tr>

                            <td><?= $no++ ?></td>
                            <td><img width="100px" alt="Avatar" class="table-avatar" src="<?= base_url('foto/' . $value['foto']) ?>"></td>
                            <td><?= $value['no_pendaftaran'] ?></td>
                            <td><label class="badge badge-success"><?= $value['tahun'] ?></label></td>
                            <td><?= $value['nisn'] ?></td>
                            <td><?= $value['nama_lengkap'] ?></td>
                            <td><label class="badge badge-warning"><?= $value['jalur_masuk'] ?></label></td>
                            <td>
                                <a href="<?= base_url('PendaftaranSiswa/detailData/' . $value['id_siswa']) ?>" class="btn btn-flat btn-xs btn-primary"><i class="fas fa-eye"></i> View</a>
                                <a href="<?= base_url('PendaftaranSiswa/diterima/' . $value['id_siswa']) ?>" class="btn btn-flat btn-xs btn-success"><i class="fas fa-check"></i> Terima</a>
                                <a href="<?= base_url('PendaftaranSiswa/ditolak/' . $value['id_siswa']) ?>" class="btn btn-flat btn-xs btn-danger"><i class="fas fa-times "></i> Tolak</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>