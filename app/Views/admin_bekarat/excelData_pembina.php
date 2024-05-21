<?php

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Pembina Bekasi Barat.xls");

?>

<html>
    <body>
    <table border="1">
                <thead class="text-white" style="background:#800080;">
                    <tr>
                        <th>No</th>
                        <th>NTA</th>
                        <th>No Gudep</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Tgl Lahir</th>
                        <th>Email</th>
                        <th>No Telp</th>
                        <th>Pangkalan</th>
                        <th>Kualifikasi</th>
                        <th>Golongan</th>
                        <th>Thn Lulus KMD</th>
                        <th>Thn Lulus KML</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($bekarat as $value) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['nta'] ?></td>
                            <td class="text-center"><?= $value['no_gudep'] ?></td>
                            <td><?= $value['nama'] ?></td>
                            <td><?= $value['jenkel'] ?></td>
                            <td><?= $value['tempat_lhr'] ?></td>
                            <td><?= $value['tgl_lhr'] ?></td>
                            <td><?= $value['email'] ?></td>
                            <td><?= $value['no_telp'] ?></td>
                            <td><?= $value['pangkalan'] ?></td>
                            <td class="text-center"><?= $value['kualifikasi'] ?></td>
                            <td><?= $value['golongan'] ?></td>
                            <td><?= $value['thn_lulus_kmd'] ?></td>
                            <td><?= $value['thn_lulus_kml'] ?></td>
                            <td><?= $value['alamat'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    </body>
</html>