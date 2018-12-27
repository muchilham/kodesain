<?php
session_start();
include "../koneksi.php";
	$query 	= mysql_query("SELECT * FROM keahlian");
	if(mysql_num_rows($query) == true){
		while($data	= mysql_fetch_array($query)){
			echo "<option value='".$data['id']."'>".$data['kategori']."</option>";
		}
	}
	else {
		echo "gagal";
	}

?>