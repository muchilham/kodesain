<?php
session_start();
include "../koneksi.php";

$terimauser = $_SESSION['username'];


$getpass = mysql_query("SELECT password FROM user WHERE username='$terimauser'");
$getfetch = mysql_fetch_array($getpass);
$passwordfromget = $getfetch['password'];

if($_POST['password'] == true){
	$fullname	= $_POST['name'];
	$password 	= $_POST['password'];
	$password2 	= $_POST['password2'];
	$alamat		= $_POST['alamat'];
	$telepon	= $_POST['phone'];
	if ($passwordfromget == md5($password2)){
		$update = mysql_query("UPDATE user SET password= md5('$password'), nama_lengkap = '$fullname', alamat = '$alamat', telepon = '$telepon' WHERE username = '$terimauser'");
		if ($update){
			echo "<script language='javascript'>window.location.href='pengaturan.php?id=1';</script>";
		}
		else {
			echo "ada kesalahan";
			echo "<script language=javascript>setTimeout(\"location.href='../index.php'\",4000)</script>";
		}
	}

	else {
		echo "password tidak sesuai";
		echo "<script language=javascript>setTimeout(\"location.href='../index.php'\",4000)</script>";
	}
}

else {
	$fullname	= $_POST['name'];
	$password2 	= $_POST['password2'];
	$alamat		= $_POST['alamat'];
	$telepon	= $_POST['phone'];
	if ($passwordfromget == md5($password2)){
		$update = mysql_query("UPDATE user SET nama_lengkap = '$fullname', alamat = '$alamat', telepon = '$telepon' WHERE username = '$terimauser'");
		if ($update){
			echo "<script language='javascript'>window.location.href='pengaturan.php?id=1';</script>";
		}
		else {
			echo "ada kesalahan";
			echo "<script language=javascript>setTimeout(\"location.href='../index.php'\",4000)</script>";
		}
	}

	else {
		echo "password tidak sesuai";
		echo "<script language=javascript>setTimeout(\"location.href='../index.php'\",4000)</script>";
	}
}

?>