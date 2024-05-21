<?= $this->extend('layout_user/template'); ?>
<?= $this->section('content'); ?>
    <div class="row">
      <div class="col-md-4">
        <div class="card card-outline shadow card-secondary">
          <center>
              <img src="/gambar/<?= session()->get('foto'); ?>" class="img-circle mb-3 mt-4 " width="165" alt="" style="border: 5px solid #c0c0c0;"> 
              <h3 class="mb-2 mt-3" style="font-family:sen-sarif; color:#800080;"><b><?= session()->get('nama_lengkap'); ?></b></h3><p class="mt-2"style="font-family:sen-sarif; font-size:1.2rem; color:#800080; font-weight:800"><?= session()->get('level'); ?></p>
          </center>
        </div>
      </div>
        <div class="col-lg-8 col-6">
            <div class="card card-outline card-secondary" >
              <div class="container" style="padding: .1px 9%;">
            <h3 style="font-family:sen-sarif; font-size:2.5rem; color:#800080;" class="mt-3"><b>Hi, <?= session()->get('nama_lengkap') ?></b> ,</h3><hr>
                <marquee><h2 style="font-family:sen-sarif; font-size:2rem; color:#800080;" class="mb-5">"<?= $subtitle ?>"</h2></marquee>
                </div>
            </div>
        </div>
    </div>


<?= $this->endSection(); ?>