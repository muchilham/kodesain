<?php
session_start();
include "../koneksi.php";

$username	= $_POST['username'];
$fullname	= $_POST['fullname'];
$email		= $_POST['email'];
$alamat		= $_POST['alamat'];
$telepon	= $_POST['telepon'];
$tmp_name 	= $_FILES['foto']['tmp_name'];
$name 		= $_FILES['foto']['name'];
$worker		= $_POST['pekerja'];
$kategori	= $_POST['kategori'];
$deskripsi	= $_POST['deskripsi'];
$today 		= date('h-i-s, j-m-y');
$foto 		= "$username-$today-$name";
$select = mysql_query("SELECT email_pekerja FROM pekerja WHERE nama_pekerja = '$worker'");

list($email_pekerja) = mysql_fetch_row($select);

$move = move_uploaded_file($tmp_name, "images/$foto");

if($move){
	$data = "INSERT INTO project VALUES('', '$username', '$fullname', '$email', '$alamat', '$telepon', '$foto', '$email_pekerja', '$kategori', '$deskripsi', NOW(), 'Belum diterima')";
	$Hdata = mysql_query($data);

		if($Hdata){
			header("location:kirim_project_sukses.php");
		}

		else {
			/*echo "Terjadi Kesalahan dalam pengisian Form";
			echo "<script language=javascript>
					setTimeout(\"location.href='../index.php'\",1000);
                  </script>";*/ die(mysql_error());
		}
	}

else {
	echo "<center>Ukuran Foto anda terlalu besar</center>";
}
?>