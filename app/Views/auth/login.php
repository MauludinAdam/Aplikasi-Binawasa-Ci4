<?= $this->extend('auth/template_login'); ?>
<?= $this->section('content'); ?>
<img src="/gambar/binawasa.jpeg"  class="img-circle mb-4" style="margin-top: -10rem;" width="200" alt="">
   <h3 class="text-white mb-5" style="font-family:sen-sarif;"><b><?= $page ?></b></h3>
<div class="row">
    <div class="login-box">
    <div class="col-lg-12 col-12">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
              <h4 class="mb-4"><b>Admin</b></h4>
              <p>Login Untuk Admin</p>
              </div>
              <div class="icon">
                <i class="fas fa-user"></i>
              </div>
              <a href="<?= base_url('auth/login_admin') ?>" class="small-box-footer">
                Admin <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
    </div>
</div>

<div class="row">
    <div class="login-box">
    <div class="col-lg-12 col-12">
            <!-- small card -->
            <div class="small-box bg-primary">
              <div class="inner">
               

                <h4 class="mb-4"><b>Kwartir Ranting</b></h4>
                <p>Login Untuk User Kwartir Ranting</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="<?= base_url('auth/login_user') ?>" class="small-box-footer">
                User <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
    </div>
</div>

<?= $this->endSection(); ?>
