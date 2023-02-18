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
            <div class="col-sm-6 mt-2">
              <h1 class="m-0">Fasilitas Kamar</h1>
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
                Edit Data Fasilitas
              </div>
              <div class="card-body">
                <?php
                include '../koneksi.php';
                $id_fasilitas = $_GET['id_fasilitas'];
                $data = mysqli_query($koneksi, "select * from fasilitas_kamar where id_fasilitas='$id_fasilitas'");
                while($d = mysqli_fetch_array($data)){
                  ?>
                  <form action="update_fasilitas.php" method="POST">
                    <div class="form-group">
                      <label>No. Kamar</label>
                      <input type="hidden" name="id_fasilitas" value="<?php echo $d['id_fasilitas'] ?>">
                      <select name="id_kamar" class="form-control">
                        <option value="">--- Pilih Kamar ---</option>
                        <?php 
                        $kamar = mysqli_query($koneksi, "select * from kamar");
                        while ($a = mysqli_fetch_array($kamar)) {
                          if ($a['id_kamar'] == $d['id_kamar']) { ?>
                            <option value="<?php echo $a['id_kamar']; ?>" selected><?php echo $a['no_kamar']; ?></option>";
                          <?php }else{ ?>
                            <option value="<?php echo $a['id_kamar']; ?>"><?php echo $a['no_kamar']; ?></option>";
                          <?php }
                        }
                        ?>  
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Fasilitas Kamar</label>
                      <textarea name="fasilitas" class="form-control" rows="3"><?php echo $d['fasilitas'] ?></textarea>
                    </div> 
                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
                <?php } ?>
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

  <div class="modal fade" id="tambah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Fasilitas Kamar</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="tambah_fasilitas.php" method="POST">
            <div class="form-group">
              <label>No. Kamar</label>
              <select name="id_kamar" class="form-control">
                <option value="">--- Pilih Kamar ---</option>
                <?php
                include '../koneksi.php';
                $data = mysqli_query($koneksi, "select * from kamar");
                while ($d = mysqli_fetch_array($data)) { 
                  ?>
                  <option value="<?php echo $d['id_kamar']; ?>"><?php echo $d['no_kamar']; ?></option>
                  <?php
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Fasilitas Kamar</label>
              <textarea name="fasilitas" class="form-control" rows="3"></textarea>
            </div>         
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</body>
</html>