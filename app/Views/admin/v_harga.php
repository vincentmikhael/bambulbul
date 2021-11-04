<?= $this->extend('template/template-backend-admin') ?>
<?= $this->section('content') ?>
<div class="col-sm-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Daftar <?= $subtitle ?></h3>
            <div class="card-tools">
                <button class="btn btn-flat btn-primary btn-xs" data-toggle="modal" data-target="#add"><i class="fas fa-plus"></i> Add</button>
            </div>
        </div>
        <div class="card-body p-0">
            <?php
            if (session()->getFlashdata('tambah')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('tambah');
                echo '</h5></div>';
            }

            if (session()->getFlashdata('edit')) {
                echo '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('edit');
                echo '</h5></div>';
            }

            if (session()->getFlashdata('delete')) {
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('delete');
                echo '</h5></div>';
            }

            ?>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th width="70px">#</th>
                        <th>Jalur Masuk</th>
                        <th>Formulir</th>
                        <th>DPSP</th>
                        <th>DPS</th>
                        <th>BOPP</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($harga as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['jalur_masuk'] ?></td>
                            <td><?= $value['formulir'] ?></td>
                            <td><?= $value['dpsp'] ?></td>
                            <td><?= $value['dps'] ?></td>
                            <td><?= $value['bopp'] ?></td>
                            <td><button class="btn btn-flat btn-warning btn-xs" data-toggle="modal" data-target="#edit<?= $value['id_harga'] ?>"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-flat btn-danger btn-xs" data-toggle="modal" data-target="#delete<?= $value['id_harga'] ?>"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Harga</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('harga/insertData') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Jalur Masuk</label>
                    <select name="id_jalur_masuk" class="form-control">
                        <option value="0">--Pilih Jalur Masuk--</option>
                        <?php foreach ($jalur as $key => $value) { ?>
                            <option value="<?= $value['id_jalur_masuk'] ?>"><?= $value['jalur_masuk'] ?></option>
                        <?php } ?>
                    </select>
                    <label>Formulir</label>
                    <input name="formulir" class="form-control" placeholder="formulir" required>
                    <label>DPSP</label>
                    <input name="dpsp" class="form-control" placeholder="dpsp" required>
                    <label>DPS</label>
                    <input name="dps" class="form-control" placeholder="dps" required>
                    <label>BOPP</label>
                    <input name="bopp" class="form-control" placeholder="bopp" required>
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

<!-- Modal Edit -->
<?php foreach ($harga as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_harga'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Harga</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('harga/editData/' . $value['id_harga']) ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Jalur Masuk</label>
                        <input name="jalur_masuk" value="<?= $value['jalur_masuk'] ?>" class="form-control" placeholder="jalur_masuk" readonly>
                        <label>Formulir</label>
                        <input name="formulir" value="<?= $value['formulir'] ?>" class="form-control" placeholder="formulir" required>
                        <label>DPSP</label>
                        <input name="dpsp" value="<?= $value['dpsp'] ?>" class="form-control" placeholder="dpsp" required>
                        <label>DPS</label>
                        <input name="dps" value="<?= $value['dps'] ?>" class="form-control" placeholder="dps" required>
                        <label>BOPP</label>
                        <input name="bopp" value="<?= $value['bopp'] ?>" class="form-control" placeholder="bopp" required>
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
<?php } ?>

<!-- Modal Delete -->
<?php foreach ($harga as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_harga'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Harga</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda Ingin Menghapus Data <b><?= $value['id_harga'] ?></b> ?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('harga/deleteData/' . $value['id_harga']) ?>" class="btn btn-danger btn-sm">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<?= $this->endSection() ?>