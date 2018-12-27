<?php
session_start();
include "../koneksi.php";

$terimauser 	= $_SESSION['username'];
$tmp_name 		= $_FILES["pic"]["tmp_name"];
$pic_name 		= $_FILES["pic"]["name"];
$foto 			= "$terimauser-$pic_name";

$move = move_uploaded_file($tmp_name, "uploads/".$foto);

if($move){
	$update = mysql_query("UPDATE user SET photos = '$foto'  WHERE username='$terimauser'");
	if ($update == true){
			echo "<script language='javascript'>window.location.href='pengaturan.php?id=1';</script>";
	}
	else {
		echo "<center>Ukuran Foto terlalu Besar</center>";
	}
}
?>