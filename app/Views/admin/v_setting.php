<?= $this->extend('template/template-backend-admin') ?>
<?= $this->section('content') ?>
<div class="col-sm-12">
    <?php
    if (session()->getFlashdata('pesan')) {
        echo '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i>';
        echo session()->getFlashdata('pesan');
        echo '</h5></div>';
    }
    ?>
</div>
<div class="col-sm-4">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Logo</h3>
        </div>
        <div class="card-body">
            <?php echo form_open_multipart('admin/saveSetting') ?>
            <div class="text-center">
                <img id="gambar_load" class="img-fluid pad" src="<?= base_url('logo/' . $setting['logo']) ?>" width="250px" height="250px">
            </div>
            <div class="from-group">
                <label>Ganti Logo</label>
                <input id="preview_gambar" name="logo" type="file" class="from-control" accept="image/*">
            </div>
        </div>
    </div>
</div>

<div class="col-sm-8">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Sekolah</h3>
        </div>
        <div class="card-body">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="from-group">
                            <label>Nama Sekolah</label><br>
                            <input name="nama_sekolah" value="<?= $setting['nama_sekolah'] ?>" class="from-control">
                        </div>
                        <div class="from-group">
                            <label>No Telpn</label><br>
                            <input name="no_telpon" value="<?= $setting['no_telpon'] ?>" class="from-control">
                        </div>
                        <div class="from-group">
                            <label>Email</label><br>
                            <input name="email" value="<?= $setting['email'] ?>" class="from-control">
                        </div>
                        <div class="from-group">
                            <label>Web</label><br>
                            <input name="web" value="<?= $setting['web'] ?>" class="from-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="from-group">
                            <label>Alamat Sekolah</label><br>
                            <input name="alamat" value="<?= $setting['alamat'] ?>" class="from-control">
                        </div>
                        <div class="from-group">
                            <label>Kecamatan</label><br>
                            <input name="kecamatan" value="<?= $setting['kecamatan'] ?>" class="from-control">
                        </div>
                        <div class="from-group">
                            <label>Kabupaten/Kota</label><br>
                            <input name="kabupaten" value="<?= $setting['kabupaten'] ?>" class="from-control">
                        </div>
                        <div class="from-group">
                            <label>Provinsi</label><br>
                            <input name="provinsi" value="<?= $setting['provinsi'] ?>" class="from-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Deskripsi Sekolah</h3>
        </div>
        <div class="card-body">
            <div class="from-group">
                <textarea name="deskripsi" rows="5" cols="100%" class="from-control"><?= $setting['deskripsi'] ?></textarea>
            </div>
        </div>
        <div class="card-body">
            <button type="submit" class="btn btn-flat btn-primary"><i class="fas fa-save"></i> Simpan</button>
        </div>
    </div>
</div>
<?php echo form_close() ?>
<?= $this->endSection() ?>