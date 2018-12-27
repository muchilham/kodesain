<?php
include "session_user.php";
include "../koneksi.php";

$query1 = mysql_query("SELECT * FROM keranjang WHERE username = '$terimauser'");
$jumlahkeranjang = mysql_num_rows($query1);

if(isset($_SESSION['username']) && !isset($_GET['id']) && !isset($_GET['project']) && !isset($_GET['pembelian'])){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Selamat Datang</title>
</head>

<body>

<li class="dropdown">
	<a class="dropdown-toggle page-scroll" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
		<?php echo $_SESSION['username']; ?>
	</a>
	<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
    <li role="presentation"><a role="menuitem" tabindex="-1" href="user/daftar_produk.php?id=1"><i class="fa fa-shopping-cart"></i> Cart <span class="badge"><?php echo $jumlahkeranjang; ?></span></a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="user/pengaturan.php?id=1"><i class="fa fa-gear"></i> Pengaturan</a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="user/logout.php"><i class="fa fa-close"></i> Keluar</a></li>
  </ul>
</li>
<?php } elseif (isset($_SESSION['username']) && isset($_GET['id']) && !isset($_GET['project']) && !isset($_GET['pembelian'])){
?>
<li class="dropdown">
	<a class="dropdown-toggle page-scroll" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
		<?php echo $_SESSION['username']; ?>
	</a>
	<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
    <li role="presentation"><a role="menuitem" tabindex="-1" href="daftar_produk.php?id=1"><i class="fa fa-shopping-cart"></i> Cart <span class="badge"><?php echo $jumlahkeranjang; ?></span></a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="pengaturan.php?id=1"><i class="fa fa-gear"></i> Pengaturan</a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php"><i class="fa fa-close"></i> Keluar</a></li>
  </ul>
</li>

<?php } elseif (isset($_SESSION['username']) && !isset($_GET['id']) && isset($_GET['project']) && !isset($_GET['pembelian'])){
?>
<li class="dropdown">
	<a class="dropdown-toggle page-scroll" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
		<?php echo $_SESSION['username']; ?>
	</a>
	<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
    <li role="presentation"><a role="menuitem" tabindex="-1" href="daftar_produk.php?id=1"><i class="fa fa-shopping-cart"></i> Cart <span class="badge"><?php echo $jumlahkeranjang; ?></span></a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="pengaturan.php?id=1"><i class="fa fa-gear"></i> Pengaturan</a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php"><i class="fa fa-close"></i> Keluar</a></li>
  </ul>
</li>

<?php } elseif (isset($_SESSION['username']) && !isset($_GET['id']) && !isset($_GET['project']) && isset($_GET['pembelian'])){
?>
<li class="dropdown">
	<a class="dropdown-toggle page-scroll" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
		<?php echo $_SESSION['username']; ?>
	</a>
	<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
    <li role="presentation"><a role="menuitem" tabindex="-1" href="daftar_produk.php?id=1"><i class="fa fa-shopping-cart"></i> Cart <span class="badge"><?php echo $jumlahkeranjang; ?></span></a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="pengaturan.php?id=1"><i class="fa fa-gear"></i> Pengaturan</a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php"><i class="fa fa-close"></i> Keluar</a></li>
  </ul>
</li>

<?php }

else{
	echo "<script>window.location.href='index.php';</script>";
	echo "<script language='javascript'>window.alert('anda gagal login');</script>";
}
?>

</body>
</html>