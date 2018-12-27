<?php
session_start();
include "../koneksi.php";

$terimauser = $_SESSION['pengguna'];

if ($_SESSION['jabatan'] == 'admin'){
	if(isset($_POST['password'])){
		$getpass = mysql_query("SELECT password FROM admin WHERE username='$terimauser'");
		$getfetch = mysql_fetch_array($getpass);

		$passwordfromget = $getfetch['password'];

		$nama		= $_POST['nama'];
		$password 	= $_POST['password'];
		$password2 	= $_POST['password2'];

		if ($passwordfromget == $password2){
			$update = mysql_query("UPDATE admin SET nama_lengkap = '$nama', password='$password' WHERE username = '$terimauser'");
			if ($update){
				echo "<script language='javascript'>window.location.href='admin.php';</script>";
			}
			else {
				echo "gagal";
			}
		}
		else {
			echo "Kata sandi lama tidak sesuai";
		}
	}

	else {
		$getpass = mysql_query("SELECT password FROM admin WHERE username='$terimauser'");
		$getfetch = mysql_fetch_array($getpass);

		$passwordfromget = $getfetch['password'];

		$nama		= $_POST['nama'];
		$password2 	= $_POST['password2'];

		if ($passwordfromget == $password2){
			$update = mysql_query("UPDATE admin SET nama_lengkap = '$nama' WHERE username = '$terimauser'");
			if ($update){
				echo "<script language='javascript'>window.location.href='admin.php';</script>";
			}

			else {
				echo "Terjadi Kesalahan";
			}
		}

		else {
			echo "Kata sandi lama tidak sesuai";
		}
	}	
}

else {
	if($_POST['password'] != ""){
		$getpass = mysql_query("SELECT password_pekerja FROM pekerja WHERE username_pekerja = '$terimauser'");
		$getfetch = mysql_fetch_array($getpass);

		$passwordfromget = $getfetch['password_pekerja'];

		$nama		= $_POST['nama'];
		$password 	= $_POST['password'];
		$password2 	= $_POST['password2'];



		if ($passwordfromget == $password2){
			$update = mysql_query("UPDATE pekerja SET nama_pekerja = '$nama', password_pekerja = '$password' WHERE username_pekerja = '$terimauser'");
			if ($update){
				echo "<script language='javascript'>window.location.href='admin.php';</script>";
			}
			else {
				echo "Terjadi kesalahan";
			}
		}
		else {
			echo "Kata sandi lama tidak sesuai";
		}
	}

	else {
		$getpass = mysql_query("SELECT password_pekerja FROM pekerja WHERE username_pekerja = '$terimauser'");
		$getfetch = mysql_fetch_array($getpass);

		$passwordfromget = $getfetch['password_pekerja'];

		$nama		= $_POST['nama'];
		$password2 	= $_POST['password2'];

		if ($passwordfromget == $password2){
			$update = mysql_query("UPDATE pekerja SET nama_pekerja = '$nama' WHERE username_pekerja = '$terimauser'");
			if ($update){
				echo "<script language='javascript'>window.location.href='admin.php';</script>";
			}
			else {
				echo "gagal";
			}
		}

		else {
			echo "Kata sandi lama tidak sesuai";
		}
	}
}
?>