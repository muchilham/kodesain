<?php 

include "../koneksi.php";

$query 	= mysql_query("SELECT nama_pekerja FROM pekerja WHERE status_pekerja ='aktif' ORDER BY nama_pekerja ASC");
if(mysql_num_rows($query) == true){
	while($data	= mysql_fetch_array($query)){
		echo "<option value='".$data['nama_pekerja']."'>".$data['nama_pekerja']."</option>";
	}
}

?>