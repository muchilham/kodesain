<?php

session_start();
include "../koneksi.php";

$terimauser = $_POST['ini'];


$query 		= mysql_query("DELETE FROM project WHERE photo = '$terimauser'");

if ($query == true ){
			echo "<script language=\"Javascript\">\n";
			echo "window.location.href='pengaturan.php'";
			echo "</script>";
			}
else {
	echo "gagal";
}

?>