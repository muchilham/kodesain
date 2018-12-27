<?php

include "../koneksi.php";

class view{

	function commit(){
		mysql_query("COMMIT");
	}

	function begin(){
		mysql_query("BEGIN");
	}

	function rollback(){
		mysql_query("ROlLBACK");
	}

	function view_admin(){
		try {
			$this->begin;
			$query	= mysql_query("SELECT username, nama_lengkap, foto FROM admin ORDER BY username ASC");
			if(mysql_num_rows($query) == true){
				$no = 1;
				if ($_SESSION['jabatan'] == "admin"){
					while($data = mysql_fetch_array($query)){
						echo "<tr style=\"background:#FFF; color:#1BBC9B;\">";
							echo "<td>".$no."</td>";
							echo "<td>".$data['username']."</td>";
							echo "<td>".$data['nama_lengkap']."</td>";
							echo "<td><img src='images/".$data['foto']."' width='64' height='64'></td>";
							echo "<td><a href='delete_admin.php?id=".$data['username']."'><button  name='delete' \">Hapus</button></a></td>";
						echo "</tr>";
						$no++;
					}
				echo "<tr>";
					echo "<td colspan=\"5\" style=\"text-align:left;\">";
						echo "<a href='add_admin.php' method='post'><button class=\"button\">TAMBAH</button></a>";
					echo "</td>";
				echo "</tr>";
				}

				else {
					$no = 1;
					while($data = mysql_fetch_array($query)){
						echo "<tr style=\"background:#FFF; color:#1BBC9B;\">";
							echo "<td>".$no."</td>";
							echo "<td>".$data['username']."</td>";
							echo "<td>".$data['nama_lengkap']."</td>";
							echo "<td><img src='images/".$data['foto']."' width='64' height='64'></td>";
						echo "</tr>";
						$no++;
					}
				}
			}

			else{
				echo "<tr style=\"background:#FFF; color:#00B16A;\">";
					echo "<td></td>";
					echo "<td colspan=\"4\"><center>Tidak ada data!</center></td>";
					echo "<td></td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td colspan=\"5\" style=\"text-align:left;\">";
						echo "<a href='add_admin.php' method='post'><button class=\"button\">TAMBAH</button></a>";
					echo "</td>";
				echo "</tr>";
			}

			$this->commit;
		}

		catch (Exception $e){ 
			$this->rollback;
			echo $e;
		}
	}

	function view_user(){
		try{
			$this->begin;
			$query 	= mysql_query("SELECT username, email, alamat, telepon, photos, status FROM user ORDER BY username ASC");
			if(mysql_num_rows($query) == true){
				$no = 1;
				if ($_SESSION['jabatan'] == "admin"){
					while($data = mysql_fetch_array($query)){
						echo "<tr style=\"background:#FFF; color:#1BBC9B;\">";
							echo "<td>".$no."</td>";
							echo "<td>".$data['username']."</td>";
							echo "<td>".$data['email']."</td>";
							echo "<td>".$data['alamat']."</td>";
							echo "<td>".$data['telepon']."</td>";
							echo "<td><img src='../user/uploads/".$data['photos']."' width='64' height='64'></td>";
							if ($data['status'] == "aktif"){
								echo "<td><span class=\"aktif\">".$data['status']."</span></td>";
							}

							else{
								echo "<td><span class=\"nonaktif\"'>".$data['status']."</span></td>";
							}
							echo "<td><a href='delete_pengguna.php?id=".$data['username']."'><button  name='delete' \">Hapus</button></a></td>";
						echo "</tr>";
						$no++;
					}
				}

				else {
					while($data = mysql_fetch_array($query)){
						echo "<tr style=\"background:#FFF; color:#1BBC9B;\">";
							echo "<td>".$no."</td>";
							echo "<td>".$data['username']."</td>";
							echo "<td>".$data['email']."</td>";
							echo "<td>".$data['alamat']."</td>";
							echo "<td>".$data['telepon']."</td>";
							echo "<td><img src='../user/uploads/".$data['photos']."' width='64' height='64'></td>";
							if ($data['status'] == "aktif"){
								echo "<td><span class=\"aktif\">".$data['status']."</span></td>";
							}

							else{
								echo "<td><span class=\"nonaktif\"'>".$data['status']."</span></td>";
							}
						echo "</tr>";
					}
				}
			}

			else{
				echo "<tr style=\"background:#FFF; color:#00B16A;\">";
				echo "<td></td>";
				echo "<td colspan=\"5\"><center>Tidak ada data!</center></td>";
				echo "<td></td>";
				echo "</tr>";
			}

			$this->commit;
		}

		catch (Exception $e){ 
			$this->rollback;
			echo $e;
		}
	}

