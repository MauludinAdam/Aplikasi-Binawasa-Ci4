<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page" style="background:#800080;">
<!-- <div class="register-box"> -->
  <div class="col-md-6 mt-5">
  <div class="card card-outline">
    <center>
      <img src="/gambar/binawasa.jpeg" width="150" class="img-circle mt-4"  alt="">
    </center>
    <h2 class="text-center mt-3"><b>Form Registrasi Admin</b></h2>
    <div class="card-body">

      <!-- pesan validasi error -->
    <?php $errors = session()->getFlashdata('errors'); ?>
        <?php if(!empty($errors)) : ?>
          <div class="alert alert-danger" role="alert">
            <ul>
              <?php foreach($errors as $error) : ?>
                <li><?= esc($error) ?></li>
              <?php endforeach ?>
            </ul>
          </div>
          <?php endif; ?>
          <?php if(session()->getFlashdata('pesan')) {
            echo '<div class="alert alert-success" role="alert">';
            echo session()->getFlashdata('pesan'); 
            echo '</div>';
          }
          ?>

      <?php echo form_open_multipart('/Auth/save_register'); ?>
      <?= csrf_field(); ?>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" value="<?= old('nama_lengkap'); ?>" placeholder="Nama Lengkap">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control" value="<?= old('password'); ?>" placeholder="Masukkan Password">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Level Admin</label>
            <select name="level" class="form-control" value="<?= old('level'); ?>">
              <option value="">---- Pilih Admin Kwartir Ranting ----</option>
              <option value="Admin Bekasi Timur">Admin Bekasi Timur</option>
              <option value="Admin Bekasi Selatan">Admin Bekasi Selatan</option>
              <option value="Admin Bekasi Barat">Admin Bekasi Barat</option>
              <option value="Admin Bekasi Utara">Admin Bekasi Utara</option>
              <option value="Admin Medan Satria">Admin Medan Satria</option>
              <option value="Admin Rawalumbu">Admin Rawalumbu</option>
              <option value="Admin Bantargebang">Admin Bantargebang</option>
              <option value="Admin Mustikajaya">Admin Mustikajaya</option>
              <option value="Admin Jatiasih">Admin Jatiasih</option>
              <option value="Admin Jatisampurna">Admin Jatisampurna</option>
              <option value="Admin Pondok Gede">Admin Pondok Gede</option>
              <option value="Admin Pondok Melati">Admin Pondok Melati</option>
          </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Confirmasi Password</label>
            <input type="password" name="cpassword" class="form-control" value="<?= old('cpassword'); ?>" placeholder="Confirmasi Password">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" value="<?= old('email'); ?>" placeholder="Masukkan Email@gmail.com">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Gambar/Foto</label>
            <input type="file" name="foto" class="form-control" accept="image/*">
            <span class="text-secondary">Ukuran upload gambar/foto max 1MB</span>
          </div>
        </div>
      </div>
        
        <div class="row">
          <!-- /.col -->
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary btn-block" style="font-weight:800">Registrasi</button>
          </div>
          <!-- /.col -->
        </div>
      <?php echo form_close(); ?>
    <br>
    <div class="text-center">
     <strong>jika sudah punya akun, <a href="<?= base_url('/Auth/login') ?>" class="text-center">Login disini</a></strong>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
<!-- </div> -->
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?= base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets') ?>/dist/js/adminlte.min.js"></script>
<!-- sweet alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php if(!empty(session()->getFlashdata('pesan'))) : ?>
<script>
  swal({
  title: "<?= session()->getFlashdata('pesan'); ?>",
  button: "OK ",
  icon: "success",
});
</script>
<?php endif; ?>

<?php if(session()->getFlashdata('error')) : ?>
  <script>
  swal({
    title: "<?= session()->getFlashdata('error'); ?>",
    button: "OK",
    icon: "error",
});
  </script>
<?php endif; ?>
<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
      $($this).remove();
    })
      }, 3000);
</script>
</body>
</html>
