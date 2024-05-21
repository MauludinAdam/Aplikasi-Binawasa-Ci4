<?= $this->extend('layout_user/template'); ?>
<?= $this->section('content'); ?>
<div class="col-md-12">

<?php
session();
$validation = \Config\Services::validation();
?>
    <?php echo form_open_multipart('/Admin_mustikajaya/ubahData_pembina/'. $mustikajaya['idpembina_mustikajaya']); ?>
    <?= csrf_field(); ?>
        <table align="center">
            <tr>
                <td>
                    <h3 class="text-center"><?= $title ?></h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h5><b> ====================================================== </b></h5>
                </td>
            </tr>
            <div class="container">
                <div class="row">
                    <div class="form-group">
                        <tr>
                            <td>
                                <label for="nta" class="mt-4">NTA <span class="text-danger">*</span></label>
                                <input type="number" name="nta" class="form-control" value="<?= $mustikajaya['nta'] ?>" placeholder="Masukkan Nta Pembina">
                                <span class="text-danger"><?= isset($errors['nta']) == isset($errors['nta']) ? validation_show_error('nta') : '' ?></span>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="no_gudep" class="mt-4">No Gudep <span class="text-danger">*</span></label>
                                <input type="number" name="no_gudep" class="form-control" value="<?= $mustikajaya['no_gudep'] ?>" placeholder="Masukkan No Gudep">
                                <span class="text-danger"><?= isset($errors['no_gudep']) == isset($errors['no_gudep']) ? validation_show_error('no_gudep') : '' ?></span>
                            </td>
                        </tr>
                    
                        <tr>
                            <td>
                                <label for="nama" class="mt-3">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="nama" class="form-control" value="<?= $mustikajaya['nama'] ?>" placeholder="Nama Lengkap">
                                <span class="text-danger"><?= isset($errors['nama']) == isset($errors['nama']) ? validation_show_error('nama') : '' ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="jenkel" class="mt-3">Jenis Kelamin <span class="text-danger">*</span></label>
                                <select name="jenkel" class="form-control" value="<?= old('jenkel'); ?>">
                                    <option value="">--- Pilih Jenis Kelamin ---</option>
                                    <option value="Laki-Laki" <?= $mustikajaya['jenkel'] == 'Laki-Laki' ? 'selected' : '' ?>>Laki-Laki</option>
                                    <option value="Perempuan" <?= $mustikajaya['jenkel'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                                <span class="text-danger"><?= isset($errors['jenkel']) == isset($erros['jenkel']) ? validation_show_error('jenkel') : '' ?></span>
                            </td>
                        </tr>
                    </div>
                    <div class="form-group">
                    <tr>
                            <td>
                                <label for="tempat_lhir" class="mt-3">Tempat Lahir <span class="text-danger">*</span></label>
                                <input type="text" name="tempat_lhr" class="form-control" value="<?= $mustikajaya['tempat_lhr'] ?>" placeholder="Tempat Lahir">
                                <span class="text-danger"><?= isset($errors['tempat_lhr']) == isset($errors['tempat_lhr']) ? validation_show_error('tempat_lhr') : '' ?></span>
                            </td>
                        </tr>
                    </div>
                    <div class="form-group">
                    <tr>
                            <td>
                                <label for="tgl_lhr" class="mt-3">Tangal Lahir <span class="text-danger">*</span></label>
                                <input type="date" name="tgl_lhr" class="form-control" value="<?= $mustikajaya['tgl_lhr'] ?>" placeholder="Tempat Tgl Lahir">
                                <span class="text-danger"><?= isset($errors['tgl_lhr']) == isset($errors['tgl_lhr']) ? validation_show_error('tgl_lhr') : '' ?></span>
                            </td>
                        </tr>
                    </div>
                    <div class="form-group">
                    <tr>
                            <td>
                                <label for="email" class="mt-3">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" value="<?= $mustikajaya['email'] ?>" placeholder="Masukkan Email">
                                <span class="text-danger"><?= isset($errors['email']) == isset($errors['email']) ? validation_show_error('email') : '' ?></span>
                            </td>
                        </tr>
                    </div>
                    <tr>
                            <td>
                                <label for="no_telp" class="mt-3">No Telp <span class="text-danger">*</span></label>
                                <input type="number" name="no_telp" class="form-control" value="<?= $mustikajaya['no_telp'] ?>" placeholder="No Telp">
                                <span class="text-danger"><?= isset($errors['no_telp']) == isset($errors['no_telp']) ? validation_show_error('no_telp') : '' ?></span>
                            </td>
                        </tr>
                        <div class="form-group">
                        <tr>
                            <td>
                                <label for="pangkalan" class="mt-3">Pangkalan<span class="text-danger">*</span></label>
                                <input type="text" name="pangkalan" class="form-control" value="<?= $mustikajaya['pangkalan'] ?>" placeholder="Pangkalan">
                                <span class="text-danger"><?= isset($errors['pangkalan']) == isset($errors['pangkalan']) ? validation_show_error('pangkalan') : '' ?></span>
                            </td>
                        </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <td>
                                    <label for="kualifikasi" class="mt-3">Kualifikasi <span class="text-danger">*</span></label>
                                    <select name="kualifikasi" class="form-control" value="<?= old('kualifikasi'); ?>">
                                        <option value="">--- Pilih Kualifikasi ---</option>
                                        <option value="KMD" <?= $mustikajaya['kualifikasi'] == 'KMD' ? 'selected' : '' ?>>KMD</option>
                                        <option value="KML" <?= $mustikajaya['kualifikasi'] == 'KML' ? 'selected' : '' ?>>KML</option>
                                    </select>
                                    <span class="text-danger"><?= isset($errors['kualifikasi']) == isset($errors['kualifikasi']) ? validation_show_error('kualifikasi') : '' ?></span>
                                </td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <td>
                                    <label for="golongan" class="mt-3">Golongan <span class="text-danger">*</span></label>
                                    <select name="golongan" class="form-control" value="<?= old('golongan'); ?>">
                                        <option value="">--- Pilih Golongan ---</option>
                                        <option value="Pandega" <?= $mustikajaya['golongan'] == 'Pandega' ? 'selected' : '' ?>>Pandega</option>
                                        <option value="Penggalang" <?= $mustikajaya['golongan'] == 'Penggalang' ? 'selected' : '' ?>>Penggalang</option>
                                        <option value="Penegak" <?= $mustikajaya['golongan'] == 'Penegak' ? 'selected' : '' ?>>Penegak</option>
                                        <option value="Siaga" <?= $mustikajaya['golongan'] == 'Siaga' ? 'selected' : '' ?>>Siaga</option>
                                    </select>
                                    <span class="text-danger"><?= isset($errors['golongan']) == isset($errors['golongan']) ? validation_show_error('golongan') : '' ?></span>
                                </td>
                            </tr>
                        </div>

                        <div class="form-group">
                            <tr>
                                <td>
                                    <label for="thn_lulus_kmd" class="mt-3">Tahun Lulus KMD<span class="text-danger">*</span></label>
                                    <input type="date" name="thn_lulus_kmd" class="form-control" value="<?= $mustikajaya['thn_lulus_kmd'] ?>" placeholder="Nama Lengkap">
                                    <span class="text-danger"><?= isset($errors['thn_lulus_kmd']) == isset($errors['thn_lulus_kmd']) ? validation_show_error('thn_lulus_kmd') : '' ?></span>
                                </td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <td>
                                    <label for="thn_lulus_kml" class="mt-3">Tahun Lulus KML<span class="text-danger">*</span></label>
                                    <input type="date" name="thn_lulus_kml" class="form-control" value="<?= $mustikajaya['thn_lulus_kml'] ?>" placeholder="Nama Lengkap">
                                    <span class="text-danger"><?= isset($errors['thn_lulus_kml']) == isset($errors['thn_lulus_kml']) ? validation_show_error('thn_lulus_kml') : '' ?></span>
                                </td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <td>
                                    <label for="alamat" class="mt-3">Alamat <span class="text-danger">*</span></label>
                                    <textarea name="alamat" class="form-control" cols="3" rows="3"><?= $mustikajaya['alamat'] ?></textarea>
                                    <span class="text-danger"><?= isset($erros['alamat']) == isset($errors['alamat']) ? validation_show_error('alamat') : '' ?> </span>
                                </td>
                            </tr>
                        </div>
                        <tr>
                            <td>
                                <button class="btn btn-success btn-block mt-4" type="submit"><i class="fas fa-save"></i> Update</button>
                            </td>
                        </tr>
                    </tr>
                </div>
            </div>
        </table>
    <?php echo form_close(); ?>
    <br>
    <br>
    <br>
    <br>
</div>

<?= $this->endSection(); ?>