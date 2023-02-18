<?php  
//tambahkan koneksi
include '../koneksi.php';

//ambil data dari form edit
$id_pesanan = $_POST['id_pesanan'];
$status = $_POST['status'];

//update data ke tabel databases
mysqli_query($koneksi, "update pesanan set id_pesanan='$id_pesanan', status='$status' where id_pesanan='$id_pesanan'");

//mengalihkan ke halaman index setelah berhail mengupdate
header("location:pesanan.php");
?>