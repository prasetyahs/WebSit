<?php
session_start();
include '../database/koneksi.php';


    $id_resi	            =$_POST['kodres'];
    $Tglambil 		        = $_POST['tglA'];
    $Tglkirim 			    = $_POST['tglK'];
    $id_barang			    = $_POST['kodbar'];
    $id_pengirim			= $_POST['kodpeng'];
    $status			        = $_POST['status'];


 
// menginput data ke table barang
 
$sql = "INSERT INTO  tbl_resi  VALUES ('$id_resi','$Tglambil','$Tglkirim','$id_barang','$id_pengirim','$status')";



if ($koneksi->query($sql) === TRUE) {
	header("location:http://localhost/WebSit/Admin/?halaman=status");
}else{
	echo "Error: ".$sql."<br>".$koneksi->error;
}
?>