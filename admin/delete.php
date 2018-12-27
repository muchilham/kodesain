<?php
include "../koneksi.php";

class delete{
	
	function delete_admin(){
		if(isset($_GET['id'])){
			$id	= $_GET['id'];

			$query = mysql_query("SELECT username FROM admin WHERE username = '$id'");
			if (mysql_num_rows($query) == 0){
			echo '<script>window.history.back()</script>';
			}

			else{
				$hapus = mysql_query("DELETE FROM admin WHERE username = '$id'");
				if ($hapus){
					header("location:view_admin.php");
				}
		
				else{		
					echo "Gagal menghapus data! ";
				}
			}
		}

		else{
			header("Terjadi Kesalahan");
		}
	}

	function delete_user(){
		if(isset($_GET['id'])){
			$id	= $_GET['id'];

			$query = mysql_query("SELECT username FROM user WHERE username = '$id'");
			if (mysql_num_rows($query) == 0){
			echo '<script>window.history.back()</script>';
			}

			else{
				$hapus = mysql_query("DELETE FROM user WHERE username = '$id'");
				if ($hapus){
					header("location:view_pengguna.php");
				}
		
				else{		
					echo "Gagal menghapus data! ";
				}
			}
		}

		else{
			header("Terjadi Kesalahan");
		}

	}

	function delete_keahlian(){
		if(isset($_GET['id'])){
			$id	= $_GET['id'];

			$query = mysql_query("SELECT kategori FROM keahlian WHERE kategori = '$id'");
			if (mysql_num_rows($query) == 0){
			echo '<script>window.history.back()</script>';
			}

			else{
				$hapus = mysql_query("DELETE FROM keahlian where kategori = '$id'");
				if ($hapus){
					header("location:view_keahlian.php");
				}
		
				else{		
					echo "Gagal menghapus data! ";
				}
			}
		}

		else{
			header("Terjadi Kesalahan");
		}
	}

	function delete_produk(){
		if(isset($_GET['id'])){
			$id	= $_GET['id'];

			$query = mysql_query("SELECT * FROM produk WHERE kode_produk = '$id'");
			if (mysql_num_rows($query) == 0){
				echo '<script>window.history.back()</script>';
			}

			else{
				$hapus = mysql_query("DELETE FROM produk where kode_produk = '$id'");
				if ($hapus){
					header("location:view_produk.php");
				}
		
				else{		
					echo "Gagal menghapus data! ";
				}
			}
		}

		else{
			header("Terjadi Kesalahan");
		}
	}
}

?>