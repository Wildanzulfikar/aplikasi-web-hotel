<?php
include '../koneksi.php';
$id_galeri = $_GET["id_galeri"];
//mengambil id yang ingin dihapus

    //jalankan query DELETE untuk menghapus data
$query = "DELETE FROM galeri WHERE id_galeri='$id_galeri' ";
$hasil_query = mysqli_query($koneksi, $query);

    //periksa query, apakah ada kesalahan
if(!$hasil_query) {
  die ("Gagal menghapus data: ".mysqli_errno($koneksi).
   " - ".mysqli_error($koneksi));
} else {
  echo "<script>alert('Data berhasil dihapus.');window.location='galeri.php';</script>";
}