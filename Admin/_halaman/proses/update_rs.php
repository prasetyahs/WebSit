<?php
session_start();
include 'koneksi.php';


$id_barang	            =$_POST['kodbar'];
$namabarang 		    = $_POST['nama_barang'];
$jenis_barang 			= $_POST['jenisbarang'];
$berat			        = $_POST['berat'];
$qty			        = $_POST['qty'];
$jenis_packing		    = $_POST['jenispacking'];
$tujuan			        = $_POST['tujuan'];
$penerima			    = $_POST['penerima'];
$alamat_penerima 		= $_POST['alamat'];
$nohp 			        = $_POST['nohp'];

 
// menginput data ke table barang
 

$query= "UPDATE `tbl_barang` SET namabarang='$nama_barang', jenisbarang='$jenis_barang', berat='$berat', qty='$qty', jenispacking='$jenis_packing', tujuan='$tujuan',penerima='$penerima', alamat='$alamat_penerima', nohp='$nohp' WHERE kodbar='$id_barang'";
mysqli_query($koneksi, $query);

header("location:http://localhost/WebSit/Admin/?halaman=barang");


?>