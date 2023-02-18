<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from users where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek >= 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['level']=="1"){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "1";
		// alihkan ke halaman dashboard admin
		header("location:admin");

	// cek jika user login sebagai resepsionis
	}else if($data['level']=="2"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "2";
		// alihkan ke halaman dashboard resepsionis
		header("location:resepsionis");

	}else if($data['level']=="0"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "0";
		// alihkan ke halaman dashboard resepsionis
		header("location:index.php");

	}else{

		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}	
}else{
	header("location:login.php?pesan=gagal");
}

?>