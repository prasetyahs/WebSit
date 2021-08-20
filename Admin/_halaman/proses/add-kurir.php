<?php
include '../koneksi.php';
include '../proses/crud.php';
$_POST['nama'] = $_POST['firstName'] . ' '. $_POST['lastName'];
unset($_POST['firstName']);
unset($_POST['lastName']);



$addCourier = create($_POST, $koneksi, 'tbl_kurir');

header("location:http://localhost/WebSit/Admin/?halaman=kurir");
