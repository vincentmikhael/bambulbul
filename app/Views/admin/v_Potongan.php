<?= $this->extend('template/template-backend-admin') ?>
<?= $this->section('content') ?>




<form method="post" action="potongan/insertData" class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label class="col-form-label" for="inputSuccess">Potongan</label>
            <input name="potongan" type="text" class="form-control" id="inputSuccess" placeholder="Enter ...">
        </div>
    </div>
    <div class="col-sm-12 ">
        <!-- select -->
        <div class="form-group">
            <label>Type</label>
            <select name="type" class="form-control">
                <option value="formulir">Formulir</option>
                <option value="dpsp">DPSP</option>
                <option value="dps">DPS</option>
                <option value="bopp">BOPP</option>
            </select>
        </div>
    </div>
    <div class="col-sm-12">
        <!-- select -->
        <div class="form-group">
            <label>Jalur Masuk</label>
            <select name="id_jalur_masuk" class="form-control">
                <option value="" selected disabled>Pilih Jalur Masuk</option>
                <?php foreach ($jalur as $value) : ?>
                    <option value="<?php echo $value['id_jalur_masuk'] ?>"><?php echo $value['jalur_masuk'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="col-sm-12">
        <!-- select -->
        <div class="">
            <button class="btn btn-flat btn-success">Tambah</button>
        </div>
    </div>
</form>

<table class="table mt-5 table-bordered">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Potongan</th>
            <th>Type</th>
            <th>Jalur Masuk</th>
            <th style="width: 40px">Action</th>
        </tr>
    </thead>
    <?php $no = 1;
    foreach ($potongan as $key => $value) { ?>
        <tbody>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $value['potongan'] ?></td>
                <td><?= $value['type'] ?></td>
                <td>
                    <?php foreach ($jalur as $v) : ?>
                        <?php if ($v['id_jalur_masuk'] == $value['id_jalur_masuk']) : ?>
                            <?= $v['jalur_masuk'] ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </td>
                <td class="d-flex">
                    <button class="btn mr-3 btn-flat btn-warning btn-xs" data-toggle="modal" data-target="#edit<?= $value['id'] ?>"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-flat btn-danger btn-xs" data-toggle="modal" data-target="#delete<?= $value['id'] ?>"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
</table>

<!-- Modal Edit -->
<?php foreach ($potongan as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Potongan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('potongan/editData/' . $value['id']) ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Potongan</label>
                        <input name="potongan" value="<?= $value['potongan'] ?>" class="form-control" placeholder="Potongan" required>
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select name="type" class="form-control" placeholder="Type" required>
                            <option value="" disabled>Pilih Type</option>
                            <option value="formulir" <?php if ($value['type'] == 'formulir') : ?>selected <?php endif; ?>>Formulir</option>
                            <option value="dpsp" <?php if ($value['type'] == 'dpsp') : ?>selected <?php endif; ?>>DPSP</option>
                            <option value="dps" <?php if ($value['type'] == 'dps') : ?>selected <?php endif; ?>>DPS</option>
                            <option value="bopp" <?php if ($value['type'] == 'bopp') : ?>selected <?php endif; ?>>BOPP</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jalur Masuk</label>
                        <select name="id_jalur_masuk" value="<?= $value['id_jalur_masuk'] ?>" class="form-control" placeholder="Jalur Masuk" required>
                            <option value="" selected disabled>Pilih Jalur Masuk</option>
                            <?php foreach ($jalur as $z) : ?>
                                <option value="<?php echo $z['id_jalur_masuk'] ?>" <?php if ($z['id_jalur_masuk'] == $value['id_jalur_masuk']) : ?>selected <?php endif; ?>><?php echo $z['jalur_masuk'] ?></option>
                            <?php endforeach; ?>
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
<?php } ?>

<!-- modal delete -->
<?php foreach ($potongan as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Potongan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <b>Apakah Anda Ingin Menghapus ?</b>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('potongan/deleteData/' . $value['id']) ?>" class="btn btn-danger btn-sm">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<?= $this->endSection() ?>