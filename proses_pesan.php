<?php 
//Tambahkan Koneksi Databases
include 'koneksi.php';

//menerima data dari form
$cek_in = $_POST['cek_in'];
$cek_out = $_POST['cek_out'];
$jml_kamar = $_POST['jml_kamar'];
$nama_pemesan = $_POST['nama_pemesan'];
$email_pemesan = $_POST['email_pemesan'];
$hp_pemesan = $_POST['hp_pemesan'];
$nama_tamu = $_POST['nama_tamu'];
$id_kamar = $_POST['id_kamar'];

//mengirim ke databases
mysqli_query($koneksi, "insert into pesanan values('','$cek_in','$cek_out','$jml_kamar','$nama_pemesan','$email_pemesan','$hp_pemesan','$nama_tamu','$id_kamar','1')");

//Sesudah Menginput Di alihkan Ke halaman index
header("location:index.php");
?>