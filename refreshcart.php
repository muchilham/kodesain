<?php
session_start();
include('koneksi.php'); include('user/session_user.php');

$query1 = mysql_query("SELECT * FROM keranjang WHERE username = '$terimauser'");
            $jumlahkeranjang = mysql_num_rows($query1);
?>
<span class="icon"><?php echo $jumlahkeranjang; ?></span>
