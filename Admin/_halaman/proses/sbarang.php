<?php
session_start();
include '../database/koneksi.php';


$id_barang	            = $_POST['kodbar'];
$nama_barang 		    = $_POST['namabarang'];
$jenis_barang 			= $_POST['jenisbarang'];
$berat			        = $_POST['berat'];
$qty			        = $_POST['qty'];
$jenis_packing		    = $_POST['jenispacking'];
$tujuan			        = $_POST['tujuan'];
$penerima			    = $_POST['penerima'];
$alamat_penerima 		= $_POST['alamat'];
$nohp 			        = $_POST['nohp'];
$lat 					= $_POST['lat'];
$long 					= $_POST['long'];

if($lat != null && $long != null){
	$sql = "INSERT INTO  tbl_barang  VALUES ('$id_barang','$nama_barang','$jenis_barang','$berat','$qty','$jenis_packing','$tujuan','$penerima','$alamat_penerima','$nohp','$lat','$long')";



	if ($koneksi->query($sql) === TRUE) {
		header("location:http://localhost/WebSit/Admin/?halaman=barang");
	}else{
		echo "Error: ".$sql."<br>".$koneksi->error;
	}
}else{
	$_SESSION['message'] = "Mohon input titik lokasi yang ingin dikirim !";
	$_SESSION['type'] = "danger";
	header("location:http://localhost/WebSit/Admin/?halaman=I_barang");
}

 
// menginput data ke table barang
 

?>