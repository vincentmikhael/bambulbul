<?= $this->extend('template/template-backend-admin') ?>
<?= $this->section('content') ?>


<div class="col-sm-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><b>Formulir Pendaftaran Peseta Didik</b></h3>
            <div class="card-tools">
                <a href="<?= base_url('PendaftaranSiswa') ?>" class="btn btn-sm btn-primary btn-flat"><i class="fas fa-forward">Kembali</i></a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><b><i class="fas fa-align-justify"></i> Pendaftaran</b></h3>
                            <div class="card-tools">
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <strong><i class="fas fa-book mr-1"></i> NISN</strong>
                                    <p class="text-muted"><?= $siswa['nisn'] ?></p>
                                </div>
                                <div class="col-sm-3">
                                    <strong><i class="fas fa-pencil-alt mr-1"></i> No Pendaftaran/Jurusan</strong>
                                    <p class="text-muted"><?= $siswa['no_pendaftaran'] ?>/<?= $siswa['jurusan'] ?></p>
                                </div>
                                <div class="col-sm-3">
                                    <strong><i class="fas fa-calendar"></i> Tanggal Daftar</strong>
                                    <p class="text-muted"><?= $siswa['tgl_pendaftaran'] ?></p>
                                </div>
                                <div class="col-sm-3">
                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Jalur Masuk</strong>
                                    <?= ($siswa['jalur_masuk'] == null) ? '<p class="text-danger">Wajib Diisi!</p>' : '<p class="text-muted">' . $siswa['jalur_masuk'] . '</p>'  ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <div class="col-sm-3">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><b>Foto Siswa</b></h3>
                            <div class="card-tools">
                                <?php if ($siswa['stat_pendaftaran'] == 0) { ?>
                                    <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#foto"><i class="fas fa-pencil-alt text-info"></i></button>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="text-center">
                                <?php if ($siswa['foto'] == null) { ?>
                                    <img src="<?= base_url('foto/blank.jpg') ?>" width="200px" height="220px">
                                <?php } else { ?>
                                    <img src="<?= base_url('foto/' . $siswa['foto']) ?>" width="200px" height="220px">
                                <?php } ?>
                                <br>

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <div class="col-sm-9">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><b><i class="fas fa-user-graduate"></i> Identitas Peserta Didik</b></h3>
                            <div class="card-tools">
                                <?php if ($siswa['stat_pendaftaran'] == 0) { ?>
                                    <button type="button" class="btn btn-sm text-info" data-toggle="modal" data-target="#siswa">
                                        <i class="fas fa-pencil-alt"></i></button>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <strong><i class="fas fa-user"></i> Nama Lengkap</strong>
                                    <?= ($siswa['nama_lengkap'] == null) ? '<p class="text-danger">Wajib Diisi!</p>' : '<p class="text-muted">' . $siswa['nama_lengkap'] . '</p>'  ?>
                                    <strong><i class="fas fa-clinic-medical"></i> Tempat Lahir</strong>
                                    <?= ($siswa['tempat_lahir'] == null) ? '<p class="text-danger">Wajib Diisi!</p>' : '<p class="text-muted">' . $siswa['tempat_lahir'] . '</p>'  ?>
                                    <strong><i class="fas fa-birthday-cake"></i> Tanggal Lahir</strong>
                                    <?= ($siswa['tgl_lahir'] == null) ? '<p class="text-danger">Wajib Diisi!</p>' : '<p class="text-muted">' . $siswa['tgl_lahir'] . '</p>'  ?>
                                    <strong><i class="fas fa-venus-mars"></i> Jenis Kelamin</strong>
                                    <?php if ($siswa['jk'] == 'P') {
                                        $jk = 'Perempuan';
                                    } elseif ($siswa['jk'] == 'L') {
                                        $jk = 'Laki-Laki';
                                    }  ?>
                                    <?= ($siswa['jk'] == null) ? '<p class="text-danger">Wajib Diisi!</p>' : '<p class="text-muted">' . $jk . '</p>'  ?>
                                </div>

                                <div class="col-sm-6">
                                    <strong><i class="fas fa-place-of-worship"></i> Agama</strong>
                                    <?= ($siswa['agama'] == null) ? '<p class="text-danger">Wajib Diisi!</p>' : '<p class="text-muted">' . $siswa['agama'] . '</p>'  ?>
                                    <strong><i class="fas fa-mobile-alt"></i> Telp/Hp</strong>
                                    <?= ($siswa['no_telpon'] == null) ? '<p class="text-danger">Wajib Diisi!</p>' : '<p class="text-muted">' . $siswa['no_telpon'] . '</p>'  ?>
                                    <strong><i class="fas fa-school"></i> Asal Sekolah</strong>
                                    <?= ($siswa['asal_sekolah'] == null) ? '<p class="text-danger">Wajib Diisi!</p>' : '<p class="text-muted">' . $siswa['asal_sekolah'] . '</p>'  ?>
                                    <strong><i class="fas fa-calendar-day"></i> Tahun Lulus</strong>
                                    <?= ($siswa['tahun_lulus'] == null) ? '<p class="text-danger">Wajib Diisi!</p>' : '<p class="text-muted">' . $siswa['tahun_lulus'] . '</p>'  ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <div class="col-sm-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><b><i class="fas fa-male"></i> Data Ayah</b></h3>
                            <div class="card-tools">
                                <?php if ($siswa['stat_pendaftaran'] == 0) { ?>
                                    <button type="button" class="btn btn-sm text-primary" data-toggle="modal" data-target="#ayah">
                                        <i class="fas fa-pencil-alt"></i></button>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <strong><i class="fas fa-user"></i> Nama Ayah</strong>
                                    <?= ($siswa['nama_ayah'] == null) ? '<p class="text-danger">Wajib Diisi!</p>' : '<p class="text-muted">' . $siswa['nama_ayah'] . '</p>'  ?>
                                    <strong><i class="fas fa-home"></i> Alamat</strong>
                                    <?= ($siswa['alamat_ayah'] == null) ? '<p class="text-danger">Wajib Diisi!</p>' : '<p class="text-muted">' . $siswa['alamat_ayah'] . '</p>'  ?>
                                </div>
                                <div class="col-sm-6">
                                    <strong><i class="fas fa-building"></i> Pekerjaan</strong>
                                    <?= ($siswa['pekerjaan_ayah'] == null) ? '<p class="text-danger">Wajib Diisi!</p>' : '<p class="text-muted">' . $siswa['pekerjaan_ayah'] . '</p>'  ?>
                                    <strong><i class="fas fa-mobile-alt"></i> Telp/Hp</strong>
                                    <?= ($siswa['no_telpon_ayah'] == null) ? '<p class="text-danger">Wajib Diisi!</p>' : '<p class="text-muted">' . $siswa['no_telpon_ayah'] . '</p>'  ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <div class="col-sm-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><b><i class="fas fa-female"></i> Data Ibu</b></h3>
                            <div class="card-tools">
                                <?php if ($siswa['stat_pendaftaran'] == 0) { ?>
                                    <button type="button" class="btn btn-sm text-primary" data-toggle="modal" data-target="#ibu">
                                        <i class="fas fa-pencil-alt"></i></button>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <strong><i class="fas fa-user"></i> Nama Ibu</strong>
                                    <?= ($siswa['nama_ibu'] == null) ? '<p class="text-danger">Wajib Diisi!</p>' : '<p class="text-muted">' . $siswa['nama_ibu'] . '</p>'  ?>
                                    <strong><i class="fas fa-home"></i> Alamat</strong>
                                    <?= ($siswa['alamat_ibu'] == null) ? '<p class="text-danger">Wajib Diisi!</p>' : '<p class="text-muted">' . $siswa['alamat_ibu'] . '</p>'  ?>
                                </div>
                                <div class="col-sm-6">
                                    <strong><i class="fas fa-building"></i> Pekerjaan</strong>
                                    <?= ($siswa['pekerjaan_ibu'] == null) ? '<p class="text-danger">Wajib Diisi!</p>' : '<p class="text-muted">' . $siswa['pekerjaan_ibu'] . '</p>'  ?>
                                    <strong><i class="fas fa-mobile-alt"></i> Telp/Hp</strong>
                                    <?= ($siswa['no_telpon_ibu'] == null) ? '<p class="text-danger">Wajib Diisi!</p>' : '<p class="text-muted">' . $siswa['no_telpon_ibu'] . '</p>'  ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <div class="col-sm-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><b><i class="fas fa-Home"></i> Alamat Lengkap</b></h3>
                            <div class="card-tools">
                                <?php if ($siswa['stat_pendaftaran'] == 0) { ?>
                                    <button type="button" class="btn btn-sm text-primary" data-toggle="modal" data-target="#alamat">
                                        <i class="fas fa-pencil-alt"></i></button>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <strong><i class="fas fa-user"></i> Provinsi</strong>
                                    <?= ($siswa['nama_provinsi'] == null) ? '<p class="text-danger">Wajib Diisi!</p>' : '<p class="text-muted">' . $siswa['nama_provinsi'] . '</p>'  ?>
                                    <strong><i class="fas fa-home"></i> Kabupaten/Kota</strong>
                                    <?= ($siswa['nama_kabupaten'] == null) ? '<p class="text-danger">Wajib Diisi!</p>' : '<p class="text-muted">' . $siswa['nama_kabupaten'] . '</p>'  ?>
                                </div>
                                <div class="col-sm-6">
                                    <strong><i class="fas fa-home"></i> Kecamatan</strong>
                                    <?= ($siswa['nama_kecamatan'] == null) ? '<p class="text-danger">Wajib Diisi!</p>' : '<p class="text-muted">' . $siswa['nama_kecamatan'] . '</p>'  ?>
                                    <strong><i class="fas fa-building"></i> Alamat</strong>
                                    <?= ($siswa['alamat'] == null) ? '<p class="text-danger">Wajib Diisi!</p>' : '<p class="text-muted">' . $siswa['alamat'] . '</p>'  ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-sm-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-file"></i><b> Berkas Administrasi</b></h3>
                            <div class="card-tools">
                                <?php if ($siswa['stat_pendaftaran'] == 0) { ?>
                                    <button type="button" class="btn btn-sm text-primary" data-toggle="modal" data-target="#berkas">
                                        <i class="fas fa-plus text-info"></i> Add File</button>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>#</th>
                                    <th>Jenis File</th>
                                    <th>Keterangan</th>
                                    <th>File</th>
                                    <?php if ($siswa['stat_pendaftaran'] == 0) { ?>
                                        <th width="50px">Action</th>
                                    <?php } ?>
                                </tr>
                                <?php $no = 1;
                                foreach ($berkas as $key => $value) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value['lampiran'] ?></td>
                                        <td><?= $value['ket'] ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('berkas/' . $value['berkas']) ?>"><i class="fa fa-file-pdf fa-2x text-danger"></i></a>
                                        </td>
                                        <?php if ($siswa['stat_pendaftaran'] == 0) { ?>
                                            <td class="text-center">
                                                <a href="<?= base_url('Siswa/deleteBerkas/' . $value['id_berkas']) ?>" class="btn btn-xs btn-flat btn-danger"><i class="fas fa-trash"></i></a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>


<?= $this->endSection() ?>