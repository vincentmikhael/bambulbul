<?= $this->extend('template/template-backend-admin') ?>
<?= $this->section('content') ?>

<?php if ($siswa['stat_ppdb'] = 1) { ?>
    <div class="col-sm-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= $subtitle ?></h3>
                <div class="card-tools">
                    <a href="<?= base_url('PendaftaranSiswa/listMasukKeuangan') ?>" class="btn btn-sm btn-primary btn-flat"><i class="fas fa-forward"> Kembali</i></a>
                </div>
            </div>
            <div class="card-body p-0">

                <table class="table table-bordered table-striped">

                    <thead>
                        <tr>
                            <th width="70px">#</th>
                            <th>No Pendaftaran</th>
                            <th>Tahun</th>
                            <th>Nama</th>
                            <th>Jalur Masuk</th>
                            <th>Formulir</th>
                            <th>DPSP</th>
                            <th>DPS</th>
                            <th>BOPP</th>
                            <th>Potongan</th>
                            <th>Total</th>
                            <th>Piutang</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data as $key => $value) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['no_pendaftaran'] ?></td>
                                <td><label class="badge badge-success"><?= $value['tahun'] ?></label></td>
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
                                    $tipe = [];
                                    if (count($value['potongan']) > 0) {
                                        foreach ($value['potongan'] as $x) {
                                            if ($x->type == 'formulir') {
                                                $total += intval($value['formulir'] - ($value['formulir'] * $x->potongan / 100));
                                            }
                                            if ($x->type == 'dpsp') {
                                                $total += intval($value['dpsp'] - (($value['dpsp'] * $x->potongan) / 100));
                                            }
                                            if ($x->type == 'dps') {
                                                $total += intval($value['dps'] - (($value['dps'] * $x->potongan) / 100));
                                            }
                                            if ($x->type == 'bopp') {
                                                $total += intval($value['bopp'] - (($value['bopp'] * $x->potongan) / 100));
                                            }

                                            $tipe[] = $x->type;
                                        }


                                        if (in_array("formulir", $tipe)) {
                                        } else {
                                            $total += $value['formulir'];
                                        }
                                        if (in_array("dpsp", $tipe)) {
                                        } else {
                                            $total += $value['dpsp'];
                                        }
                                        if (in_array("dps", $tipe)) {
                                        } else {
                                            $total += $value['dps'];
                                        }
                                        if (in_array("bopp", $tipe)) {
                                        } else {
                                            $total += $value['bopp'];
                                        }
                                    } else {
                                        $total = intval($value['formulir']) + intval($value['dpsp']) + intval($value['dps']) + intval($value['bopp']);
                                    }

                                    echo rupiah($total);
                                    ?>
                                </td>
                                <td>
                                    PIUTANG
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