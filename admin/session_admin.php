<?php
session_start();
$terimauser = $_SESSION['pengguna'];

if ($_SESSION['jabatan'] == 'admin'){
	$data = "SELECT foto FROM admin WHERE username='$terimauser';";
	$Hdata = mysql_query($data);
	$rData = mysql_num_rows($Hdata);
	list($photos) = mysql_fetch_row($Hdata);

	if ($rData == true){
		$_SESSION['foto'] 			= "images/".$photos;

	}

	else {
		echo "GAGAL";
	}
}

else {
	$data = "SELECT foto_pekerja FROM pekerja WHERE username_pekerja ='$terimauser';";
	$Hdata = mysql_query($data);
	$rData = mysql_num_rows($Hdata);
	list($photos) = mysql_fetch_row($Hdata);

	if ($rData == true){
		$_SESSION['foto'] 			= "pekerja/".$photos;

	}

	else {
		echo "GAGAL";
	}

}

?>