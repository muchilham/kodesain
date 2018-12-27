<?php
session_start();

if ($_SESSION['username'] == true){
	$terimauser = $_SESSION['username'];
	include "../koneksi.php";
	$data = "SELECT username, email, password, nama_lengkap, alamat, telepon, photos, status FROM user WHERE username='$terimauser';";
	$Hdata = mysql_query($data);
	$rData = mysql_num_rows($Hdata);
	list($user, $email, $password, $fullname, $alamat, $telepon, $photos) = mysql_fetch_row($Hdata);

	if ($rData == true){
		$_SESSION['username'] 		= $user;
		$_SESSION['email'] 			= $email;
		$_SESSION['foto'] 			= "uploads/".$photos;
		$_SESSION['password'] 		= $password; 
		$_SESSION['fullname']		= $fullname;
		$_SESSION['alamat']			= $alamat;
		$_SESSION['telepon']		= $telepon;
	}

	else {
		echo "<script language='javascript'>alert('Silahkan login dahulu sebagai member');</script>";
    	echo "<script>window.location.href='../index.php';</script>";
	}
}

else {

}

?>