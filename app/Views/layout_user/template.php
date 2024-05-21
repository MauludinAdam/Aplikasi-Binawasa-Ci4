<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $title ?>
    </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/dist/css/adminlte.min.css">
    <!-- data table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css">
    
    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="hold-transition sidebar-mini" width="100%">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand"  style="background:#800080 ;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="btn btn-danger" href="<?= base_url('auth/login') ?>"
                        onclick="return confirm('Yakin, ingin keluar dari halaman ini ?')" role="button">
                        Logout 
                        <i class="fas fa-sign-out-alt"></i> </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <h4 class="brand-link">
                <img src="/gambar/binawasa.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <b class="brand-text font-weight-white">Binawasa</b>
            </h4>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/gambar/<?= session()->get('foto') ?>" class="img-circle elevation-2" alt="User Image">

                    </div>
                    <div class="info">
                        <b class="d-block text-white">
                            <?= session()->get('nama_lengkap') ?>
                        </b>
                        <span style="color:#DFEEEB">
                      <?= session()->get('level'); ?>
                    </span>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
                            <a href="<?= base_url('Binawasa') ?>" class="nav-link <?= $menu == 'dashboard' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Home</p>
                            </a>
                        </li>

                     <?php if (session()->get('level') == "Admin Bekasi Timur") : ?>

                                <li class="nav-item">
                                    <a href="<?= base_url('Admin_bekatim/pembina_bekasi_timur') ?>"
                                        class="nav-link <?= $submenu == 'datapembina' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pembina</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Admin_bekatim/pelatih_bekasi_timur') ?>"
                                        class="nav-link <?= $submenu == 'datapelatih' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pelatih</p>
                                    </a>
                                </li>
                        
                    <?php endif; ?>

                        <?php if (session()->get('level') == "Admin Bekasi Selatan") : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('Admin_bekasilatan/pembina_bekasi_selatan') ?>"
                                        class="nav-link <?= $submenu == 'datapembina' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pembina</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Admin_bekasilatan/pelatih_bekasi_selatan') ?>"
                                        class="nav-link <?= $submenu == 'datapelatih' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pelatih</p>
                                    </a>
                                </li>
                        <?php endif; ?>

                        <?php if (session()->get('level') == "Admin Bekasi Barat") : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('Admin_bekarat/pembina_bekasi_barat') ?>"
                                        class="nav-link <?= $submenu == 'datapembina' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pembina</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Admin_bekarat/pelatih_bekasi_barat') ?>"
                                        class="nav-link <?= $submenu == 'datapelatih' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pelatih</p>
                                    </a>
                                </li>
                        <?php endif; ?>

                    <?php if (session()->get('level') == "Admin Bekasi Utara") : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('Admin_bekasut/pembina_bekasi_utara') ?>"
                                        class="nav-link <?= $submenu == 'datapembina' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pembina</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Admin_bekasut/pelatih_bekasi_utara') ?>"
                                        class="nav-link <?= $submenu == 'datapelatih' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pelatih</p>
                                    </a>
                                </li>
                        <?php endif; ?>

                        <?php if (session()->get('level') == "Admin Medan Satria") : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('Admin_medansat/pembina_medan_satria') ?>"
                                        class="nav-link <?= $submenu == 'datapembina' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pembina</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Admin_medansat/pelatih_medan_satria') ?>"
                                        class="nav-link <?= $submenu == 'datapelatih' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pelatih</p>
                                    </a>
                                </li>
                        <?php endif; ?>

                        <?php if (session()->get('level') == "Admin Mustika Jaya") : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('Admin_mustikajaya/pembina_mustika_jaya') ?>"
                                        class="nav-link <?= $submenu == 'datapembina' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pembina</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Admin_mustikajaya/pelatih_mustika_jaya') ?>"
                                        class="nav-link <?= $submenu == 'datapelatih' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pelatih</p>
                                    </a>
                                </li>
                        <?php endif; ?>

                        <?php if (session()->get('level') == "Admin Bantargebang") : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('Admin_bantargebang/pembina_bantar_gebang') ?>"
                                        class="nav-link <?= $submenu == 'datapembina' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pembina</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Admin_bantargebang/pelatih_bantar_gebang') ?>"
                                        class="nav-link <?= $submenu == 'datapelatih' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pelatih</p>
                                    </a>
                                </li>
                        <?php endif; ?>

                        <?php if (session()->get('level') == "Admin Rawalumbu") : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('Admin_rawalumbu/pembina_rawa_lumbu') ?>"
                                        class="nav-link <?= $submenu == 'datapembina' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pembina</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Admin_rawalumbu/pelatih_rawa_lumbu') ?>"
                                        class="nav-link <?= $submenu == 'datapelatih' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pelatih</p>
                                    </a>
                                </li>
                        <?php endif; ?>

                        <?php if (session()->get('level') == "Admin Jatisampurna") : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('Admin_jatisampurna/pembina_jati_sampurna') ?>"
                                        class="nav-link <?= $submenu == 'datapembina' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pembina</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Admin_jatisampurna/pelatih_jati_sampurna') ?>"
                                        class="nav-link <?= $submenu == 'datapelatih' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pelatih</p>
                                    </a>
                                </li>
                        <?php endif; ?>

                        <?php if (session()->get('level') == "Admin Jatiasih") : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('Admin_jatiasih/pembina_jati_asih') ?>"
                                        class="nav-link <?= $submenu == 'datapembina' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pembina</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Admin_jatiasaih/pelatih_jati_asih') ?>"
                                        class="nav-link <?= $submenu == 'datapelatih' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pelatih</p>
                                    </a>
                                </li>
                        <?php endif; ?>

                        <?php if (session()->get('level') == "Admin Pondok Gede") : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('Admin_pondokgede/pembina_pondok_gede') ?>"
                                        class="nav-link <?= $submenu == 'datapembina' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pembina</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Admin_pondokgede/pelatih_pondok_gede') ?>"
                                        class="nav-link <?= $submenu == 'datapelatih' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pelatih</p>
                                    </a>
                                </li>
                        <?php endif; ?>

                        <?php if (session()->get('level') == "Admin Pondok Melati") : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('Admin_pondokmelati/pembina_pondok_melati') ?>"
                                        class="nav-link <?= $submenu == 'datapembina' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pembina</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Admin_pondokmelati/pelatih_pondok_melati') ?>"
                                        class="nav-link <?= $submenu == 'datapelatih' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pelatih</p>
                                    </a>
                                </li>
                        <?php endif; ?>

                    </ul>
                    <br>
                    <br>
                    <br>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">
                                <?= $page ?>
                            </h1>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">

                    <?= $this->renderSection('content'); ?>


                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer text-center">
            <strong>Copyright &copy; 2024-2025 <a href="https://binawasa.co.id">Binawasa.co.id</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/assets/dist/js/adminlte.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script> -->
    <script>
    new DataTable('#example', {
    scrollX: true
});
    </script>
    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?php if (!empty(session()->getFlashdata('pesan'))): ?>
    <script>
    swal({
        title: "Sukses !!",
        text:"<?= session()->getFlashdata('pesan'); ?>",
        button: "OK",
        icon: "success",
    });
    </script>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
    <script>
    swal({
        title: "Gagal !!",
        text: "<?= session()->getFlashdata('error'); ?>",
        button: "Confirm Me",
        icon: "error",
    });
    </script>
    <?php endif; ?>

</body>

</html>