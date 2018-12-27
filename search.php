<?php
include('koneksi.php');

$value = $_POST['search'];

if ($value == true) {
      header("location:user/daftar_produk.php?id=1&&search=". $value);
}

else{
      header("location:user/daftar_produk.php?id=1");
}