<?= $this->extend('template/template-backend-admin') ?>
<?= $this->section('content') ?>

<script>
    function alphaOnly(event) {
        var key = event.keyCode;
        return ((event.keyCode >= 65 && event.keyCode <= 90) || event.keyCode == 8);
    };
</script>


<div class="col-sm-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><b>Formulir Pendaftaran Peseta Didik</b></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">



            <?php
            session()->getFlashdata('errors');
            if (session()->get('pesan')) {
                echo '<div class="alert alert-success">';
                echo session()->get('pesan');
                echo '</div>';
            } ?>

            <?php
            $errors = session()->getFlashdata('errors');
            if (!empty($errors)) { ?>
                <div class="alert alert-danger" role="alert">
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php } ?>


            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><b><i class="fas fa-align-justify"></i> Pendaftaran</b></h3>
                            <div class="card-tools">
                                <?php if ($siswa['stat_pendaftaran'] == 1) { ?>
                                    <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#editpendaftaran"><i class="fas fa-pencil-alt text-info"></i></button>
                                <?php } ?>
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
                                <?php if ($siswa['stat_pendaftaran'] == 1) { ?>
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
                                <p class="text-danger"><?= $validation->hasError('foto') ? $validation->getError('foto') : '' ?></p>
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
                                <?php if ($siswa['stat_pendaftaran'] == 1) { ?>
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
                                <?php if ($siswa['stat_pendaftaran'] == 1) { ?>
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
                                <?php if ($siswa['stat_pendaftaran'] == 1) { ?>
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
                                <?php if ($siswa['stat_pendaftaran'] == 1) { ?>
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
                                <?php if ($siswa['stat_pendaftaran'] == 1) { ?>
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
                                    <?php if ($siswa['stat_pendaftaran'] == 1) { ?>
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
                                        <?php if ($siswa['stat_pendaftaran'] == 1) { ?>
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

                <?php if ($siswa['stat_pendaftaran'] == 1) { ?>
                    <div class="col-sm-12">
                        <button class="btn btn-success btn-flat btn-block" data-toggle="modal" data-target="#apply"><i class="fas fa-check"></i> Apply Pendaftaran</button>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>





<!-- Modal Apply -->
<div class="modal fade" id="apply">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Apakah Anda Sudah Yakin..?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p>Data Yang Telah Dikirim Tidak dapat di Ganti !! <br>
                    Pastikan Data yang Anda Kirim Sudah Benar! </p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <a href="<?= base_url('Siswa/apply/' . $siswa['id_siswa']) ?>" type="submit" class="btn btn-primary btn-sm">Kirim</a>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Modal Pendaftaran -->
<div class="modal fade" id="editpendaftaran">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pendaftaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('siswa/updatependaftaran2/' . $siswa['id_siswa']) ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>NISN</label>
                    <input class="form-control" name="nisn" onkeypress="return event.keyCode >= 48 && event.keyCode <= 57" value="<?= $siswa['nisn'] ?>">
                </div>
                <div class="form-group">
                    <label>No Pendaftaran/Jurusan</label>
                    <input class="form-control" value="<?= $siswa['no_pendaftaran'] ?>/<?= $siswa['jurusan'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Tanggal Pendaftaran</label>
                    <input class="form-control" value="<?= $siswa['tgl_pendaftaran'] ?>" readonly>
                </div>

                <div class="form-group">
                    <label>Jalur Masuk</label>
                    <select name="id_jalur_masuk" class="form-control">
                        <option value="">--Pilih Jalur Masuk--</option>
                        <?php foreach ($jalur as $key => $value) { ?>
                            <option value="<?= $value['id_jalur_masuk'] ?>" <?= $siswa['id_jalur_masuk'] == $value['id_jalur_masuk'] ? 'selected' : '' ?>>
                                <?= $value['jalur_masuk'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Modal Foto -->
<div class="modal fade" id="foto">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Foto</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart('siswa/updateFoto2/' . $siswa['id_siswa']) ?>
            <div class="modal-body">
                <p class="text-danger">Max Foto 1024kb</p>
                <div class="form-group">
                    <label>Ganti Foto</label>
                    <input type="file" id="preview_gambar" class="form-control" name="foto" accept="image/*">
                </div>
                <div class="form-group">
                    <label>Preview</label> <br>
                    <?php if ($siswa['foto'] == null) { ?>
                        <img src="<?= base_url('foto/blank.jpg') ?>" width="140px" height="160px" id="gambar_load">
                    <?php } else { ?>
                        <img src="<?= base_url('foto/' . $siswa['foto']) ?>" width="140px" height="160px" id="gambar_load">
                    <?php } ?>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Modal Identitas Peserta Didik -->
<div class="modal fade" id="siswa">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Identitas Peserta Didik</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('siswa/updateIdentitasSiswa2/' . $siswa['id_siswa']) ?>
            <div class="modal-body">
                <dv class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input class="form-control" name="nama_lengkap" value="<?= $siswa['nama_lengkap'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input class="form-control" name="tempat_lahir" value="<?= $siswa['tempat_lahir'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input class="form-control" name="tgl_lahir" value="<?= $siswa['tgl_lahir'] ?>" type="text" id="datepicker">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jk" class="form-control">
                                <option value="L" <?= $siswa['jk'] == 'L' ? 'selected' : '' ?>>Laki-Laki</option>
                                <option value="P" <?= $siswa['jk'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Agama</label>
                            <select name="id_agama" class="form-control">
                                <option value="">--Pilih Agama--</option>
                                <?php foreach ($agama as $key => $value) { ?>
                                    <option value="<?= $value['id_agama'] ?>" <?= $siswa['id_agama'] == $value['id_agama'] ? 'selected' : '' ?>><?= $value['agama'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Telp/Hp</label>
                            <input class="form-control" name="no_telpon" value="<?= $siswa['no_telpon'] ?>" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Asal Sekolah</label>
                            <input class="form-control" name="asal_sekolah" value="<?= $siswa['asal_sekolah'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Tahun Lulus</label>
                            <input class="form-control" name="tahun_lulus" value="<?= $siswa['tahun_lulus'] ?>" required>
                        </div>
                    </div>
                </dv>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Modal Data Ayah -->
<div class="modal fade" id="ayah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Ayah</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('siswa/updateDataAyah2/' . $siswa['id_siswa']) ?>
            <div class="modal-body">
                <dv class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Nama Ayah</label>
                            <input class="form-control" name="nama_ayah" value="<?= $siswa['nama_ayah'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat Ayah</label>
                            <input class="form-control" name="alamat_ayah" value="<?= $siswa['alamat_ayah'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Pekerjaan Ayah</label>
                            <select name="pekerjaan_ayah" class="form-control">
                                <option value="0">--Pilih Pekerjaan--</option>
                                <?php foreach ($pekerjaan as $key => $value) { ?>
                                    <option value="<?= $value['pekerjaan'] ?>" <?= $siswa['pekerjaan_ayah'] == $value['pekerjaan'] ? 'selected' : '' ?>><?= $value['pekerjaan'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Telp/HP</label>
                            <input class="form-control" name="no_telpon_ayah" value="<?= $siswa['no_telpon_ayah'] ?>" required>
                        </div>
                    </div>
                </dv>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Modal Data Ibu -->
<div class="modal fade" id="ibu">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Ibu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('siswa/updateDataIbu2/' . $siswa['id_siswa']) ?>
            <div class="modal-body">
                <dv class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Nama Ibu</label>
                            <input class="form-control" name="nama_ibu" value="<?= $siswa['nama_ibu'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat Ibu</label>
                            <input class="form-control" name="alamat_ibu" value="<?= $siswa['alamat_ibu'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Pekerjaan Ibu</label>
                            <select name="pekerjaan_ibu" class="form-control">
                                <option value="">--Pilih Pekerjaan--</option>
                                <?php foreach ($pekerjaan as $key => $value) { ?>
                                    <option value="<?= $value['pekerjaan'] ?>" <?= $siswa['pekerjaan_ibu'] == $value['pekerjaan'] ? 'selected' : '' ?>><?= $value['pekerjaan'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Telp/HP</label>
                            <input class="form-control" name="no_telpon_ibu" value="<?= $siswa['no_telpon_ibu'] ?>" required>
                        </div>
                    </div>
                </dv>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Modal Alamat -->
<div class="modal fade" id="alamat">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Alamat Lengkap</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('siswa/updateDataAlamat2/' . $siswa['id_siswa']) ?>
            <div class="modal-body">
                <dv class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Provinsi</label>
                            <select name="id_provinsi" id="provinsi" class="form-control">
                                <option value="">--Pilih Provinsi--</option>
                                <?php foreach ($provinsi as $key => $value) { ?>
                                    <option value="<?= $value['id_provinsi'] ?>"><?= $value['nama_provinsi'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kabupaten/Kota</label>
                            <select name="id_kabupaten" id="kabupaten" class="form-control">
                                <option value="">--Pilih Kabupaten/Kota--</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kecamatan</label>
                            <select name="id_kecamatan" id="kecamatan" class="form-control">
                                <option value="">--Pilih Kecamatan--</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input name="alamat" class="form-control" placeholder="Alamat" required>
                        </div>
                    </div>
                </dv>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Modal Berkas -->
<div class="modal fade" id="berkas">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Berkas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart('siswa/AddBerkas2/' . $siswa['id_siswa']) ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Lampiran</label>
                    <select name="id_lampiran" id="provinsi" class="form-control">
                        <option value="">--Pilih Lampiran--</option>
                        <?php foreach ($lampiran as $key => $value) { ?>
                            <option value="<?= $value['id_lampiran'] ?>"><?= $value['lampiran'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <input class="form-control" name="ket" placeholder="Keterangan" required>
                </div>
                <div class="form-group">
                    <label>Berkas (Format File Wajib .PDF)</label>
                    <input type="file" class="form-control" name="berkas" accept=".pdf" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- jQuery -->
<script src="<?= base_url() ?>/AdminLTE/plugins/jquery/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $("#provinsi").change(function() {
            var id_provinsi = $("#provinsi").val();
            $.ajax({
                type: 'GET',
                url: '<?= base_url('Wilayah/dataKabupaten') ?>/' + id_provinsi,
                success: function(html) {
                    $("#kabupaten").html(html);
                }
            });
        });
    });

    $(document).ready(function() {
        $("#kabupaten").change(function() {
            var id_kabupaten = $("#kabupaten").val();
            $.ajax({
                type: 'GET',
                url: '<?= base_url('Wilayah/dataKecamatan') ?>/' + id_kabupaten,
                success: function(html) {
                    $("#kecamatan").html(html);
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>