<?php
session_start();
include('koneksi.php'); include('user/session_user.php');

if($_GET['action'] == 'insert_availability'){
	// Check for the username posted
	if(isset($_SESSION['username'])){
    	$kode 			= $_GET['kode'];
		$username       = $terimauser; // Get the username values
		$query_cek		= mysql_query("SELECT * FROM keranjang WHERE username = '$username' AND kode_produk = '$kode'");
		if ($query_cek){
			$cek = mysql_num_rows($query_cek);
			if ($cek == 0) {
				$query_insertcart = "INSERT INTO keranjang VALUES ('', '$username', '$kode')";
				$insercart = mysql_query($query_insertcart);

				if($insercart)
				{
					echo 1;
				}
	
				else
				{
					echo 0;
				}
			}

			else 
			{
				echo 2;
			}
		}
		else 
		{
			echo 0;
		}
	}

	else 
	{
		echo 0;
	}
}

else 
{
	echo 0;
}


?>	