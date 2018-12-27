<?php 

include "../koneksi.php";

$query 	= mysql_query("SELECT kategori FROM keahlian ORDER BY kategori ASC");
if(mysql_num_rows($query) == true){
	while($data	= mysql_fetch_array($query)){
		echo "<option value='".$data['kategori']."'>".$data['kategori']."</option>";
	}
}

?>