	function view_pekerja(){
		try{
			$this->begin;
			$query 	= mysql_query("SELECT nama_pekerja, email_pekerja, foto_pekerja, status_pekerja FROM pekerja ORDER BY nama_pekerja ASC");
			if(mysql_num_rows($query) == true){
				$no = 1;
				if ($_SESSION['jabatan'] == "admin"){
					while($data = mysql_fetch_array($query)){
						echo "<tr style=\"background:#FFF; color:#1BBC9B;\">";
							echo "<td>".$no."</td>";
							echo "<td>".$data['nama_pekerja']."</td>";
							echo "<td>".$data['email_pekerja']."</td>";
							echo "<td><img src='images/".$data['foto_pekerja']."' width='64' height='64'></td>";
							if ($data['status_pekerja'] == "aktif"){
								echo "<td><a class=\"aktif\" href='update_pekerja.php?id=".$data['email_pekerja']."'>".$data['status_pekerja']."</a></td>";
							}

							else{
								echo "<td><a class=\"nonaktif\" href='update_pekerja.php?id=".$data['email_pekerja']."'>".$data['status_pekerja']."</a></td>";
							}
						echo "</tr>";
						$no++;
					}

				echo "<tr>";
					echo "<td colspan=\"5\" style=\"text-align:left;\">";
						echo "<a href='add_pekerja.php' method='post'><button class=\"button\">TAMBAH</button></a>";
					echo "</td>";
				echo "</tr>";
						
				}
				else {
					while($data = mysql_fetch_array($query)){
						echo "<tr style=\"background:#FFF; color:#1BBC9B;\">";
							echo "<td>".$no."</td>";
							echo "<td>".$data['nama_pekerja']."</td>";
							echo "<td>".$data['email_pekerja']."</td>";
							echo "<td><img src='pekerja/".$data['foto_pekerja']."' width='64' height='64'></td>";
							if ($data['status_pekerja'] == "aktif"){
								echo "<td><span class=\"aktif\">".$data['status_pekerja']."</span></td>";
							}

							else{
								echo "<td><span class=\"nonaktif\">".$data['status_pekerja']."</span></td>";
							}
						echo "</tr>";
						$no++;
					}
				}
			}


			else{
				echo "<tr style=\"background:#FFF; color:#00B16A;\">";
					echo "<td></td>";
					echo "<td colspan=\"5\"><center>Tidak ada data!</center></td>";
					echo "<td></td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td colspan=\"5\" style=\"text-align:left;\">";
						echo "<a href='add_admin.php' method='post'><button class=\"button\">TAMBAH</button></a>";
					echo "</td>";
				echo "</tr>";
			}
			$this->commit;
		}

		catch (Exception $e){ 
			$this->rollback;
			echo $e;
		}
	}

