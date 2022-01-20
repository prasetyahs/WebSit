<?php
session_start();
include 'koneksi.php';


$id_barang	            =$_POST['kodbar'];
$nama_barang 		    = $_POST['nama_barang'];
$jenis_barang 			= $_POST['jenis_barang'];
$berat			        = $_POST['berat'];
$qty			        = $_POST['qty'];
$jenis_packing		    = $_POST['jenis_packing'];
$tujuan			        = $_POST['tujuan'];
$penerima			    = $_POST['penerima'];
$alamat_penerima 		= $_POST['alamat'];
$nohp 			        = $_POST['nohp'];

 
// menginput data ke table barang
 

$query= "UPDATE `tbl_barang` SET nama_barang='$nama_barang', jenis_barang='$jenis_barang', berat='$berat', qty='$qty', jenis_packing='$jenis_packing', tujuan='$tujuan',penerima='$penerima', alamat_penerima='$alamat_penerima', nohp='$nohp' WHERE id_barang='$id_barang'";
mysqli_query($koneksi, $query);

header("location:http://localhost/WebSit/Admin/?halaman=barang");


?>