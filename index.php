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
<link rel="stylesheet" href="style.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <script type="text/javascript">
    window.onload=function(){
    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("cek_in")[0].setAttribute('min', today);
    document.getElementsByName("cek_out")[0].setAttribute('min', today);
    }
  </script> 
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
              <a href="index.php" class="nav-link">Home</a>
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
      <div class="content">
        <div class="container ">
          <div class="col-md-12">
            <?php 
            if(isset($_GET['pesan'])){
              if($_GET['pesan']=="gagal"){?>
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan !!!</h5>
                  Mohon maaf anda tidak bisa mengakses halaman ini
                </div>
              <?php }} ?>
            </div>
          </div>
        </div>    
        <section class="jumbotron text-center">
            <img src="assets/gambar/hotel7.jpg" class="img-thumbnail rounded-circle" alt="wildan zulfikar">
                  <h1 class="display-4">Jaya Makmur</h1>
                  <p class="lead">Jakarta - Timur</p>
        </section>
        <div class="content">
          <div class="container">
            <form action="proses_pesan.php" method="POST">
              <div class="col-md-12">
                <div class="card-body">
                  <div class="row">
                    <label class="col-sm-2 col-form-label">Tanggal Cek In</label>
                    <div class="col-sm-2">                  
                      <input type="date" name="cek_in" class="form-control" placeholder=".col-3" required>
                    </div>
                    <label class="col-sm-2 col-form-label">Tanggal Cek Out</label>
                    <div class="col-sm-2">                  
                      <input type="date" name="cek_out" class="form-control" placeholder=".col-4" required>
                    </div>
                    <label class="col-sm-2 col-form-label">Jumlah Kamar</label>
                    <div class="col-sm-1">                  
                      <input type="text" name="jml_kamar" class="form-control" placeholder="Jumlah Kamar" required>
                    </div>
                    <div class="col-sm-1">
                      <button type="button" class="form-control btn btn-primary" data-toggle="modal" data-target="#pesan">Pesan</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="pesan">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Form Pemesanan</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Nama Pemesan</label>
                        <input type="text" name="nama_pemesan" class="form-control" placeholder="Masukan Nama Pemesan" required>
                      </div>
                      <div class="form-group">
                        <label>Email Pemesan</label>
                        <input type="text" name="email_pemesan" class="form-control" placeholder="Masukan Email Pemesan" required>
                      </div>
                      <div class="form-group">
                        <label>No. Handphone</label>
                        <input type="text" name="hp_pemesan" class="form-control" placeholder="Masukan No. Handphone" required>
                      </div>
                      <div class="form-group">
                        <label>Nama Tamu</label>
                        <input type="text" name="nama_tamu" class="form-control" placeholder="Masukan Nama Tamu" required>
                      </div>
                      <div class="form-group">
                        <label>Harga</label>
                        <?php
                          include 'koneksi.php';
                          $data = mysqli_query($koneksi, "select * from kamar");
                          while ($d = mysqli_fetch_array($data)) { 
                            ?>
                            <input type="text" name="nama_tamu" class="form-control" placeholder="Harga Kamar" value="<?php echo $d['no_kamar']; ?>  :  <?php echo $d['harga']; ?>">
                            <?php
                          }
                          ?>
                      </div>
                      <div class="form-group">
                        <label>Tipe Kamar</label>
                        <select name="id_kamar" class="form-control">
                          <option value="">--- Pilih Kamar ---</option>
                          <?php
                          include 'koneksi.php';
                          $data = mysqli_query($koneksi, "select * from kamar");
                          while ($d = mysqli_fetch_array($data)) { 
                            ?>
                            <option value="<?php echo $d['id_kamar']; ?>"><?php echo $d['no_kamar']; ?></option>
                            <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Konfirmasi Pesanan</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
            </form>
            <div class="card">
              <div class="col-md-12">
                <div class="card-body">
                  <h2 class="text-center text-dark">Tentang Kami</h2><br>
                  <p class="text-center text-dark">Selamat Datang di Hotel Kami Semoga Liburan Anda Menyenangkan Silahkan Untuk Memesan Kamar yang Anda Inginkan
                    lepaskan diri anda ke hotel jaya makmur, dikelilingi oleh keindahan pegunungan yang indah, danau dan sawah menghijau, kids club 
                    yang lucu, menawarkan beragam fasilitas dan kegiatan anak - anak yang akan melengkapi kenyamanan keluarga conversion center kami,
                    di lengkapi pelayanan yang lengkap dengan ruang konvensi terbesar di jakarta timur, mampu mengakomodasi hingga 3000 delegasi
                    manfaatkan ruang penyelenggaraan konvensi ataupun mewujudkan acara pernikahan yang mewah.
                  </p>
                </div>
              </div>
            </div>          
          <br>
        </div>
        <!-- /.content -->
        
      </div>
      </div>
      <!-- /.content-wrapper -->

      <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      </aside>

      <!-- Main Footer -->
      <footer class="main-footer bg-primary">
        <!-- Default to the left -->
        <p class="text-center text-light"><strong>Copyright &copy; Wildan Zulfikar</strong></p>
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