	function  view_pemesanan(){
		session_start();
		try{
			$this->begin;
			if ($_SESSION['jabatan'] == "admin"){
				$query 	= mysql_query("SELECT id, username, email, deskripsi_foto, photo, waktu, status FROM project");
				if(mysql_num_rows($query) == true){
					$no = 1;
					while($data = mysql_fetch_array($query)){
						echo "<tr style=\"background:#FFF; color:#1BBC9B;\">";
							echo "<td>".$data['id']."</td>";
							echo "<td>".$data['username']."</td>";
							echo "<td>".$data['email']."</td>";
							echo "<td>".$data['deskripsi_foto']."</td>";
							echo "<td><img src='../user/images/".$data['photo']."' width='64' height='64'></td>";
							echo "<td>".$data['waktu']."</td>";
							echo "<td><a href='update_pemesanan.php?id=".$data['id']."'>".$data['status']."</td>";
						echo "</tr>";
						$no++;
					}
				}
				
				else{
					echo "<tr style=\"background:#FFF; color:#00B16A;\">";
					echo "<td></td>";
					echo "<td colspan=\"6\"><center>Tidak ada data!</center></td>";
					echo "<td></td>";
					echo "</tr>";
				}
			}

			else {
				$email = $_SESSION['email_pekerja'];
				$query 	= mysql_query("SELECT id, username, email, deskripsi_foto, photo, waktu, status FROM project WHERE email_pekerja = '$email'");
				if(mysql_num_rows($query) == true){
					$no = 1;
					while($data = mysql_fetch_array($query)){
						echo "<tr style=\"background:#FFF; color:#1BBC9B;\">";
							echo "<td>".$data['id']."</td>";
							echo "<td>".$data['username']."</td>";
							echo "<td>".$data['email']."</td>";
							echo "<td>".$data['deskripsi_foto']."</td>";
							echo "<td><img src='../user/images/".$data['photo']."' width='64' height='64'></td>";
							echo "<td>".$data['waktu']."</td>";
							echo "<td><a href='update_pemesanan.php?id=".$data['id']."'>".$data['status']."</td>";
						echo "</tr>";
						$no++;
					}
				}

				else{
					echo "<tr style=\"background:#FFF; color:#00B16A;\">";
					echo "<td></td>";
					echo "<td colspan=\"6\"><center>Tidak ada data!</center></td>";
					echo "<td></td>";
					echo "</tr>";
				}
			}
			$this->commit;
		}

		catch (Exception $e){ 
			$this->rollback;
			echo $e;
		}
	}

	function  view_keahlian(){
		try{
			$this->begin;
			if ($_SESSION['jabatan'] == "admin"){
				$query	= mysql_query("SELECT * FROM keahlian ORDER BY kategori ASC");
				if(mysql_num_rows($query) == true){
					$no = 1;
					while($data = mysql_fetch_array($query)){
						echo "<tr style=\"background:#FFF; color:#1BBC9B;\">";
							echo "<td>".$no."</td>";
							echo "<td>".$data['kategori']."</td>";
							echo "<td><a href='delete_keahlian.php?id=".$data['kategori']."'><button  name='delete' \">Hapus</button></a></td>";
								  
						echo "</tr>";
						$no++;
					}
				}
				else{
					echo "<tr style=\"background:#FFF; color:#00B16A;\">";
						echo "<td></td>";
							echo "<td colspan=\"2\"><center>Tidak ada data!</center></td>";
						echo "<td></td>";
					echo "</tr>";
				}

				echo "<tr>";
					echo "<td colspan=\"2\" style=\"text-align:left;\">";
						echo "<a href='add_keahlian.php' method='post'><button class=\"button\">TAMBAH</button></a>";
					echo "</td>";
				echo "</tr>";
			}

			else {
				$query	= mysql_query("SELECT * FROM keahlian ORDER BY kategori ASC");
				if(mysql_num_rows($query) == true){
					$no = 1;
					while($data = mysql_fetch_array($query)){
						echo "<tr style=\"background:#FFF; color:#1BBC9B;\">";
							echo "<td>".$no."</td>";
							echo "<td>".$data['kategori']."</td>";
							echo "<td></td>";
								  
						echo "</tr>";
						$no++;
					}
				}
				else{
					echo "<tr style=\"background:#FFF; color:#00B16A;\">";
						echo "<td></td>";
							echo "<td colspan=\"2\"><center>Tidak ada data!</center></td>";
						echo "<td></td>";
					echo "</tr>";
				}
			}

			$this->commit;
		}

		catch (Exception $e){ 
			$this->rollback;
			echo $e;
		}
	}

