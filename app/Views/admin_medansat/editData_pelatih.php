<?= $this->extend('layout_user/template'); ?>
<?= $this->section('content'); ?>
<div class="col-md-12">

<?php
session();
$validation = \Config\Services::validation();
?>

<?php echo form_open_multipart('/Medansat/ubahData_pelatih/' . $medansat['idpelatih_medansatria']); ?>
<table align="center">
    <tr>
        <td>
            <h4 class="text-center" style="color:#800080;"><b>Form Ubah Data Pelatih</b></h4>
        </td>
    </tr>
    <tr>
        <td>
            <h3><b>========================</b></h3>
        </td>
    </tr>
    <div class="container">
        <div class="row">
            <div class="form-group">
                <tr>
                    <td>
                        <label for="nta" class="mt-4">Nta</label>
                        <input type="number" name="nta" class="form-control" value="<?= $medansat['nta'] ?>" placeholder="Masukkan Nta Pelatih">
                        <span class="text-danger"><?= isset($errors['nta']) == isset($errors['nta']) ? validation_show_error('nta') : '' ?></span>
                    </td>
                </tr>
            </div>
            <div class="form-group">
                <tr>
                    <td>
                        <label for="nama" class="mt-3">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" value="<?= $medansat['nama'] ?>" placeholder="Nama Lengkap">
                        <span class="text-danger"><?= isset($errors['nama']) == isset($errors['nama']) ? validation_show_error('nama') : '' ?></span>
                    </td>
                </tr>
            </div>
            <div class="form-group">
                <tr>
                    <td>
                        <label for="jenkel" class="mt-3">Jenis Kelamin</label>
                        <select name="jenkel" class="form-control">
                            <option value="">---- Pilih Jenis Kelamin ----</option>
                            <option value="Laki-Laki" <?= $medansat['jenkel'] == 'Laki-Laki' ? 'selected' : '' ?>>Laki-Laki</option>
                            <option value="Perempuan" <?= $medansat['jenkel'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                        <span class="text-danger"><?= isset($errors['jenkel']) == isset($errors['jenkel']) ? validation_show_error('jenkel') : '' ?></span>
                    </td>
                </tr>
            </div>
            <div class="form-group">
                <tr>
                    <td>
                        <label for="golongan" class="mt-3">Golongan</label>
                        <select name="golongan" class="form-control">
                            <option value="">---- Pilih Golongan ----</option>
                            <option value="KMD" <?= $medansat['golongan'] == 'KMD' ? 'selected' : '' ?>>KMD</option>
                            <option value="KML" <?= $medansat['golongan'] == 'KML' ? 'selected' : '' ?>>KML</option>
                            <option value="KPL" <?= $medansat['golongan'] == 'KPL' ? 'selected' : '' ?>>KPL</option>
                            <option value="KPD" <?= $medansat['golongan'] == 'KPD' ? 'selected' : '' ?>>KPD</option>
                        </select>
                        <span class="text-danger"><?= isset($errors['golongan']) == isset($errors['golongan']) ? validation_show_error('golongan') : '' ?></span>
                    </td>
                </tr>
            </div>
            <div class="form-group">
                <tr>
                    <td>
                        <label for="tingkatan" class="mt-3">Tingkatan</label>
                        <select name="tingkatan" class="form-control">
                            <option value="">---- Pilih Tingkatan ----</option>
                            <option value="Pandega" <?= $medansat['tingkatan'] == 'Pandega' ? 'selected' : '' ?>>Pandega</option>
                            <option value="Penegak" <?= $medansat['tingkatan'] == 'Penegak' ? 'selected' : '' ?>>Penegak</option>
                            <option value="Penggalang" <?= $medansat['tingkatan'] == 'Penggalang' ? 'selected' : '' ?>>Penggalang</option>
                            <option value="Siaga" <?= $medansat['tingkatan'] == 'Siaga' ? 'selected' : '' ?>>Siaga</option>
                        </select>
                        <span class="text-danger"><?= isset($errors['tingkatan']) == isset($errors['tingkatan']) ? validation_show_error('tingkatan') : '' ?></span>
                    </td>
                </tr>
            </div>
            <div class="form-group">
                <tr>
                    <td>
                        <label for="alamat" class="mt-3">Alamat</label>
                        <textarea name="alamat" class="form-control" cols="3" rows="3" placeholder="Masukkan Alamat"><?= $medansat['alamat'] ?></textarea>
                        <span class="text-danger"><?= isset($errors['alamat']) == isset($errors['alamat']) ? validation_show_error('alamat') : '' ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="/Medansat/pelatih_medan_satria" class="btn btn-warning mt-4"><i class="fas fa-backward"></i> Kembali</a>
                        <button type="submin" class="btn btn-success mt-4"><i class="fas fa-save"></i> Simpan</button>
                    </td>
                </tr>
            </div>

        </div>
    </div>
</table>
<?php echo form_close(); ?>
<br>
<br>
<br>
<br>
<br>
<br>
</div>
<?= $this->endSection(); ?>