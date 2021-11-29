<?= $this->extend('template/template-backend-admin') ?>
<?= $this->section('content') ?>

<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <form class="row" method="POST" action="/pendaftaransiswa/editkeuangan/<?php echo $ppdb[0]['id_siswa'] ?>">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">FORMULIR</label>
                        <select class="form-control" name="formulir1">
                            <option value="" selected disabled>Status Pembayaran</option>
                            <option value="Lunas" <?php if ($ppdb[0]['stat_formulir'] == 'Lunas') {
                                                        echo "selected";
                                                    } ?>>Lunas</option>
                            <option value="Belum Lunas" <?php if ($ppdb[0]['stat_formulir'] == 'Belum Lunas') {
                                                            echo "selected";
                                                        } ?>>Belum Lunas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">DPSP</label>
                        <select name="dpsp1" class="form-control">
                            <option value="" selected disabled>Status Pembayaran</option>
                            <option value="Lunas" <?php if ($ppdb[0]['stat_dpsp'] == 'Lunas') {
                                                        echo "selected";
                                                    } ?>>Lunas</option>
                            <option value="Belum Lunas" <?php if ($ppdb[0]['stat_dpsp'] == 'Belum Lunas') {
                                                            echo "selected";
                                                        } ?>>Belum Lunas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">DPS</label>
                        <select name="dps1" class="form-control">
                            <option value="" selected disabled>Status Pembayaran</option>
                            <option value="Lunas" <?php if ($ppdb[0]['stat_dps'] == 'Lunas') {
                                                        echo "selected";
                                                    } ?>>Lunas</option>
                            <option value="Belum Lunas" <?php if ($ppdb[0]['stat_dps'] == 'Belum Lunas') {
                                                            echo "selected";
                                                        } ?>>Belum Lunas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">BOPP</label>
                        <select name="bopp" class="form-control">
                            <option value="" selected disabled>Status Pembayaran</option>
                            <option value="Lunas" <?php if ($ppdb[0]['stat_bopp'] == 'Lunas') {
                                                        echo "selected";
                                                    } ?>>Lunas</option>
                            <option value="Belum Lunas" <?php if ($ppdb[0]['stat_bopp'] == 'Belum Lunas') {
                                                            echo "selected";
                                                        } ?>>Belum Lunas</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">FORMULIR</label>
                        <input type="text" value="<?= $ppdb[0]['pemb_formulir'] ?>" class="form-control" name="formulir">
                    </div>
                    <div class="form-group">
                        <label for="">DPSP</label>
                        <input type="text" value="<?= $ppdb[0]['pemb_dpsp'] ?>" class="form-control" name="dpsp">
                    </div>
                    <div class="form-group">
                        <label for="">DPS</label>
                        <input type="text" value="<?= $ppdb[0]['pemb_dps'] ?>" class="form-control" name="dps">
                    </div>
                    <div class="form-group">
                        <label for="">BOPP</label>
                        <input type="text" value="<?= $ppdb[0]['pemb_bopp'] ?>" class="form-control" name="bopp">
                    </div>
                </div>
            </form>
            <form method="POST" action="/pendaftaransiswa/tglkeuangan/<?php echo $ppdb[0]['id_siswa'] ?>" class="col-md-6 mt-4 bg-light p-3 rounded">
                <h5>Tanggal Pembayaran</h5>
                <div class="form-group">
                    <label for="">Tipe</label>
                    <select class="form-control" name="tipe">
                        <option value="" selected disabled>Tipe</option>
                        <option value="formulir">Formulir</option>
                        <option value="dpps">DPSP</option>
                        <option value="dps">DPS</option>
                        <option value="bopp">BOPP</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Tanggal Pembayaran</label>
                    <input type="date" name="tanggal" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Jumlah yang dibayarkan</label>
                    <input type="text" name="total" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>




        </div>
    </div>
</div>



<?= $this->endSection() ?>