<?php  
//tambahkan koneksi
include '../koneksi.php';

//ambil data dari form edit
$id = $_POST['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

//update data ke tabel databases
mysqli_query($koneksi, "update users set id='$id', nama='$nama', username='$username', password='$password', level='$level' where id='$id'");

//mengalihkan ke halaman index setelah berhail mengupdate
header("location:users.php");
?>