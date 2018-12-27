<?php
session_start();
include "../koneksi.php";

$nama	= $_SESSION['pengguna'];
if ($_SESSION['jabatan'] == 'pekerja'){
	$query 	= mysql_query("SELECT email_pekerja FROM pekerja WHERE username_pekerja = '$nama'");
	if(mysql_num_rows($query) == true){
		while($data	= mysql_fetch_array($query)){
			echo "<option value='".$data['email_pekerja']."'>".$data['email_pekerja']."</option>";
		}
	}
}

else{
	$query 	= mysql_query("SELECT email_pekerja FROM pekerja");
	if(mysql_num_rows($query) == true){
		while($data	= mysql_fetch_array($query)){
			echo "<option value='".$data['email_pekerja']."'>".$data['email_pekerja']."</option>";
		}
	}
}