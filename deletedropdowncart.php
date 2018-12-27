<?php
session_start();
include('koneksi.php'); include('user/session_user.php');

if($_GET['action'] == 'insert_availability'){
	// Check for the username posted
    $kode 			= $_GET['kode'];
	$username       = $terimauser; // Get the username values

	$query 			="DELETE FROM keranjang WHERE username = '$terimauser' AND kode_produk = '$kode'";
	$deletecart = mysql_query($query);
	if($deletecart)
	{
		echo 1;
	}
	
	else
	{
		echo 0;
	}

}
else {
	echo "<script> alert(gagal)</script>";
}
