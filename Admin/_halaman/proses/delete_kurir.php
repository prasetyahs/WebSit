<?php 

include '../koneksi.php';
include '../proses/crud.php';

$id = $_GET['id'];
$where = [
    'id_kurir' => $id
];
delete('tbl_kurir',$where,$koneksi);
header("location:http://localhost/WebSit/Admin/?halaman=kurir");