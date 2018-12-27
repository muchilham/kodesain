<?php
include "../koneksi.php";

$name	= $_POST['name'];
$email	= $_POST['email'];
$phone	= $_POST['phone'];
$pesan	= $_POST['message'];

$query = mysql_query("INSERT INTO pesan VALUES ('$name', '$email', '$phone', '$pesan');");
if ($query == true){
	header("location:../index.php");
}
else {
	echo die(mysql_error());
}
?>