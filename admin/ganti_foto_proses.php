<?php
session_start();
include "../koneksi.php";

$terimauser 	= $_SESSION['pengguna'];
$tmp_name 		= $_FILES["pic"]["tmp_name"];
$pic_name 		= $_FILES["pic"]["name"];

if ($_SESSION['jabatan'] == 'admin'){
	$move = move_uploaded_file($tmp_name, "images/".$pic_name);
	if ($move){
		$update = mysql_query("UPDATE admin SET foto = '$pic_name'  WHERE username='$terimauser'");
		if ($update == true){
			echo "<script language='javascript'>window.location.href='admin.php';</script>";
		}
		else {
			echo "<center>Ukuran Foto terlalu Besar</center>";
		}
	}

	else {
		echo " Terjadi Kesalahan";
	}
}

else {
	$move = move_uploaded_file($tmp_name, "pekerja/".$pic_name);
	if ($move){
		$update = mysql_query("UPDATE pekerja SET foto_pekerja = '$pic_name'  WHERE username_pekerja ='$terimauser'");
		if ($update == true){
			echo "<script language='javascript'>window.location.href='admin.php';</script>";
		}
		else {
			echo "<center>Ukuran Foto terlalu Besar</center>";
		}
	}

	else {
		echo "Terjadi kesalahan";
	}
}
?>