	function view_kritikSaran(){
		try{
			$this->begin;
			$query	= mysql_query("SELECT kritik_saran FROM komentar");
			if(mysql_num_rows($query) == true){
				$no = 1;
				while($data = mysql_fetch_array($query)){
					echo "<tr style=\"background:#FFF; color:#1BBC9B;\">";
						echo "<td>".$no."</td>";
						echo "<td>".$data['kritik_saran']."</td>";		  
					echo "</tr>";
					$no++;
				}
			}

			else{
				echo "<tr style=\"background:#FFF; color:#00B16A;\">";
				echo "<td></td>";
				echo "<td colspan=\"2\"><center>Tidak ada data!</center></td>";
				echo "<td></td>";
				echo "</tr>";
			}

			$this->commit;
		}

		catch (Exception $e){ 
			$this->rollback;
			echo $e;
		}
	}

	function view_jabatan(){
		try{
			$this->begin;
			$query	= mysql_query("SELECT jabatan FROM combojabatan");
			if(mysql_num_rows($query) == true){
				if ($_SESSION['jabatan'] == "admin"){
					$no = 1;
					while($data = mysql_fetch_array($query)){
						echo "<tr style=\"background:#FFF; color:#1BBC9B;\">";
							echo "<td>".$no."</td>";
							echo "<td>".$data['jabatan']."</td>";
							echo "<td><a href='delete_jabatan.php?id=".$data['jabatan']."'><button  name='delete' \">Hapus</button></a></td>";		  
						echo "</tr>";
						$no++;

					}
				echo "<tr>";
					echo "<td colspan=\"5\" style=\"text-align:left;\">";
						echo "<a href='add_jabatan.php' method='post'><button class=\"button\">TAMBAH</button></a>";
					echo "</td>";
				echo "</tr>";
				}

				else{
					$no = 1;
					while($data = mysql_fetch_array($query)){
						echo "<tr style=\"background:#FFF; color:#1BBC9B;\">";
							echo "<td>".$no."</td>";
							echo "<td>".$data['jabatan']."</td>";		  
						echo "</tr>";
						$no++;
					}

				}
			}

			else{
				echo "<tr style=\"background:#FFF; color:#00B16A;\">";
					echo "<td></td>";
					echo "<td colspan=\"2\"><center>Tidak ada data!</center></td>";
					echo "<td></td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td colspan=\"5\" style=\"text-align:left;\">";
						echo "<a href='add_jabatan.php' method='post'><button class=\"button\">TAMBAH</button></a>";
					echo "</td>";
				echo "</tr>";
			}

			$this->commit;
		}

		catch (Exception $e){ 
			$this->rollback;
			echo $e;
		}
	}

