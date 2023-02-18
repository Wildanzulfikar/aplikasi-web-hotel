<?php
include '../koneksi.php';

$keterangan = $_POST['keterangan'];
$foto = $_FILES['foto']['name'];

if ($foto !="") {
	$ekstensi_diperbolehkan = array('png','jpg','jpeg');
	$x = explode('.', $foto);
	$extensi = strtolower(end($x));
	$file_tmp = $_FILES['foto']['tmp_name'];
	$angka_acak = rand(1,999);
	$nama_gambar_baru = $angka_acak.'-'.$foto;
	if (in_array($extensi, $ekstensi_diperbolehkan) == true) {
		move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);
		$query = "INSERT INTO galeri (keterangan,foto) VALUES ('$keterangan', '$nama_gambar_baru')";
		$result = mysqli_query($koneksi, $query);

		if (!$result) {
			die("Query gagal dijalankan : ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
		} else {
			echo "<script>alert('Data berhasil ditambah.');window.location='galeri.php';</script>";
		}
		
	} else {
		echo "<script>alert('Extensi gambar harus png atau jpg.');window.location='galeri.php';</script>";
	}
	
} else {
	$query = "INSERT INTO galeri (keterangan,foto) VALUES ('$keterangan', null)";
	$result = mysqli_query($koneksi, $query);

	if (!$result) {
		die("Query gagal dijalankan : ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
	} else {
		echo "<script>alert('Data berhasil ditambah.');window.location='galeri.php';</script>";
	}
}

?>