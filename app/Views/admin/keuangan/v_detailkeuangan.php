<?= $this->extend('template/template-backend-admin') ?>
<?= $this->section('content') ?>

<?php if ($siswa['stat_ppdb'] = 1) { ?>
    <div class="col-sm-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= $subtitle ?></h3>
            </div>
            <div class="card-body p-0">

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="70px">#</th>
                            <th>No Pendaftaran</th>
                            <th>Tahun</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Jalur Masuk</th>
                            <th>Formulir</th>
                            <th>DPSP</th>
                            <th>DPS</th>
                            <th>BOPP</th>
                            <th>Potongan</th>
                            <th>Total</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data as $key => $value) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['no_pendaftaran'] ?></td>
                                <td><label class="badge badge-success"><?= $value['tahun'] ?></label></td>
                                <td><?= $value['nisn'] ?></td>
                                <td><?= $value['nama_lengkap'] ?></td>
                                <td><label class="badge badge-warning"><?= $value['jalur_masuk'] ?></label></td>
                                <td><?= rupiah($value['formulir']) ?></td>
                                <td><?= rupiah($value['dpsp']) ?></td>
                                <td><?= rupiah($value['dps']) ?></td>
                                <td><?= rupiah($value['bopp']) ?></td>
                                <td>
                                    <ul class="ml-1 pl-1">
                                        <?php foreach ($value['potongan'] as $x) { ?>
                                            <li>
                                                <?= $x->type; ?>
                                                (
                                                <?php
                                                if ($x->potongan == 100) {
                                                    echo "Free";
                                                } else {
                                                    echo $x->potongan . "%";
                                                }
                                                ?>
                                                )
                                            </li>

                                        <?php } ?>
                                    </ul>
                                </td>
                                <td>
                                    <?php
                                    $total = 0;
                                    foreach ($value['potongan'] as $x) {

                                        if ($x->type == 'formulir') {
                                            $total += intval($value['formulir'] - ($value['formulir'] * 50 / 100));
                                        }
                                        if ($x->type == 'dpsp') {
                                            $total += intval($value['dpsp'] - (($value['dpsp'] * 50) / 100));
                                        }
                                    }
                                    echo rupiah($total);
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>

<?= $this->endSection() ?>