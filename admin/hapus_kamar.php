<?php
include '../koneksi.php';
$id_kamar = $_GET["id_kamar"];
//mengambil id yang ingin dihapus

    //jalankan query DELETE untuk menghapus data
$query = "DELETE FROM kamar WHERE id_kamar='$id_kamar' ";
$hasil_query = mysqli_query($koneksi, $query);

    //periksa query, apakah ada kesalahan
if(!$hasil_query) {
  die ("Gagal menghapus data: ".mysqli_errno($koneksi).
   " - ".mysqli_error($koneksi));
} else {
  echo "<script>alert('Data berhasil dihapus.');window.location='kamar.php';</script>";
}