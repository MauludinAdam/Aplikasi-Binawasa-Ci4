
<?= $this->extend('auth/template_login'); ?>
<?= $this->section('content'); ?>

<div class="login-box">
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-header text-center">
      <img src="/gambar/binawasa.jpeg" width="150" class="img-circle" alt="">
    </div>
    <div class="card-body">
      <h4 class="login-box-msg"><b>Login Kwartir Ranting</b></h4>

      <?php if(session()->getFlashdata('pesan')) {
            echo '<div class="alert alert-success" role="alert">';
            echo session()->getFlashdata('pesan'); 
            echo '</div>';
          }
          ?>
      <?php echo form_open_multipart('/Auth/CekLoginUser') ?>
        <?= csrf_field() ?>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
        <div class="col-6">
          <!-- /.col -->
            <a href="<?= base_url('auth/login') ?>" class="btn btn-warning btn-block">kembali</a>
          </div>
          <div class="col-6">
            <button type="submit" class="btn btn-success btn-block">login</button>
          </div>
          <!-- /.col -->
        </div>
        
      <?php echo form_close(); ?>
      <p class="mt-3">Jika Belum Punya Akun,
        <a href="<?= base_url('auth/register') ?>" class="text-center">Register Disini</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
    <?= $this->endsection(); ?>
  