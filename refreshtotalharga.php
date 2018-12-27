<?php
session_start();
include('koneksi.php'); include('user/session_user.php');
?>

                            <?php 
                            $query = mysql_query("SELECT keranjang.*,
                                                produk.*,
                                                produk_detil.*
                                                FROM keranjang INNER JOIN produk 
                                                ON keranjang.kode_produk = produk.kode_produk
                                                INNER JOIN produk_detil
                                                ON produk.kode_produk = produk_detil.kode_produk 
                                                WHERE keranjang.username = '$terimauser'");
                            $totalharga;
                            while ($data = mysql_fetch_array($query)) {
                                $totalharga = $totalharga + $data['harga'];
                            }
                            ?>
                            <div>
                                <input id="total" type="text" class="form-control" placeholder="Total harga*" name="totalharga" value="<?php echo $totalharga;?>" readonly required>
                            </div>