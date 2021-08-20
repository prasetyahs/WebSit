<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database

include('../database/koneksi.php');

$username = $_POST['username'];
$password = $_POST['password'];

if (isset($_POST['kurir'])) {
	$login = mysqli_query($koneksi, "select * from tbl_kurir where username='$username' and password='$password'");
	$loginResult = mysqli_fetch_assoc($login);
	$cek = mysqli_num_rows($login);
	if ($cek > 0) {

		$_SESSION['username'] = $loginResult['username'];
		$_SESSION['id_kurir'] = $loginResult['id_kurir'];
		$_SESSION['level'] = "kurir";
		header("location:http://localhost/WebSit/admin/");
	} else {
		header("location:../_halaman1/login.php?pesan=gagal");
	}
} else {
	// menangkap data yang dikirim dari form login

	// menyeleksi data user dengan username dan password yang sesuai
	$login = mysqli_query($koneksi, "select * from admin where username='$username' and password='$password'");
	// menghitung jumlah data yang ditemukan
	$cek = mysqli_num_rows($login);

	// cek apakah username dan password di temukan pada database
	if ($cek > 0) {

		$data = mysqli_fetch_assoc($login);

		// cek jika user login sebagai admin
		if ($data['level'] == "admin") {

			// buat session login dan username
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "admin";
			// alihkan ke halaman dashboard admin
			header("location:http://localhost/WebSit/Admin/");

			// cek jika user login sebagai pegawai
		} else if ($data['level'] == "kurir") {
			// buat session login dan username
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "kurir";
			// alihkan ke halaman dashboard pegawai
			header("location:halaman_pegawai.php");

			// cek jika user login sebagai pengurus
		} else if ($data['level'] == "pegawai") {
			// buat session login dan username
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "pegawai";
			// alihkan ke halaman dashboard pengurus
			header("location:http://localhost/WebSit/Admin/");
		} else {

			// alihkan ke halaman login kembali
			header("location:../_halaman1/login.php?pesan=gagal");
		}
	} else {
		header("location:../_halaman1/login.php?pesan=gagal");
	}
}
