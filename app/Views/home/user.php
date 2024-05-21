<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="col-md-12">
    <div class="card card-outline card-success">
        <div class="card-header" style="background:#800080 ;">
            <h2 class="card-title text-white"><i class="fas fa-users"></i> <?= $subtitle ?></h2>
        </div> 
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th width ="5%">No</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Level</th>
                        <th class="text-center">Foto</th>
                        <th width="12%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($user as $value) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['nama_lengkap'] ?></td>
                            <td><?= $value['email'] ?></td>
                            <td><?= $value['password'] ?></td>
                            <td><?= $value['level'] ?></td>
                            <td class="text-center"><img src="/gambar/<?= $value['foto'] ?>" class="img-circle" width="50" alt=""></td>
                            <td class="text-center">
                                <button class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_user']; ?>"><i class="fas fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        
        </div>
    </div>
</div>



<!--==================================== Modal Delete ===============================-->
<?php foreach ($user as $value) : ?>
    <div class="modal fade" id="delete<?= $value['id_user']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> Delete <?= $subtitle ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Yakin, Data <b><?= $value['nama_lengkap']; ?></b> ini mau dihapus ?? 🤔🤔
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info " data-dismiss="modal">Batal</button>
                    <a href="/User/deleteData/<?= $value['id_user']; ?>" class="btn btn-danger">Delete </a>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    
<?php endforeach; ?>
<?= $this->endSection(); ?>