<?php
include 'koneksi.php';

function insertUser($data)
{
    global $db_connect;
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	$password = ($_POST["password"]);
	$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
	$lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
	$alamat = ($_POST['alamat']);
	$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
	$phone = ($_POST['phone']);
	$level = ($_POST['level']);

    $sql = "INSERT admin VALUES('','$username','$name','$email','$password','$phone','$alamat','level')";
    mysqli_query($db_connect, $sql);
    return mysqli_affected_rows($db_connect);
}
?>