	function view_produk(){
		try{
			$this->begin;
			if ($_SESSION['jabatan'] == 'admin'){
				$query = mysql_query("SELECT produk.*,
								produk_detil.`harga`,
								produk_detil.`tanggal`,
								produk_detil.`foto_produk`,
								produk_detil.`deskripsi_produk`
								FROM produk INNER JOIN produk_detil 
								ON produk.`kode_produk` = produk_detil.`kode_produk`;");
				if (mysql_num_rows($query) == true){
					$no = 1;
					while ($data = mysql_fetch_array($query)){
						echo "<tr style=\"background:#FFF; color:#1BBC9B;\">";
							echo "<td>".$no."</td>";
							echo "<td>".$data['nama_produk']."</td>";
							echo "<td>".$data['email_pekerja']."</td>";
							echo "<td>".$data['kategori']."</td>";
							echo "<td>".$data['harga']."</td>";
							echo "<td><img src='../img/produk/resized/".$data['foto_produk']."' width=\"200\" height=\"160\"></td>";
							echo "<td>".$data['tanggal']."</td>";
							echo "<td>".$data['deskripsi_produk']."</td>";			  
						echo "</tr>";
						$no++;
					}
				}
				else{
					echo "<tr style=\"background:#FFF; color:#00B16A;\">";
						echo "<td></td>";
						echo "<td colspan=\"8\"><center>Tidak ada data!</center></td>";
						echo "<td></td>";
					echo "</tr>";
				}
			}

			else{
				session_start();
				$name = $_SESSION['nama_lengkap'];
				$query = mysql_query("SELECT produk.*,
								produk_detil.`id`,
								produk_detil.`harga`,
								produk_detil.`tanggal`,
								produk_detil.`foto_produk`,
								produk_detil.`deskripsi_produk`
								FROM produk INNER JOIN produk_detil 
								ON produk.`kode_produk` = produk_detil.`kode_produk`;");
				if (mysql_num_rows($query) == true){
					$no = 1;
					while ($data = mysql_fetch_array($query)){
						echo "<tr style=\"background:#FFF; color:#1BBC9B;\">";
							echo "<td>".$no."</td>";
							echo "<td>".$data['nama_produk']."</td>";
							echo "<td>".$data['email_pekerja']."</td>";
							echo "<td>".$data['kategori']."</td>";
							echo "<td>".$data['harga']."</td>";
							echo "<td><img src='../img/produk/resized/".$data['foto_produk']."' width=\"200\" height=\"160\"></td>";
							echo "<td>".$data['tanggal']."</td>";
							echo "<td>".$data['deskripsi_produk']."</td>";
							if ($_SESSION['email_pekerja'] == $data['email_pekerja']){
								echo "<td><a href='delete_produk.php?id=".$data['kode_produk']."'><button  name='delete' \">Hapus</button></a></td>";
							}

							else {
								echo "<td></td>";
							}
						echo "</tr>";
						$no++;
					}
					echo "<tr>";
						echo "<td colspan=\"5\" style=\"text-align:left;\">";
							echo "<a href='add_produk.php' method='post'><button class=\"button\">TAMBAH</button></a>";
						echo "</td>";
					echo "</tr>";
				}

				else{
					echo "<tr style=\"background:#FFF; color:#00B16A;\">";
						echo "<td></td>";
						echo "<td colspan=\"8\"><center>Tidak ada data!</center></td>";
						echo "<td></td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td colspan=\"5\" style=\"text-align:left;\">";
							echo "<a href='add_produk.php' method='post'><button class=\"button\">TAMBAH</button></a>";
						echo "</td>";
					echo "</tr>";

				}
			}

			$this->commit;
		}

		catch (Exception $e){ 
			$this->rollback;
			echo $e;
		}
	}
	function view_pembelian(){
		try{
			$this->begin;
			$query = mysql_query("SELECT pembelian.*,
                        pembelian_detil.*
                        FROM pembelian INNER JOIN pembelian_detil
                        ON pembelian.kode_pembelian = pembelian_detil.kode_pembelian 
                       	ORDER BY pembelian_detil.tanggal_pembelian DESC");
			if (mysql_num_rows($query) > 0){
				$no = 1;
					while ($data = mysql_fetch_array($query)){
						echo "<tr style=\"background:#FFF; color:#1BBC9B;\">";
							echo "<td>".$no."</td>";
							echo "<td>".$data['kode_pembelian']."</td>";
							echo "<td>".$data['username']."</td>";
							echo "<td>".$data['nama_produk']."</td>";
							echo "<td>".$data['harga']."</td>";
							echo "<td><img src='../img/produk/resized/".$data['foto_produk']."' width=\"200\" height=\"160\"></td>";
							echo "<td>".$data['tanggal_pembelian']."</td>";
						echo "</tr>";
						$no++;
				}
			}
			else{
				echo "<tr style=\"background:#FFF; color:#00B16A;\">";
					echo "<td></td>";
					echo "<td colspan=\"7\"><center>Tidak ada data!</center></td>";
					echo "<td></td>";
				echo "</tr>";
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