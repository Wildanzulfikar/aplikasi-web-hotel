<?php 
include 'koneksi.php';
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
  <title>Aplikasi Pemesanan Hotel</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white bg-primary">
      <div class="container">
        <a href="" class="navbar-brand">
          <img src="assets/gambar/hotel7.jpg" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-dark text-white">Hotel Jaya Makmur</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar navbar-expand-lg navbar-dark bg-primary" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a href="index.php" class="nav-link active" aria-current="true"">Home</a>
            </li>
            <li class="nav-item">
              <a href="kamar.php" class="nav-link">Kamar</a>
            </li>
            <li class="nav-item">
              <a href="fasilitas.php" class="nav-link">Fasilitas</a>
            </li>
            <li class="nav-item">
              <a href="pesanan.php" class="nav-link">Pesanan Saya</a>
            </li>
            <li class="nav-item">
              <a href="login.php" class="nav-link">Login</a>
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
          <?php
          $query = "SELECT * FROM kamar ORDER BY id_kamar ASC";
          $result = mysqli_query($koneksi, $query);
          if (!$result) {
            die("Query Error: ".mysqli_errno($koneksi). " - ".mysqli_error($koneksi));
          }

          $no = 1;

          while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-md-12">
              <div class="card card-outline card-info">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="card-body card-outline">
                        <table>
                          <tr>
                            <td><b>Nama Kamar :</b> <?php echo $row['no_kamar']; ?></td>
                          </tr>
                          <tr>
                            <td> 
                              <b>Fasilitas :</b> <br>                             
                              <?php 
                              $fasilitas_kamar = mysqli_query($koneksi, "select * from fasilitas_kamar");
                              while ($a = mysqli_fetch_array($fasilitas_kamar)) {
                                if ($a['id_kamar'] == $row['id_kamar']) { ?>
                                  <?php echo $a['fasilitas']; ?>
                                  <?php
                                }
                              }
                              ?> 
                            </td>
                            <tr>
                            <td>
                            <b>Harga :</b> <br>                             
                              <?php 
                              $kamar = mysqli_query($koneksi, "select * from kamar");
                              while ($a = mysqli_fetch_array($kamar)) {
                                if ($a['id_kamar'] == $row['id_kamar']) { ?>
                                  <?php echo $a['harga']; ?>
                                  <?php
                                }
                              }
                              ?> 
                            </td>
                            </tr>
                          </tr>
                        </table>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body card-outline">
                        <img class="d-block w-100" src="admin/gambar/<?php echo $row['foto']; ?>" height="300">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php $no++; } ?>

          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
      

      <!-- Main Footer -->
      <footer class="main-footer text-center bg-primary">
        <strong>Copyright &copy; Wildan Zulfikar</strong>
      </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
  </body>
  </html>