<?= $this->extend('layout_user/template'); ?>
<?= $this->section('content'); ?>
<div class="col-md-12">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title" style="color:#800080;"><i class="fas fa-users"></i> <?= $page ?></h3>
            <div class="card-tools">
              <a href="/Admin_bantargebang/excelData_pelatih" class="btn btn-outline-success shadow ml-2 float-right"><i class="fas fa-file-excel"></i> Excel</a>
               <a href="/Admin_bantargebang/tambahData_pelatih" class="btn btn-info shadow ml-3"><i class="fas fa-plus-square"></i> Tambah Data</a>
               
            </div>
        </div>
        <div class="card-body">
        <table id="example" class="display nowrap table-striped table-bordered" style="width:100%">
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
                        <th>Thn Lulus KPD</th>
                        <th>Thn Lulus KPL</th>
                        <th class="text-center">Alamat</th>
                        <th>Foto</th>
                        <th>Ijazah</th>
                        <th>Opsi</th>
                        <th class="text-center">Ijazah</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($bantargebang as $value) : ?>
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
                            <td class="text-center"><?= $value['thn_lulus_kpd'] ?></td>
                            <td class="text-center"><?= $value['thn_lulus_kpl'] ?></td>
                            <td class="text-center"><?= $value['alamat'] ?></td>
                            <td><img src="/image/<?= $value['foto'] ?>" class="img-circle" width="50" alt=""></td>
                            <td>
                            <img src="/ijazah/<?= $value['ijazah'] ?>"  width="50" alt="">
                            </td>
                            <td>
                              <a href="/Admin_bantargebang/detailData_pelatih/<?= $value['slug'] ?>" class="btn btn-secondary"><i class="fas fa-info-circle"></i> Detail</a>
                            </td>
                            <td>
                            <a href="/Admin_bantargebang/downloadData_pelatih/<?= $value['idpelatih_bantargebang']; ?>" class="btn btn-info"><i class="fas fa-download"></i> Download</a>
                            </td>
                            <td width="20%">
                                <a href="/Admin_bantargebang/editData_pelatih/<?= $value['slug']; ?>" class="btn btn-success"><i class="fas fa-pencil-square"></i> Edit</a>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $value['idpelatih_bantargebang'] ?>"><i class="fas fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Delete Data -->
<?php foreach($bantargebang as $value) : ?>
    <div class="modal fade" id="delete<?= $value['idpelatih_bantargebang'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete <?= $subtitle ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Yakin, data <b class="text-danger"><?= $value['nama'] ?></b> mau dihapus ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
        <a href="/Admin_bantargebang/deleteData_pelatih/<?= $value['idpelatih_bantargebang'] ?>" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<?= $this->endSection(); ?>