<?php
session_start();
include '../database/koneksi.php';


    $id_pengirim	    =$_POST['kodpeng'];
    $nama 		        = $_POST['nama'];
    $alamat 			= $_POST['alamat'];
    $no_tlp			    = $_POST['tlpn'];


 
// menginput data ke table barang
 
$sql = "INSERT INTO  tbl_pengirim  VALUES ('$id_pengirim','$nama','$alamat','$no_tlp')";



if ($koneksi->query($sql) === TRUE) {
	header("location:http://localhost/WebSit/Admin/?halaman=pengirim");
}else{
	echo "Error: ".$sql."<br>".$koneksi->error;
}
?>