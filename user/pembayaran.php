<?php
session_start();

	function commit(){
		mysql_query("COMMIT");
	}

	function begin(){
		mysql_query("BEGIN");
	}

	function rollback(){
		mysql_query("ROlLBACK");
	}

include "../koneksi.php";

$username		= $_SESSION['username'];

$waktu			= $_POST['waktu'];
$totalharga		= $_POST['totalharga'];
$pembayaran		= $_POST['bayar'];
$atasnama		= $_POST['atasnama'];
$bukti			= $_FILES['bukti']['name'];
$bukti_tmp	 	= $_FILES['bukti']['tmp_name'];
$kode_pembelian	= mt_rand();

try{
	begin();
	$move = move_uploaded_file($bukti_tmp, "../img/bukti/$username-$bukti");
	if ($move == true) {
		$query	= mysql_query("INSERT INTO pembayaran VALUES ('', '$username', '$waktu', '$totalharga', '$pembayaran', '$atasnama', '$bukti')");
		if ($query == true) {
			$select = mysql_query("SELECT keranjang.*,
					    produk.*,
					    produk_detil.*
					    FROM keranjang INNER JOIN produk 
					    ON keranjang.kode_produk = produk.kode_produk
					    INNER JOIN produk_detil
					    ON produk.kode_produk = produk_detil.kode_produk 
					    WHERE keranjang.username = '$username'");
			mysql_query("INSERT INTO pembelian VALUES ('$kode_pembelian', '$username');");
			while ($data = mysql_fetch_array($select)) {
				$kode_produk	= $data['kode_produk'];
				$nama_produk	= $data['nama_produk'];
				$harga			= $data['harga'];
				$foto_produk	= $data['foto_produk'];
				mysql_query("INSERT INTO pembelian_detil VALUES ('', '$kode_pembelian', '$kode_produk', '$nama_produk', '$harga', '$foto_produk', '$waktu');");
				mysql_query("DELETE FROM keranjang WHERE username = '$username'");
			}
		}
		else {
			echo die(mysql_error());
		}
	}

	else {
		echo "Gagal";
	}

	header("location:../index.php");

	commit();
}

catch(Exception $err){
	rollback();
	echo $err;
}
?>