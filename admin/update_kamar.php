<?php
include '../koneksi.php';
$id_kamar = $_POST['id_kamar'];
$no_kamar   = $_POST['no_kamar'];
$harga  = $_POST['harga'];
$foto = $_FILES['foto']['name'];
if($foto != "") {
  $ekstensi_diperbolehkan = array('png','jpg','jpeg');
  $x = explode('.', $foto);
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['foto']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$foto;
  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
    move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);
    $query  = "UPDATE kamar SET no_kamar = '$no_kamar', harga ='$harga', foto = '$nama_gambar_baru'";
    $query .= "WHERE id_kamar = '$id_kamar'";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
    } else {
      echo "<script>alert('Data berhasil diubah.');window.location='kamar.php';</script>";
    }
  } else {
    echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='galeri.php';</script>";
  }
} else {
  $query  = "UPDATE kamar SET no_kamar = '$no_kamar', harga = '$harga'";
  $query .= "WHERE id_kamar = '$id_kamar'";
  $result = mysqli_query($koneksi, $query);
      // periska query apakah ada error
  if(!$result){
    die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
     " - ".mysqli_error($koneksi));
  } else {
    echo "<script>alert('Data berhasil diubah.');window.location='kamar.php';</script>";
  }
}


