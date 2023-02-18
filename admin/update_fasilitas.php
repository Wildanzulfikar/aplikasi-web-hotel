<?php  
//tambahkan koneksi
include '../koneksi.php';

//ambil data dari form edit
$id_fasilitas = $_POST['id_fasilitas'];
$id_kamar = $_POST['id_kamar'];
$fasilitas = $_POST['fasilitas'];

//update data ke tabel databases
mysqli_query($koneksi, "update fasilitas_kamar set id_kamar='$id_kamar', fasilitas='$fasilitas' where id_fasilitas='$id_fasilitas'");

//mengalihkan ke halaman index setelah berhail mengupdate
header("location:fasilitas.php");
?>