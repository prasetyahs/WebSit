<?php
session_start();
require_once("../database/koneksi.php");





	// filter data yang diinputkan
    $username	=$_POST['username'];
	$password = $_POST["password"];
	$firstname = $_POST["firstname"];
	$lastname =$_POST["lastname"];
	$alamat = $_POST['alamat'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$level = $_POST['level'];

	
    // menyiapkan query
  
    
    $query_sql = "INSERT INTO admin (id_admin,username, password, firstname, lastname, alamat, email, phone, level) 
                                        VALUES ('','$username', '$password', '$firstname','$lastname','$alamat', '$email','$phone','$level')";
    
    if (mysqli_query($conn, $query_sql)) {
          echo "<h1>Username $username berhasil terdaftar</h1>
                <a href='pages/login.php'>Kembali Login</h1>
             ";
    } else {
          echo "Pendaftaran Gagal : " . mysqli_error($conn);
    }

    	
?>