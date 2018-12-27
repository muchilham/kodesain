<?php
$terimauser 	= $_SESSION['pengguna'];
$getfoto 		= mysql_query("SELECT foto FROM admin WHERE username='$terimauser'");
$getfetch 		= mysql_fetch_array($getfoto);

$foto = $getfetch['foto'];
$direktori = "images/" . $foto;

$_SESSION['bebas'] = $direktori;
?>