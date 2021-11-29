<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?> | <?= $subtitle ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/dist/css/adminlte.min.css">
</head>

<body>
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <img src="<?= base_url() ?>/logo/<?= $setting['logo'] ?>" alt="AdminLTE Logo" width="120px" height="120px">

                                    <small class="float-right"><?= $now = date('d-m-Y') ?></small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-8 invoice-col">
                                <address>
                                    <strong> SMK PUTRA INDONESIA MALANG</strong><br>
                                    <strong> BARITO NO.5, KELURAHAN BUNULREJO, KECAMATAN BLIMBING, KOTA MALANG</strong><br>
                                    <strong> TELEPON (0341) 491132, 492052 FAXIMILIE (0341) 485411</strong><br>
                                </address>
                            </div>
                            <!-- /.col -->

                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Pembayaran : (<?= $_GET['tipe'] ?>)</b><br>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->



                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12">
                                <style type="text/css">
                                    .tg {
                                        border: none;
                                        border-collapse: collapse;
                                        border-spacing: 0;
                                    }

                                    .tg td {
                                        border-style: solid;
                                        border-width: 0px;
                                        font-family: Arial, sans-serif;
                                        font-size: 14px;
                                        overflow: hidden;
                                        padding: 9px 20px;
                                        word-break: normal;
                                    }

                                    .tg th {
                                        border-style: solid;
                                        border-width: 0px;
                                        font-family: Arial, sans-serif;
                                        font-size: 14px;
                                        font-weight: normal;
                                        overflow: hidden;
                                        padding: 9px 20px;
                                        word-break: normal;
                                    }

                                    .tg .tg-j1i3 {
                                        border-color: inherit;
                                        position: -webkit-sticky;
                                        position: sticky;
                                        text-align: left;
                                        top: -1px;
                                        vertical-align: top;
                                        will-change: transform
                                    }

                                    .tg .tg-0pky {
                                        border-color: inherit;
                                        text-align: left;
                                        vertical-align: top
                                    }

                                    .tg-sort-header::-moz-selection {
                                        background: 0 0
                                    }

                                    .tg-sort-header::selection {
                                        background: 0 0
                                    }

                                    .tg-sort-header {
                                        cursor: pointer
                                    }

                                    .tg-sort-header:after {
                                        content: '';
                                        float: right;
                                        margin-top: 7px;
                                        border-width: 0 5px 5px;
                                        border-style: solid;
                                        border-color: #404040 transparent;
                                        visibility: hidden
                                    }

                                    .tg-sort-header:hover:after {
                                        visibility: visible
                                    }

                                    .tg-sort-asc:after,
                                    .tg-sort-asc:hover:after,
                                    .tg-sort-desc:after {
                                        visibility: visible;
                                        opacity: .4
                                    }

                                    .tg-sort-desc:after {
                                        border-bottom: none;
                                        border-width: 5px 5px 0
                                    }

                                    @media screen and (max-width: 767px) {
                                        .tg {
                                            width: auto !important;
                                        }

                                        .tg col {
                                            width: auto !important;
                                        }

                                        .tg-wrap {
                                            overflow-x: auto;
                                            -webkit-overflow-scrolling: touch;
                                        }
                                    }
                                </style>

                                <table id="tg-t9Wmh" class="tg">
                                    <thead>
                                        <tr>
                                            <th class="tg-j1i3" colspan="13"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky">NOMOR PENDAFTARAN</td>
                                            <td class="tg-0pky">:</td>
                                            <td class="tg-0pky"><?= $siswa['no_pendaftaran'] ?></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky">NAMA PENDAFTAR</td>
                                            <td class="tg-0pky">:</td>
                                            <td class="tg-0pky"><?= $siswa['nama_lengkap'] ?></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky">PROGRAM KEAHLIAN</td>
                                            <td class="tg-0pky">:</td>
                                            <td class="tg-0pky"><?= $siswa['jurusan'] ?></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky">BANYAKNYA UANG</td>
                                            <td class="tg-0pky">:</td>
                                            <!-- <td class="tg-0pky"><?= rupiah($total->dpsp + $total->dps + $total->bopp) ?></td> -->
                                            <td class="tg-0pky">
                                                <?php

                                                $azz = 0;
                                                $tipe = [];

                                                foreach ($potongan as $x) {
                                                    if ($x->type == 'formulir') {
                                                        $azz += intval($total->formulir - ($total->formulir * $x->potongan / 100));
                                                    }
                                                    if ($x->type == 'dpsp') {
                                                        $azz += intval($total->dpsp - (($total->dpsp * $x->potongan) / 100));
                                                    }
                                                    if ($x->type == 'dps') {
                                                        $azz += intval($total->dps - (($total->dps * $x->potongan) / 100));
                                                    }
                                                    if ($x->type == 'bopp') {
                                                        $azz += intval($total->bopp - (($total->bopp * $x->potongan) / 100));
                                                    }

                                                    $tipe[] = $x->type;
                                                }


                                                if (in_array("formulir", $tipe)) {
                                                } else {
                                                    $azz += $total->formulir;
                                                }
                                                if (in_array("dpsp", $tipe)) {
                                                } else {
                                                    $azz += $total->dpsp;
                                                }
                                                if (in_array("dps", $tipe)) {
                                                } else {
                                                    $azz += $total->dps;
                                                }
                                                if (in_array("bopp", $tipe)) {
                                                } else {
                                                    $azz += $total->bopp;
                                                }

                                                echo rupiah($azz);
                                                ?>
                                            </td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky">RINCIAN PEMBIAYAAN</td>
                                            <td class="tg-0pky">:</td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky">DPSP<br></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky">:</td>
                                            <td class="tg-0pky"><?= $_GET['tipe'] == 'dpsp' ? rupiah($_GET['uang']) : '-' ?></td>
                                            <td class="tg-0pky"></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky">DANA PERLENGKAPAN SISWA</td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky">:</td>
                                            <td class="tg-0pky"><?= $_GET['tipe'] == 'dps' ? rupiah($_GET['uang']) : '-' ?><br></td>
                                            <td class="tg-0pky"></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky">BOPP</td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky">:</td>
                                            <td class="tg-0pky"><?= $_GET['tipe'] == 'bopp' ? rupiah($_GET['uang']) : '-' ?></td>
                                            <td class="tg-0pky"></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky">formulir</td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky">:</td>
                                            <td class="tg-0pky"><?= $_GET['tipe'] == 'formulir' ? rupiah($_GET['uang']) : '-' ?></td>
                                            <td class="tg-0pky"></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky">TOTAL</td>
                                            <td class="tg-0pky">:</td>
                                            <td class="tg-0pky"><?= terbilang($_GET['uang']) ?> rupiah</td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky">Pembayar</td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky">MALANG, <?= $now = date('d-m-Y') ?></td>
                                            <td class="tg-0pky"></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"><?= $siswa['nama_lengkap'] ?></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky">(......................................................)</td>
                                            <td class="tg-0pky"></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky"></td>
                                            <td class="tg-0pky" colspan="11"></td>
                                            <td class="tg-0pky"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->

                            <!-- /.col -->

                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->

                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/AdminLTE/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>/AdminLTE/dist/js/demo.js"></script>
