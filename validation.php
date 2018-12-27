<?php
$value = $_GET['query'];
$field = $_GET['field'];
include "koneksi.php";
//Cek Validasi
if($field == "username")
{
	if(strlen($value) < 4) 
	{
		echo "<i class=\"fa fa-exclamation-circle\"></i> Harus lebih dari 3 huruf";

	} 
	else 
	{
		$query = mysql_num_rows(mysql_query("SELECT * FROM user WHERE $field = '$value'")) > 0 ;
		if ($query != true){
			echo "<span><font color='#1abf12'><i class=\"fa fa-check-circle\"></i> Tersedia</font></span>";
		}
		else {
			echo "<i class=\"fa fa-exclamation-circle\"></i> Username sudah digunakan";
		}
	}
}
 
if($field == 'usernamenya')
{
	if(strlen($value) < 6)
	{
		echo "<i class=\"fa fa-exclamation-circle\"></i> Buruk";
	}

	elseif (strlen($value) > 6 && strlen($value) < 10)
	{
		echo "<span><font color='#eac914'><i class=\"fa fa-check-circle\"></i> Cukup</font></span>";
	}

	else
	{
		echo "<span><font color='#1abf12'><i class=\"fa fa-check-circle\"></i> Bagus</font></span>";
	}
}


 
if($field == "email")
{
	$query = mysql_num_rows(mysql_query("SELECT * FROM user WHERE $field = '$value'")) > 0 ;

	if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $value)) 
	{
		echo "<i class=\"fa fa-exclamation-circle\"></i> Format email salah!";
	}

	else
	{
		if ($query != true){
			echo "<span><font color='#1abf12'><i class=\"fa fa-check-circle\"></i> Tersedia</font></span>";
		}
		else {
			echo "<i class=\"fa fa-exclamation-circle\"></i> Email sudah digunakan";
		}
	}
}


?>