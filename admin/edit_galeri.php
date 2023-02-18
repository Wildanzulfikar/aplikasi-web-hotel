<?php 
include '../koneksi.php';

if (isset($_GET['id_galeri'])) {
  $id_galeri = ($_GET['id_galeri']);
  $query = "SELECT * FROM galeri WHERE id_galeri='$id_galeri'";
  $result = mysqli_query($koneksi, $query);
  if (!$result) {
    die('Query Error: '.mysqli_errno($koneksi). " - ".mysqli_error($koneksi));
  }
  $data = mysqli_fetch_assoc($result);
  if (!count($data)) {
    echo "<script>alert('Data tidak ditemukan di database');window.location='galeri.php';</script>";
  }
} else {
  echo "<script>alert('Masukan Data');window.location='galeri.php';</script>";
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
  <title>Aplikasi Pemesanan Hotel</title>

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
          <img src="../assets/gambar/hotel7.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
        <div class="container mt-2">
          <div class="row mb-2">
            <div class="col-sm-6 mt-3">
              <h1 class="m-0">Galeri</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3>Edit Data Galeri</h3>
              </div>
              <div class="card-body">
                <form method="post" action="update_galeri.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Keterangan</label>
                    <input name="id_galeri" value="<?php echo $data['id_galeri']; ?>" hidden>
                    <input type="text" class="form-control" value="<?php echo $data['keterangan']; ?>" name="keterangan" placeholder="Keterangan">
                  </div>
                  <div class="form-group">
                    <label>Foto</label>
                    <img class="d-block" src="gambar/<?php echo $data['foto']; ?>" width="200">
                    <input type="file" name="foto" class="form-control">
                  </div>
                  <button type="submit" class="btn btn-primary">Update</button>
                </form>
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
      <!-- To the right -->
      <!-- Default to the left -->
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