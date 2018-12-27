<?php
	include "../koneksi.php";
	$email 		= $_POST['email'];
    $password   = rand();
    $md5        = md5($password);

    $update = mysql_query("UPDATE user SET password = '$md5' WHERE email = '$email'");
    $has    = mysql_query("SELECT password FROM user WHERE email = '$email'");
    if ($update == true){
        if($has){
    	   $pesan	= "Password Anda adalah".$password;
    	   mail($email,'Password Akun',$pesan,'From: Kodesain');
    	   header("location:lupa_password_sukses.php");
	   } 

	   else{
		  header("location:lupa_password_gagal.php");
        }
    }

    else{
       header("location:lupa_password_gagal.php")
    }
?>