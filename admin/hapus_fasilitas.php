<?php 
//menambahkan koneksi
include '../koneksi.php';

//menangkap data yang di kirim dari url
$id_fasilitas=$_GET['id_fasilitas'];

//menghapus data dari tabel databases
mysqli_query($koneksi, "delete from fasilitas_kamar where id_fasilitas='$id_fasilitas'");
//mengalihkan ke halaman index setelah berhasil menghapus
header("location:fasilitas.php");
?>