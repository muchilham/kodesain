<?php
session_start();
include "../koneksi.php";

$username	= $_POST['username'];
$password	= $_POST['password'];

$query 	= mysql_query("SELECT username, nama_lengkap FROM admin WHERE username = '$username' AND password = '$password';");
$query1 = mysql_query("SELECT username_pekerja, nama_pekerja, email_pekerja FROM pekerja WHERE username_pekerja = '$username' AND password_pekerja = '$password'");

$row	= mysql_num_rows($query);
$row1	= mysql_num_rows($query1);



if ($row > 0 && $row1 < 1){
	list($user, $nama, $email, $foto) = mysql_fetch_row($query);

	$_SESSION['pengguna']			= $user;
	$_SESSION['nama_lengkap']		= $nama;
	$_SESSION['jabatan']			= "admin";
	header('location:admin.php');
}

else if ($row1 > 0 && $row < 1) {
	list($user, $nama, $email, $foto) = mysql_fetch_row($query1);

	$_SESSION['pengguna']			= $user;
	$_SESSION['nama_lengkap']		= $nama;
	$_SESSION['email_pekerja']		= $email;
	$_SESSION['jabatan']			= "pekerja";
	header('location:admin.php');
}
else{
	   	echo "<script language='javascript'>alert('Username atau password salah, silahkan coba lagi.');</script>";
    	echo "<script>window.location.href='index.php';</script>";
}

?>