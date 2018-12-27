<?php
session_start();
include "../koneksi.php";


$user		= $_POST['username'];
$email		= $_POST['email'];
$pass		= $_POST['usernamenya'];
$kode		= md5(uniqid(rand()));

$data = "INSERT INTO user VALUES('$user', '$email', md5('$pass'), '', '', '', '1412876682_user.png', '$kode', 'nonaktif')";
$Hdata = mysql_query($data);
	if($Hdata){
		/*$pesan = " Untuk aktivasi pendaftaran silahkan klik link konfirmasi yang ada dibawah ini \n\nhttp://kodesain.esy.es/user/aktivasi_email.php?email=".$email."&key=".$kode."\n\nJika anda lupa password akun anda, anda bisa meresetnya dengan mengklik link dibawah ini \n\nhttp://kodesain.esy.es/user/lupa_password.php?email=".$email."&key=".$kode;
		mail($email,'Registrasi Pendaftaran',$pesan,'From: Kodesain');*/
		header("location:register_sukses.php");
	}

	else {
			echo die(mysql_error());
	}
?>