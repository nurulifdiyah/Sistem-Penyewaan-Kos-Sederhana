<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'db.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from user where password='$password' and username='$username' ");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['role']=="admin"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "admin";
		$_SESSION['status'] = "sudah_login";
		// alihkan ke halaman dashboard admin
		header("location:admin.php");

	// cek jika user login sebagai member
	}else if($data['role']=="penyewa"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "penyewa";
		$_SESSION['status'] = "sudah_login";
		// alihkan ke halaman dashboard member
		header("location:penyewa.php");
 
	}else{
 
		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}	
}else{
	header("location:login.php?pesan=gagal");
}
 
?>