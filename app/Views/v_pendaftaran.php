<?= $this->extend('template/template-frontend') ?>
<?= $this->section('content') ?>
<script>
    function alphaOnly(event) {
        var key = event.keyCode;
        return ((event.keyCode >= 65 && event.keyCode <= 90) || event.keyCode == 8);
    };
</script>
<?php if (!empty($ta)) { ?>
    <div class="col-sm-5">
        <img class="img-fluid pad" src="<?= base_url('logo/register.png') ?>" alt="">
    </div>
    <div class="col-sm-7">
        <?php echo form_open('Pendaftaran/simpanPendaftaran') ?>
        <div class="col-md-12 col-sm-12 col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h5 class="card-title"><b>Pendaftaran</b></h5>
                </div>
                <div class="card-body">

                    <?php session()->getFlashdata('errors');
                    if (session()->getFlashdata('pesan')) {
                        echo '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i>';
                        echo session()->getFlashdata('pesan');
                        echo '</h5></div>';
                    }
                    ?>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Jalur Masuk</label>
                            <select name="id_jalur_masuk" class="form-control">
                                <option value="0">--Pilih Jalur Masuk--</option>
                                <?php foreach ($jalur as $key => $value) { ?>
                                    <option value="<?= $value['id_jalur_masuk'] ?>"><?= $value['jalur_masuk'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input name="nama_lengkap" value="<?= old('nama_lengkap') ?>" class="form-control" placeholder="Nama Lengkap">
                            <p class="text-danger"><?= $validation->hasError('nama_lengkap') ? $validation->getError('nama_lengkap') : '' ?></p>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input name="tempat_lahir" value="<?= old('tempat_lahir') ?>" class="form-control" placeholder="Tempat Lahir">
                            <p class="text-danger"><?= $validation->hasError('tempat_lahir') ? $validation->getError('tempat_lahir') : '' ?></p>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <select name="tanggal" value="<?= old('tanggal') ?>" class="form-control">
                                        <option value="">--Tanggal--</option>
                                        <?php
                                        for ($i = 01; $i <= 31; $i++) { ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>;
                                        <?php } ?>
                                    </select>
                                    <p class="text-danger"><?= $validation->hasError('tanggal') ? $validation->getError('tanggal') : '' ?></p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Bulan</label>
                                    <select name="bulan" value="<?= old('bulan') ?>" class="form-control">
                                        <option value="">--Bulan--</option>
                                        <?php
                                        for ($i = 1; $i <= 12; $i++) { ?>
                                            <option value="<?= $i ?>"> <?= $i ?></option>;
                                        <?php } ?>
                                    </select>
                                    <p class="text-danger"><?= $validation->hasError('bulan') ? $validation->getError('bulan') : '' ?></p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <select name="tahun" value="<?= old('tahun') ?>" class="form-control">
                                        <option value="">--Tahun--</option>
                                        <?php $now = date('Y');
                                        for ($i = 1990; $i <= $now; $i++) { ?>
                                            <option value="<?= $i ?>"> <?= $i ?></option>;
                                        <?php } ?>
                                    </select>
                                    <p class="text-danger"><?= $validation->hasError('tahun') ? $validation->getError('tahun') : '' ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>No Telp</label>
                            <input name="no_telpon" onkeypress="return event.keyCode >= 48 && event.keyCode <= 57" value="<?= old('no_telpon') ?>" class="form-control" placeholder="No HP/WA">
                            <p class="text-danger"><?= $validation->hasError('no_telpon') ? $validation->getError('no_telpon') : '' ?></p>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jk" class="form-control">
                                        <option value="">--Pilih Jenis Kelamin--</option>
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    <p class="text-danger"><?= $validation->hasError('jk') ? $validation->getError('jk') : '' ?></p>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Jurusan</label>
                                    <select name="id_jurusan" class="form-control">
                                        <option value="0">--Pilih Jurusan--</option>
                                        <?php foreach ($jurusan as $key => $value) { ?>
                                            <option value="<?= $value['id_jurusan'] ?>"><?= $value['jurusan'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Info Pendaftar</label>
                                    <select name="id_kuisioner" class="form-control">
                                        <option value="0">--Pilih Opsi--</option>
                                        <?php foreach ($kuisioner as $key => $value) { ?>
                                            <option value="<?= $value['id_kuisioner'] ?>"><?= $value['kuisioner'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-12">
                        <button type="submit" class="btn btn-info btn-flat btn-block"><i class="fas fa-save"></i> Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close() ?>
<?php } else { ?>
    <div class="col-sm-12">
        <div class="alert alert-danger alert-dismissible">
            <h5><i class="icon fas fa-exclamation-triangle"></i> Pemberitahuan!</h5>
            Untuk saat ini pendaftaran telah kami tutup.
            Terimakasih.
        </div>
    </div>
<?php } ?>

<?= $this->endSection() ?>