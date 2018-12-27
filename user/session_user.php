<?php

$terimauser 	= $_SESSION['username'];

if(!isset($_GET['id']) && !isset($_GET['page'])){
$getfoto = mysql_query("SELECT nama_lengkap, photos FROM user WHERE username='$terimauser'");
$getfetch = mysql_fetch_array($getfoto);

$_SESSION['nama']	= $getfetch['nama_lengkap'];
$foto = $getfetch['photos'];
$direktori = "user/uploads/" . $foto;

$_SESSION['bebas'] = $direktori;
}

elseif (isset($_GET['id']) && !isset($_GET['page'])){
	$getfoto = mysql_query("SELECT nama_lengkap, photos FROM user WHERE username='$terimauser'");
	$getfetch = mysql_fetch_array($getfoto);

	$_SESSION['nama']	= $getfetch['nama_lengkap'];
	$foto = $getfetch['photos'];
	$direktori = "uploads/" . $foto;

	$_SESSION['bebas'] = $direktori;
}

else {
	$getfoto = mysql_query("SELECT nama_lengkap, photos FROM user WHERE username='$terimauser'");
	$getfetch = mysql_fetch_array($getfoto);

	$_SESSION['nama']	= $getfetch['nama_lengkap'];
	$foto = $getfetch['photos'];
	$direktori = "uploads/" . $foto;

	$_SESSION['bebas'] = $direktori;
}

?>