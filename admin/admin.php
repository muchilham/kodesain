<?php 
    include "../koneksi.php";
    include "session_admin.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>

<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<link href="../css/admin-body.css" rel="stylesheet" />
<script type="text/javascript" src="script.js"></script>

</head>

<body>
  <div class="header" id="home">
  	  <div class="header_top">
      	<div class="logo">Administrator</div>						
	    </div>
        <div class="sidebar">
        	<div class="content">
             	<div class="menu">
             		<ul>
             			<li class="user">
                    <?php
                      if(isset($_SESSION['pengguna'])){
								    ?>
                      <a href="#" id="userButton">
                        <img src="<?php echo $_SESSION['foto']; ?>"  />
                      </a>     
                      <span><?php echo ucwords($_SESSION['nama_lengkap']); ?></span>               
                    <?php }
                      else{
                        header("location:index.php");
                        }
                    ?>
                  </li>
                </ul>
                   <div class="menu2">
                   		<a href="profile.php"><span>Profil</span></a>
                   		<a href="logout.php"><span>Keluar</span></a>
                   </div>
                </div>                  
                <div class="view">
                    	<img src="icon/laptop112.png" width="32" height="32" />
                        <span>Data</span>
                </div>
                <div class="main">
                	<ul>
                    	<li><a href="view_admin.php">Admin</a></li>
                      <li><a href="view_keahlian.php">Keahlian</a></li>
                      <li><a href="view_pengguna.php">Pengguna</a></li>
                      <li><a href="view_pekerja.php">Pekerja</a></li>
                      <li><a href="view_produk.php">Produk</a></li>
                      <li><a href="view_jabatan.php">Jabatan</a></li>
                      <li><a href="view_kritikSaran.php">Kritik dan Saran</a></li>
                  </ul>
                </div>

                <div class="view">
                    <img src="icon/laptop112.png" width="32" height="32" />
                    <span>TEST</span>
                </div>
                <div class="main">
                  <ul>
                    <li><a href="view_pemesanan.php">Pemesanan</a></li>
                    <li><a href="view_pembelian.php">Pembelian</a></li>
                  </ul>
            </div>
        </div>
    </div>
</body>
</html>