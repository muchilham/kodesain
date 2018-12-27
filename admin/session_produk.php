<?php
session_start();

$email = $_SESSION['email_pekerja'];

$selectProductBy 	= mysql_query("SELECT * FROM produk where email_pekerja='$email'");
$NumBy				= mysql_num_rows($selectProductBy);

$CodeBy				= $_SESSION['pengguna'];
$CodeBy				= strtoupper(substr_replace($CodeBy, "", 3));
$NumBy++;
$CodeBy = $CodeBy.$NumBy;
		
?>