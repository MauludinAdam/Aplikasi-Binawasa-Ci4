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

                     <?php if (session()->get('level') == "Admin") : ?>

                        <li class="nav-item">
                            <a href="<?= base_url('/Home') ?>" class="nav-link <?= $menu == 'dashboard' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                       
                        <li class="nav-item">
                            <a href="<?= base_url('User') ?>" class="nav-link <?= $menu == 'user' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Data Users</p>
                            </a>
                        </li>
                        <li class="nav-item <?= $menu == 'bekatim' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $menu == 'bekatim' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Bekasi Timur
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('Bekatim/pembina_bekatim') ?>"
                                        class="nav-link <?= $submenu == 'pembinabekatim' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pembina</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Bekatim/pelatih_bekatim') ?>"
                                        class="nav-link <?= $submenu == 'pelatihbekatim' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pelatih</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?= $menu == 'bekasilatan' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $menu == 'bekasilatan' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Bekasi Selatan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('/Bekasilatan/pembina_bekasilatan') ?>"
                                        class="nav-link <?= $submenu == 'pembinabekasilatan' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pembina</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('/Bekasilatan/pelatih_bekasilatan') ?>"
                                        class="nav-link <?= $submenu == 'pelatihbekasilatan' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pelatih</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?= $menu == 'bekarat' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $menu == 'bekarat' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Bekasi Barat
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('Bekarat/pembina_bekarat') ?>"
                                        class="nav-link <?= $submenu == 'pembinabekarat' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pembina</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Bekarat/pelatih_bekarat') ?>"
                                        class="nav-link <?= $submenu == 'pelatihbekarat' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pelatih</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?= $menu == 'bekasut' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $menu == 'bekasut' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Bekasi Utara
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('Bekasut/pembina_bekasut') ?>"
                                        class="nav-link <?= $submenu == 'pembinabekasut' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pembina</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Bekasut/pelatih_bekasut') ?>"
                                        class="nav-link <?= $submenu == 'pelatihbekasut' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pelatih</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?= $menu == 'medansat' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $menu == 'medansat' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Medan Satria
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('Medansat/pembina_medansat') ?>"
                                        class="nav-link <?= $submenu == 'pembinamedansat' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pembina</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Medansat/pelatih_medansat') ?>"
                                        class="nav-link <?= $submenu == 'pelatihmedansat' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pelatih</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?= $menu == 'mustikajaya' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $menu == 'mustikajaya' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Mustika Jaya
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('Mustikajaya/pembina_mustikajaya') ?>"
                                        class="nav-link <?= $submenu == 'pembinamustikajaya' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pembina</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Mustikajaya/pelatih_mustikajaya') ?>"
                                        class="nav-link <?= $submenu == 'pelatihmustikajaya' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pelatih</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?= $menu == 'rawalumbu' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $menu == 'rawalumbu' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Rawalumbu
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('Rawalumbu/pembina_rawalumbu') ?>"
                                        class="nav-link <?= $submenu == 'pembinarawalumbu' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pembina</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Rawalumbu/pelatih_rawalumbu') ?>"
                                        class="nav-link <?= $submenu == 'pelatihrawalumbu' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pelatih</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?= $menu == 'bantargebang' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $menu == 'bantargebang' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Bantar Gebang
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('Bantargebang/pembina_bantargebang') ?>"
                                        class="nav-link <?= $submenu == 'pembinabantargebang' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pembina</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Bantargebang/pelatih_bantargebang') ?>"
                                        class="nav-link <?= $submenu == 'pelatihbantargebang' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pelatih</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?= $menu == 'jatisampurna' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $menu == 'jatisampurna' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Jatisampurna
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('Jatisampurna/pembina_jatisampurna') ?>"
                                        class="nav-link <?= $submenu == 'pembinajatisampurna' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pembina</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Jatisampurna/pelatih_jatisampurna') ?>"
                                        class="nav-link <?= $submenu == 'pelatihjatisampurna' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pelatih</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?= $menu == 'jatiasih' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $menu == 'jatiasih' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Jatiasih
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('Jatiasih/pembina_jatiasih') ?>"
                                        class="nav-link <?= $submenu == 'pembinajatiasih' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pembina</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Jatiasih/pelatih_jatiasih') ?>"
                                        class="nav-link <?= $submenu == 'pelatihjatiasih' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pelatih</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?= $menu == 'pondokgede' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $menu == 'pondokgede' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Pondok Gede
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('Pondokgede/pembina_pondokgede') ?>"
                                        class="nav-link <?= $submenu == 'pembinapondokgede' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pembina</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Pondokgede/pelatih_pondokgede') ?>"
                                        class="nav-link <?= $submenu == 'pelatihpondokgede' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pelatih</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?= $menu == 'pondokmelati' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $menu == 'pondokmelati' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Pondok Melati
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('Pondokmelati/pembina_pondokmelati') ?>"
                                        class="nav-link <?= $submenu == 'pembinapondokmelati' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pembina</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Pondokmelati/pelatih_pondokmelati') ?>"
                                        class="nav-link <?= $submenu == 'pelatihpondokmelati' ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Pelatih</p>
                                    </a>
                                </li>
                            </ul>
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