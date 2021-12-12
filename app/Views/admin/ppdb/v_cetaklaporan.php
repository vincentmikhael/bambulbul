<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Marketing $tahun.xls");
?>
<html>

<body>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>No Pendaftaran</th>
                <th>Tanggal Daftar</th>
                <th>Jurusan</th>
                <th>Jalur Masuk</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Tempat/Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Alamat</th>
                <th>Kecamatan</th>
                <th>Kota/Kab</th>
                <th>Provinsi</th>
                <th>No HP</th>
                <th>Info Pendaftar</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($siswa as $key => $value) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value['no_pendaftaran'] ?></td>
                    <td><?= $value['tgl_pendaftaran'] ?></td>
                    <td><?= $value['jurusan'] ?></td>
                    <td><?= $value['jalur_masuk'] ?></td>
                    <td><?= $value['nisn'] ?></td>
                    <td><?= $value['nama_lengkap'] ?></td>
                    <td><?= $value['tempat_lahir'] ?>/<?= $value['tgl_lahir'] ?></td>
                    <td><?= $value['jk'] ?></td>
                    <td><?= $value['agama'] ?></td>
                    <td><?= $value['alamat'] ?></td>
                    <td><?= $value['nama_kecamatan'] ?></td>
                    <td><?= $value['nama_kabupaten'] ?></td>
                    <td><?= $value['nama_provinsi'] ?></td>
                    <td><?= $value['no_telpon'] ?></td>
                    <td><?= $value['kuisioner'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </table>
</body>

</html>