</body>

</html>

<script charset="utf-8">
    var TGSort = window.TGSort || function(n) {
        "use strict";

        function r(n) {
            return n ? n.length : 0
        }

        function t(n, t, e, o = 0) {
            for (e = r(n); o < e; ++o) t(n[o], o)
        }

        function e(n) {
            return n.split("").reverse().join("")
        }

        function o(n) {
            var e = n[0];
            return t(n, function(n) {
                for (; !n.startsWith(e);) e = e.substring(0, r(e) - 1)
            }), r(e)
        }

        function u(n, r, e = []) {
            return t(n, function(n) {
                r(n) && e.push(n)
            }), e
        }
        var a = parseFloat;

        function i(n, r) {
            return function(t) {
                var e = "";
                return t.replace(n, function(n, t, o) {
                    return e = t.replace(r, "") + "." + (o || "").substring(1)
                }), a(e)
            }
        }
        var s = i(/^(?:\s*)([+-]?(?:\d+)(?:,\d{3})*)(\.\d*)?$/g, /,/g),
            c = i(/^(?:\s*)([+-]?(?:\d+)(?:\.\d{3})*)(,\d*)?$/g, /\./g);

        function f(n) {
            var t = a(n);
            return !isNaN(t) && r("" + t) + 1 >= r(n) ? t : NaN
        }

        function d(n) {
            var e = [],
                o = n;
            return t([f, s, c], function(u) {
                var a = [],
                    i = [];
                t(n, function(n, r) {
                    r = u(n), a.push(r), r || i.push(n)
                }), r(i) < r(o) && (o = i, e = a)
            }), r(u(o, function(n) {
                return n == o[0]
            })) == r(o) ? e : []
        }

        function v(n) {
            if ("TABLE" == n.nodeName) {
                for (var a = function(r) {
                        var e, o, u = [],
                            a = [];
                        return function n(r, e) {
                            e(r), t(r.childNodes, function(r) {
                                n(r, e)
                            })
                        }(n, function(n) {
                            "TR" == (o = n.nodeName) ? (e = [], u.push(e), a.push(n)) : "TD" != o && "TH" != o || e.push(n)
                        }), [u, a]
                    }(), i = a[0], s = a[1], c = r(i), f = c > 1 && r(i[0]) < r(i[1]) ? 1 : 0, v = f + 1, p = i[f], h = r(p), l = [], g = [], N = [], m = v; m < c; ++m) {
                    for (var T = 0; T < h; ++T) {
                        r(g) < h && g.push([]);
                        var C = i[m][T],
                            L = C.textContent || C.innerText || "";
                        g[T].push(L.trim())
                    }
                    N.push(m - v)
                }
                t(p, function(n, t) {
                    l[t] = 0;
                    var a = n.classList;
                    a.add("tg-sort-header"), n.addEventListener("click", function() {
                        var n = l[t];
                        ! function() {
                            for (var n = 0; n < h; ++n) {
                                var r = p[n].classList;
                                r.remove("tg-sort-asc"), r.remove("tg-sort-desc"), l[n] = 0
                            }
                        }(), (n = 1 == n ? -1 : +!n) && a.add(n > 0 ? "tg-sort-asc" : "tg-sort-desc"), l[t] = n;
                        var i, f = g[t],
                            m = function(r, t) {
                                return n * f[r].localeCompare(f[t]) || n * (r - t)
                            },
                            T = function(n) {
                                var t = d(n);
                                if (!r(t)) {
                                    var u = o(n),
                                        a = o(n.map(e));
                                    t = d(n.map(function(n) {
                                        return n.substring(u, r(n) - a)
                                    }))
                                }
                                return t
                            }(f);
                        (r(T) || r(T = r(u(i = f.map(Date.parse), isNaN)) ? [] : i)) && (m = function(r, t) {
                            var e = T[r],
                                o = T[t],
                                u = isNaN(e),
                                a = isNaN(o);
                            return u && a ? 0 : u ? -n : a ? n : e > o ? n : e < o ? -n : n * (r - t)
                        });
                        var C, L = N.slice();
                        L.sort(m);
                        for (var E = v; E < c; ++E)(C = s[E].parentNode).removeChild(s[E]);
                        for (E = v; E < c; ++E) C.appendChild(s[v + L[E - v]])
                    })
                })
            }
        }
        n.addEventListener("DOMContentLoaded", function() {
            for (var t = n.getElementsByClassName("tg"), e = 0; e < r(t); ++e) try {
                v(t[e])
            } catch (n) {}
        })
    }(document)
</script>
<script>
    window.addEventListener("load", window.print());
</script>