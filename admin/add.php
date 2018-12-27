<?php
include "../koneksi.php";

class add{
	
	function add_admin(){
		$username		= $_POST['username'];
		$password		= $_POST['password'];
		$nama_lengkap	= $_POST['nama'];
		$foto			= $_FILES['foto']['name'];
		$tmp			= $_FILES['foto']['tmp_name'];
		$move 			= move_uploaded_file($tmp, "images/".$foto);
		if ($move){
			$query	= mysql_query("INSERT INTO admin VALUES ('$username', '$password', '$nama_lengkap', '$foto')");
			if($query == true){
				header("location:view_admin.php");
			}

			else{
				echo "Terjadi kesalahan dalam penambahan data ke database";
			}
		}
		else{
			echo "error";
		}
	}

	function add_pekerja(){
		$username	= $_POST['username'];
		$password	= $_POST['password'];
		$nama 		= $_POST['nama'];
		$email		= $_POST['email'];
		$foto		= $_FILES['foto']['name'];
		$tmp		= $_FILES['foto']['tmp_name'];

		$move 	= move_uploaded_file($tmp, "pekerja/".$foto);
		if ($move){
			$query	= mysql_query("INSERT INTO pekerja VALUES ('$username', '$password', '$nama', '$email', '$foto', 'aktif')");
			if($query == true){
				echo "<script language=\"Javascript\">";
				echo "window.location.href='view_pekerja.php'";
				echo "</script>";
			}

			else{
				echo "Terjadi kesalahan dalam penambahan data ke database";
			}
		}

		else{
			echo "error";
		}

	}

	function add_keahlian(){
		$kategori	= $_POST['kategori'];
		$query	= mysql_query("INSERT INTO keahlian VALUES ('', '$kategori')");
		if($query == true){
			echo "<script language=\"Javascript\">";
			echo "window.location.href='view_keahlian.php'";
			echo "</script>";
		}

		else{
			echo "Terjadi kesalahan dalam penambahan data ke database";
		}

	}

	function add_jabatan(){
		$jabatan =$_POST['jabatan'];
		$query	= mysql_query("INSERT INTO combojabatan VALUES ('$jabatan')");
		if($query == true){
			echo "<script language=\"Javascript\">";
			echo "window.location.href='view_jabatan.php'";
			echo "</script>";
		}

		else{
			echo "Terjadi kesalahan dalam penambahan data ke database";
		}
	}

	function add_produk(){
		session_start();
		
		$user 				= $_SESSION['pengguna'];

		$kode				= $_POST['kode'];
		$nama				= $_POST['nama'];
		$email				= $_POST['email'];
		$kategori			= $_POST['kategori'];
		$harga				= $_POST['harga'];
		$desk				= $_POST['deskripsi'];
		
		$fileName			= $_FILES['foto']['name'];
		$fileTmpLoc			= $_FILES['foto']['tmp_name'];
		$fileType 			= $_FILES['foto']['type'];
		$fileSize			= $_FILES['foto']['size'];
		$fileErrorMsg		= $_FILES['foto']['error'];
		
		$fileName 			= preg_replace('#[^a-z.0-9]#i', '', $fileName); // filter
		$kaboom 			= explode(".", $fileName); // Split file name into an array using the dot
		$fileExt 			= end($kaboom); // Now target the last array element to get the file extension
		$produk 			= "$user-$kategori-$fileName";
		
		// START PHP Image Upload Error Handling -------------------------------
		if (!$fileTmpLoc) { // if file not chosen
			echo "ERROR: Please browse for a file before clicking the upload button.";
			exit();
		} 
		else if($fileSize > 5242880) { // if file size is larger than 5 Megabytes
    		echo "ERROR: Your file was larger than 5 Megabytes in size.";
    		unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
    		exit();
		}
		else if (!preg_match("/.(gif|jpg|png)$/i", $fileName) ) {
     		// This condition is only if you wish to allow uploading of specific file types    
     		echo "ERROR: Your image was not .gif, .jpg, or .png.";
     		unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
     		exit();
		}
		else if ($fileErrorMsg == 1) { // if file upload error key is equal to 1
    		echo "ERROR: An error occured while processing the file. Try again.";
    		exit();
		}
		
		$moveResult = move_uploaded_file($fileTmpLoc, "../img/produk/original/$produk");
		// Check to make sure the move result is true before continuing
		if ($moveResult != true) {
			echo "ERROR: File not uploaded. Try again.";
			exit();
		}
		
		else {
			$query	= mysql_query("INSERT INTO produk VALUES ('$kode', '$nama', '$email', '$kategori')");
			$query1 = mysql_query("INSERT INTO produk_detil VALUES ('', '$kode', '$harga', '$produk', NOW(), '$desk' )");
			
			if($query && $query1){
				echo "<script language=\"Javascript\">";
				echo "window.location.href='view_produk.php'";
				echo "</script>";
			}

			else{
				echo die(mysql_error());
			}
		}
		
		include_once("ak_php_img_lib_1.0.php");
		// ---------- Start Universal Image Resizing Function --------
		$target_file = "../img/produk/original/$produk";
		$resized_file = "../img/produk/resized/$produk";
		$wmax = 800;
		$hmax = 800;
		ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
		
		// ----------- End Universal Image Resizing Function ----------
		// ---------- Start Convert to JPG Function --------
		if (strtolower($fileExt) != "jpg") {
			$target_file = "../img/produk/resized/$produk";
			$new_jpg = "../img/produk/resized/".$kaboom[0].".jpg";
    		ak_img_convert_to_jpg($target_file, $new_jpg, $fileExt);
		}
		
		else {
			echo "Error";
		}
		
		// ----------- End Convert to JPG Function -----------
		// ---------- Start Image Watermark Function ---------
		$trgt_file = "../img/produk/resized/".$kaboom[0].".jpg";
		$wtrmrk_file = "watermark.png";
		$new_file = "../img/produk/protected/".$kaboom[0].".jpg";
		ak_img_watermark($trgt_file, $wtrmrk_file, $new_file);
		// ----------- End Image Watermark Function -----------
	}
}

?>