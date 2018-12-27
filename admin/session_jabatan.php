<?php

include "../koneksi.php";

$query 	= mysql_query("SELECT jabatan FROM combojabatan ORDER BY jabatan ASC");
if(mysql_num_rows($query) == true){
	while($data	= mysql_fetch_array($query)){
		echo "<option value='".$data['jabatan']."'>".$data['jabatan']."</option>";
	}
}