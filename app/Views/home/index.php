<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
          <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 class="mb-4"><?= $jml_user ?></h3>

                <h5 class="mb-5"><b>Jumlah User</b></h5>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="User" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h4 class="text-center"><b>Admin Bekasi Timur</b> </h4><hr>
                <div style="letter-spacing:5rem;" class="text-center mb-3">
                 <h4><span><b><?= $jml_pembina_bekatim ?></b></span>
                  <span><b><?= $jml_pelatih_bekatim ?></b></span></h4> 
                  </div>
                  <h5>
                  <span style="padding: 20px;">Jumlah Pembina</span>
                  <span style="right:100%; margin:25px;">Jumlah Pelatih</span>
                  </h5>
                  
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="Bekatim/pembina_bekatim" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <h4 class="text-center"><b>Admin Bekasi Selatan</b> </h4><hr>
                <div style="letter-spacing:5rem;" class="text-center mb-3">
                 <h4><span><b><?= $jml_pembina_bekasilatan ?></b></span>
                  <span><b><?= $jml_pelatih_bekasilatan ?></b></span></h4> 
                  </div>
                  <h5>
                  <span style="padding: 20px;">Jumlah Pembina</span>
                  <span style="right:100%; margin:25px;">Jumlah Pelatih</span>
                  </h5>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="Bekasilatan/pembina_bekasilatan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <h4 class="text-center"><b>Admin Bekasi Barat</b> </h4><hr>
                <div style="letter-spacing:5rem;" class="text-center mb-3">
                 <h4><span><b><?= $jml_pembina_bekarat ?></b></span>
                  <span><b><?= $jml_pelatih_bekarat ?></b></span></h4> 
                  </div>
                  <h5>
                  <span style="padding: 20px;">Jumlah Pembina</span>
                  <span style="right:100%; margin:25px;">Jumlah Pelatih</span>
                  </h5>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="Bekarat/pembina_bekarat" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
              <h4 class="text-center"><b>Admin Bekasi Timur</b> </h4><hr>
                <div style="letter-spacing:5rem;" class="text-center mb-3">
                 <h4><span><b><?= $jml_pembina_bekatim ?></b></span>
                  <span><b><?= $jml_pelatih_bekatim ?></b></span></h4> 
                  </div>
                  <h5>
                  <span style="padding: 20px;">Jumlah Pembina</span>
                  <span style="right:100%; margin:25px;">Jumlah Pelatih</span>
                  </h5>
              </div>
              <div class="icon">
              <i class="fas fa-users"></i>
              </div>
              <a href="Bekasut/pembina_bekasut" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box text-white" style="background:#800080;">
              <div class="inner">
              <h4 class="text-center"><b>Admin Medan Satria</b> </h4><hr>
                <div style="letter-spacing:5rem;" class="text-center mb-3">
                 <h4><span><b><?= $jml_pembina_medansat ?></b></span>
                  <span><b><?= $jml_pelatih_medansat ?></b></span></h4> 
                  </div>
                  <h5>
                  <span style="padding: 20px;">Jumlah Pembina</span>
                  <span style="right:100%; margin:25px;">Jumlah Pelatih</span>
                  </h5>
              </div>
              <div class="icon">
              <i class="fas fa-users"></i>
              </div>
              <a href="Medansat/pembina_medansat" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box text-white" style="background:#8B0000;">
              <div class="inner">
              <h4 class="text-center"><b>Admin Mustika Jaya</b> </h4><hr>
                <div style="letter-spacing:5rem;" class="text-center mb-3">
                 <h4><span><b><?= $jml_pembina_mustikajaya ?></b></span>
                  <span><b><?= $jml_pelatih_mustikajaya ?></b></span></h4> 
                  </div>
                  <h5>
                  <span style="padding: 20px;">Jumlah Pembina</span>
                  <span style="right:100%; margin:25px;">Jumlah Pelatih</span>
                  </h5>
              </div>
              <div class="icon">
                 <i class="fas fa-users"></i>
              </div>
              <a href="Mustikajaya/pembina_mustikajaya" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box text-white" style="background:#6610f2;">
              <div class="inner">
              <h4 class="text-center"><b>Admin Rawalumbu</b> </h4><hr>
                <div style="letter-spacing:5rem;" class="text-center mb-3">
                 <h4><span><b><?= $jml_pembina_rawalumbu ?></b></span>
                  <span><b><?= $jml_pelatih_rawalumbu ?></b></span></h4> 
                  </div>
                  <h5>
                  <span style="padding: 20px;">Jumlah Pembina</span>
                  <span style="right:100%; margin:25px;">Jumlah Pelatih</span>
                  </h5>
              </div>
              <div class="icon">
                 <i class="fas fa-users"></i>
              </div>
              <a href="Rawalumbu/pembina_rawalumbu" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box text-white" style="background:#3d9970;">
              <div class="inner">
              <h4 class="text-center"><b>Admin Bantar Gebang</b> </h4><hr>
                <div style="letter-spacing:5rem;" class="text-center mb-3">
                 <h4><span><b><?= $jml_pembina_bantargebang ?></b></span>
                  <span><b><?= $jml_pelatih_bantargebang ?></b></span></h4> 
                  </div>
                  <h5>
                  <span style="padding: 20px;">Jumlah Pembina</span>
                  <span style="right:100%; margin:25px;">Jumlah Pelatih</span>
                  </h5>
              </div>
              <div class="icon">
                 <i class="fas fa-users"></i>
              </div>
              <a href="Bantargebang/pembina_bantargebang" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box text-white" style="background:#66CDAA;">
              <div class="inner">
              <h4 class="text-center"><b>Admin Jatisampurna</b> </h4><hr>
                <div style="letter-spacing:5rem;" class="text-center mb-3">
                 <h4><span><b><?= $jml_pembina_jatisampurna ?></b></span>
                  <span><b><?= $jml_pelatih_jatisampurna ?></b></span></h4> 
                  </div>
                  <h5>
                  <span style="padding: 20px;">Jumlah Pembina</span>
                  <span style="right:100%; margin:25px;">Jumlah Pelatih</span>
                  </h5>
              </div>
              <div class="icon">
                 <i class="fas fa-users"></i>
              </div>
              <a href="Jatisampurna/pembina_jatisampurna" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box text-white" style="background:	#A0522D;">
              <div class="inner">
              <h4 class="text-center"><b>Admin Jatiasih</b> </h4><hr>
                <div style="letter-spacing:5rem;" class="text-center mb-3">
                 <h4><span><b><?= $jml_pembina_jatiasih ?></b></span>
                  <span><b><?= $jml_pelatih_jatiasih ?></b></span></h4> 
                  </div>
                  <h5>
                  <span style="padding: 20px;">Jumlah Pembina</span>
                  <span style="right:100%; margin:25px;">Jumlah Pelatih</span>
                  </h5>
              </div>
              <div class="icon">
                 <i class="fas fa-users"></i>
              </div>
              <a href="Jatiasih/pembina_jatiasih" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box text-white" style="background:#808000;">
              <div class="inner">
              <h4 class="text-center"><b>Admin Pondok Gede</b> </h4><hr>
                <div style="letter-spacing:5rem;" class="text-center mb-3">
                 <h4><span><b><?= $jml_pembina_pondokgede ?></b></span>
                  <span><b><?= $jml_pelatih_pondokgede ?></b></span></h4> 
                  </div>
                  <h5>
                  <span style="padding: 20px;">Jumlah Pembina</span>
                  <span style="right:100%; margin:25px;">Jumlah Pelatih</span>
                  </h5>
              </div>
              <div class="icon">
                 <i class="fas fa-users"></i>
              </div>
              <a href="Pondokgede/pembina_pondokgede" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box text-white" style="background:	#6A5ACD;">
              <div class="inner">
              <h4 class="text-center"><b>Admin Pondok Melati</b> </h4><hr>
                <div style="letter-spacing:5rem;" class="text-center mb-3">
                 <h4><span><b><?= $jml_pembina_pondokmelati ?></b></span>
                  <span><b><?= $jml_pelatih_pondokmelati ?></b></span></h4> 
                  </div>
                  <h5>
                  <span style="padding: 20px;">Jumlah Pembina</span>
                  <span style="right:100%; margin:25px;">Jumlah Pelatih</span>
                  </h5>
              </div>
              <div class="icon">
                 <i class="fas fa-users"></i>
              </div>
              <a href="Pondokmelati/pembina_pondokmelati" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        </div>
</section>

<?= $this->endSection(); ?>