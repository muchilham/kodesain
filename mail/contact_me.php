<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
	
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$query	= mysql_query("INSERT INTO _pesan VALUES ('$name', '$email', '$phone', '$message')");

if ($query){
		echo "<script language=javascript>
		   setTimeout(\"location.href='../index.php'\",1000)</script>";
}

else {
	echo "Terjadi Kesalahan dalam pengisian";
	echo "<script language=javascript>
		   setTimeout(\"location.href='../index.php'\",1000)</script>";
}
return true;			
?>