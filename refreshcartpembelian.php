<?php
session_start();
include('koneksi.php'); include('user/session_user.php');
?>
                <div>
                    <?php
                       $query = mysql_query("SELECT keranjang.*,
                        produk.*,
                        produk_detil.*
                        FROM keranjang INNER JOIN produk 
                        ON keranjang.kode_produk = produk.kode_produk
                        INNER JOIN produk_detil
                        ON produk.kode_produk = produk_detil.kode_produk 
                        WHERE keranjang.username = '$terimauser'");
                        
                        if (mysql_num_rows($query) == true){
                            while ($data = mysql_fetch_array($query)){
                    ?>
                        <div class="col-md-6 portfolio-item" name="produk" onclick="deletepembeliancart('produk', '<?php echo $data['kode_produk']; ?>')">
                            <a class="portfolio-link" style="background:url('../img/produk/resized/<?php echo $data['foto_produk']; ?>')">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content">
                                        <div class="col-md-12">
                                            <i class="fa fa-trash-o fa-3x"></i>
                                        </div>
                                    </div>
                                </div>
                                &nbsp;&nbsp;&nbsp;<h5 class="btn btn-primary">Rp <?php echo $data['harga']; ?></h5>
                            </a>
                            <div class="portfolio-caption">
                                <h6><?php echo $data['nama_produk']; ?></h6>
                                <p><?php echo $data['deskripsi_produk']; ?></p>
                            </div>
                        </div>

                    <?php }
                    }
                    else {
                        echo "<center><h2>Tidak ada produk</h2></center>";
                    }
            ?>
                    </div>