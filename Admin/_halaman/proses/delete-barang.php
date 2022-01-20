<?php 
include "../koneksi.php";

$id =$_GET['id_barang'];
$query = "SELECT * from tbl_barang where id_barang = '$id'";
$ex = mysqli_query($koneksi,$query);
$check = mysqli_num_rows($ex);
if($check > 0){
    $query = "DELETE from tbl_barang where id_barang='$id'";
    $ex = mysqli_query($koneksi,$query);
}
header("location:http://localhost/WebSit/Admin/?halaman=barang");