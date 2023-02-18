<?php 
//Tambahkan Koneksi Databases
include '../koneksi.php';

//menerima data dari form
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

//mengirim ke databases
mysqli_query($koneksi, "insert into users values('','$nama','$username','$password','$level')");

//Sesudah Menginput Di alihkan Ke halaman index
header("location:users.php");
?>