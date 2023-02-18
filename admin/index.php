<?php 
session_start();

  // cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
  header("location:../index.php?pesan=gagal");
}

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi UKK 2022 | Pemesanan Hotel</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white bg-primary">
      <div class="container">
        <a href="" class="navbar-brand">
          <img src="../assets/gambar/hotel7.jpg" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-dark text-white">Hotel Jaya Makmur</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar navbar-expand-lg navbar-dark bg-primary" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="index.php" class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item">
              <a href="kamar.php" class="nav-link">Kamar</a>
            </li>
            <li class="nav-item">
              <a href="fasilitas.php" class="nav-link">Fasilitas Kamar</a>
            </li>
            <li class="nav-item">
              <a href="galeri.php" class="nav-link">Galeri</a>
            </li>
            <li class="nav-item">
              <a href="users.php" class="nav-link">Users</a>
            </li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="col-md-12">
             <h2 class="mt-3 mb-4">Dashboard</h2>
            <div class="card card-outline card-danger">
              <div class="card-body">
                <div class="row">
                <?php
                  include '../koneksi.php';
                  $no = 1;
                  $data = mysqli_query($koneksi, "select * from kamar");
                  $kamar = mysqli_num_rows($data);
                ?>
                  <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <h3><?php echo $kamar; ?></h3>

                        <p>Data Kamar</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-home"></i>
                      </div>
                      <a href="kamar.php" class="small-box-footer">
                        More danger <i class="fas fa-arrow-circle-right"></i>
                      </a>
                    </div>
                  </div>
                  <?php
                    include '../koneksi.php';
                    $no = 1;
                    $data = mysqli_query($koneksi, "select * from fasilitas_kamar");
                    $fasilitas = mysqli_num_rows($data);
                  ?>
                  <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <h3><?= $fasilitas;?></h3>

                        <p>Fasilitas</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-list-alt"></i>
                      </div>
                      <a href="fasilitas.php" class="small-box-footer">
                        More danger <i class="fas fa-arrow-circle-right"></i>
                      </a>
                    </div>
                  </div>
                  <?php
                    include '../koneksi.php';
                    $no = 1;
                    $data = mysqli_query($koneksi, "select * from galeri");
                    $galeri = mysqli_num_rows($data);
                  ?>
                  <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <h3><?= $galeri;?></h3>

                        <p>Galeri</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-image"></i>
                      </div>
                      <a href="galeri.php" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                      </a>
                    </div>
                  </div>
                  <?php
                    include '../koneksi.php';
                    $no = 1;
                    $data = mysqli_query($koneksi, "select * from users");
                    $users = mysqli_num_rows($data);
                  ?>
                  <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <h3><?= $users;?></h3>

                        <p>Users</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user"></i>
                      </div>
                      <a href="users.php" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                      </a>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
<br>
    <!-- Main Footer -->
    <footer class="main-footer text-center bg-primary">
      <strong>Copyright &copy; Wildan Zulfikar</strong>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="../assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../assets/dist/js/adminlte.min.js"></script>
</body>
</html>