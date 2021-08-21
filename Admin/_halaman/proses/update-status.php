<?php

include '../koneksi.php';
include '../proses/crud.php';

// die;
if(isset($_POST['kurir'])){
    header("location:http://localhost/WebSit/Admin/?halaman=status");
    unset($_POST['kurir']);
}else{
    header("location:http://localhost/WebSit/Admin/?halaman=Pengiriman");    
}
$id_resi = $_POST['id_resi'];
$status = $_POST['status'];
$update = "Update tbl_resi set status='$status' where id_resi = '$id_resi'";
$result = mysqli_query($koneksi, $update);
