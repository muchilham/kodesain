<?php
include "../koneksi.php";

class update{

	function commit(){
		mysql_query("COMMIT");
	}

	function begin(){
		mysql_query("BEGIN");
	}

	function rollback(){
		mysql_query("ROlLBACK");
	}

	function update_pekerja(){
		try {
			$this->begin;
			if(isset($_GET['id'])){
				$id	= $_GET['id'];

				$query = mysql_query("SELECT * FROM pekerja WHERE email_pekerja = '$id';");
				$check = mysql_fetch_array($query);

				if($check['status_pekerja'] == "aktif"){
					$data = mysql_query("UPDATE pekerja SET status_pekerja ='nonaktif' WHERE email_pekerja = '$id';");				
					if ($data == true){
						header("location:view_pekerja.php");
					}
					else{
						echo "gagal";
					}
				}

				else {
					$data = mysql_query("UPDATE pekerja SET status_pekerja ='aktif' WHERE email_pekerja = '$id';");
						if ($data == true){
						header("location:view_pekerja.php");
					}
					else{
						echo "gagal";
					}
				}
			}
			else {
				echo "Gagal";
			}
			
			$this->commit;
		}

		catch (Exception $e){ 
			$this->rollback;
			echo $e;
		}
	}

	function update_pemesanan(){
		try{
			$this->begin;
			if(isset($_GET['id'])){
				$id	= $_GET['id'];

				$query = mysql_query("SELECT * FROM project WHERE id = '$id';");
				$check = mysql_fetch_array($query);
				if($check['status'] == "Belum diterima"){
					$update = mysql_query("UPDATE project SET status ='Sudah diterima' WHERE id = '$id';");				
					if($update == true){
						header("location:view_pemesanan.php");
					}

					else{
						echo "Gagal mengubah data! ";
					}
				}

				elseif ($check['status'] == "Sudah diterima") {
					$update = mysql_query("UPDATE project SET status ='Proses pengerjaan' WHERE id = '$id';");
					if($update == true){
						header("location:view_pemesanan.php");
					}

					else{
						echo "Gagal mengubah data! ";
					}
				}

				elseif ($check['status'] == "Proses pengerjaan") {
					$update = mysql_query("UPDATE project SET status ='Selesai pengerjaan' WHERE id = '$id';");
					if($update == true){
						header("location:view_pemesanan.php");
					}

					else{
						echo "Gagal mengubah data! ";
					}
				}

				elseif ($check['status'] == "Selesai pengerjaan") {
					$update = mysql_query("UPDATE project SET status ='Sudah dikirim' WHERE id = '$id';");
					if($update == true){
						header("location:view_pemesanan.php");
					}

					else{
						echo "Gagal mengubah data! ";
					}
				}

				else{
					$update = mysql_query("UPDATE project SET status ='Belum diterima' WHERE id = '$id';");				
					if($update == true){
						header("location:view_pemesanan.php");
					}

					else{
						echo "Gagal mengubah data! ";
					}
				}
			}

		else{
			header("Terjadi Kesalahan");
		}

		$this->commit;
	}

	catch (Exception $e){
		$this->rollback;
		echo $e;
	}
}

}

?>