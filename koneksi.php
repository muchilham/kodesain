<?php
ini_set("display_errors", "Off");
$host	= "localhost";
$user	= "root";
$pw		= "";
$db		= "kodesain_db";

mysql_connect($host, $user, $pw) or die (mysql_error());
mysql_select_db($db) or die ("Database tidak ditemukan");

?>
