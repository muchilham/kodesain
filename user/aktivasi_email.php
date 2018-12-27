<?php
if(isset($_GET['email']) && isset($_GET['key'])){ 
        include "../koneksi.php"; 
        $email = $_GET['email'];
        $key = $_GET['key'];
	$has = mysql_query("update _user set status='aktif' where email='$email' and aktivasi='$key'");
	if($has){
		header("location:aktivasi_email_sukses.php"); 
	} else{
                echo "Gagal konfirmasi email anda silahkan anda <a href=../index.php>Registrasi</a> kembali"; 
        }
}
?>
