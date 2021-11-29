<?= $this->extend('template/template-backend-admin') ?>
<?= $this->section('content') ?>

<!-- User Admin -->

<?php if (session()->get('nama_user') == 'Admin') { ?>

    <div class="col-lg-4 col-4">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $totjurusan ?></h3>

                <p>Jurusan</p>
            </div>
            <div class="icon">
                <i class="fas fa-people-arrows"></i>
            </div>
            <a href="<?= base_url('jurusan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-4 col-4">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?= $totpekerjaan ?></h3>

                <p>Pekerjaan</p>
            </div>
            <div class="icon">
                <i class="fa fa-suitcase"></i>
            </div>
            <a href="<?= base_url('pekerjaan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-4 col-4">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $totagama ?></h3>

                <p>Agama</p>
            </div>
            <div class="icon">
                <i class="fas fa-book"></i>
            </div>
            <a href="<?= base_url('agama') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-4 col-4">
        <!-- small box -->
        <div class="small-box bg-orange">
            <div class="inner">
                <h3><?= $totuser ?></h3>

                <p>User</p>
            </div>
            <div class="icon">
                <i class="fas fa-user"></i>
            </div>
            <a href="<?= base_url('user') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-4 col-4">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $totlistmasuk ?></h3>
                <p>List Masuk</p>
            </div>
            <div class="icon">
                <i class="fas fa-info"></i>
            </div>
            <a href="<?= base_url('Pendaftaransiswa/ListMasuk') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-4 col-4">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $totpendaftarmasuk ?></h3>

                <p>Pendaftar Masuk</p>
            </div>
            <div class="icon">
                <i class="fas fa-download"></i>
            </div>
            <a href="<?= base_url('Pendaftaransiswa') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-4 col-4">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $totpendaftarditerima ?></h3>

                <p>Pendaftar Diterima</p>
            </div>
            <div class="icon">
                <i class="fas fa-check"></i>
            </div>
            <a href="<?= base_url('pendaftaransiswa/listDiterima') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-4 col-4">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?= $totpendaftarditolak ?></h3>

                <p>Pendaftar Ditolak</p>
            </div>
            <div class="icon">
                <i class="fas fa-times"></i>
            </div>
            <a href="<?= base_url('pendaftaransiswa/listDitolak') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    <?php } ?>

    <!-- User Marketing -->

    <?php if (session()->get('nama_user') == 'Marketing') { ?>

        <div class="col-lg-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?= $totlistmasuk ?></h3>
                    <p>List Masuk</p>
                </div>
                <div class="icon">
                    <i class="fas fa-info"></i>
                </div>
                <a href="<?= base_url('Pendaftaransiswa/ListMasuk') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?= $totpendaftarmasuk ?></h3>
                    <p>Pendaftar Masuk</p>
                </div>
                <div class="icon">
                    <i class="fas fa-download"></i>
                </div>
                <a href="<?= base_url('Pendaftaransiswa') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?= $totpendaftarditerima ?></h3>
                    <p>Pendaftar Diterima</p>
                </div>
                <div class="icon">
                    <i class="fas fa-check"></i>
                </div>
                <a href="<?= base_url('pendaftaransiswa/listDiterima') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?= $totpendaftarditolak ?></h3>
                    <p>Pendaftar Ditolak</p>
                </div>
                <div class="icon">
                    <i class="fas fa-times"></i>
                </div>
                <a href="<?= base_url('pendaftaransiswa/listDitolak') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>



    <?php } ?>

    <!-- User Keuangan -->
    <?php if (session()->get('nama_user') == 'Keuangan') { ?>

        <div class="col-lg-12">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>Rp. <?= rupiah(array_sum(array_column($pendapatan, 'total'))) ?></h3>
                    <p>Pendapatan Masuk</p>
                </div>
                <div class="icon">
                    <i class="fas fa-coins"></i>
                </div>
            </div>
        </div>


    <?php } ?>

    <?= $this->endSection() ?>