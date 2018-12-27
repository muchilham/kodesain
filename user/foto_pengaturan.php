<?php 
if(isset($_SESSION['username'])){
	if($_POST || $_GET){
		include "../koneksi.php";
		session_start();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Selamat Datang</title>
</head>

<body>
<div id="userContainer"><a href="#" id="userButton"><span><img src="<?php echo $_SESSION['foto'];?>" /></span></a>
	<div id="userBox">
		<div id="userForm">
        	<center><span><a href="pengaturan.php">Pengaturan</a></span></center>
			<center><span><a href="logout.php" onclick="alert('Anda Berhasil Keluar')">Keluar</a></span></center>	
		</div>	                    
	</div>
</div>


<?php
}else{
	echo "<script>window.location.href='index.php';</script>";
	echo "<script language='javascript'>window.alert('anda gagal login');</script>";
}
?>

</body>
</html>