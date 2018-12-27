<?php
session_start();
include "../koneksi.php";

$user	= $_POST['username'];
$pass	= $_POST['password'];

$data = "SELECT username, password, nama_lengkap, email, photos, alamat, telepon, status FROM user WHERE username = '$user' AND password = MD5('$pass')";

$Hdata = mysql_query($data);
$rData = mysql_num_rows($Hdata);
list($username, $password, $nama, $email, $photos, $alamat, $telepon, $status) = mysql_fetch_row($Hdata);
//if ($status == "aktif"){
	if ($rData == true){
		$_SESSION['username'] 	= $username;
		$_SESSION['password']	= $password;
		$_SESSION['email'] 		= $email;
		$_SESSION['nama']		= $nama;
		$_SESSION['alamat']		= $alamat;
		$_SESSION['telepon']	= $telepon;
		$_SESSION['photos'] 	= "user/uploads/".$photos;
		header("location:../index.php");
	}
	else{
    	echo "<script language='javascript'>alert('Username atau password salah, silahkan coba lagi.');</script>";
    	echo "<script>window.location.href='../index.php';</script>";
    }

/*else {
    	echo "<script language='javascript'>alert('Status anda belum aktif, silahkan cek email dan konfirmasi lewat email anda');</script>";
    	echo "<script>window.location.href='../index.php';</script>";
}*/
?>