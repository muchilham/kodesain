<?php include "koneksi.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Daftar Produk</title>
</head>

<body>

  <!-- Portfolio Grid Section -->
    <section id="portfolio" style="background-color:#FFF;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Portfolio</h2>
                    <h3 class="section-subheading text-muted">dan inilah produk kami yang sudah siap kami jual</h3>
                </div>
            </div>
            <div class="row">
            <?php
            


            $query = mysql_query("SELECT produk.*,
                            produk_detil.`harga`,
                            produk_detil.`tanggal`,
                            produk_detil.`foto_produk`,
                            produk_detil.`deskripsi_produk`
                            FROM produk INNER JOIN produk_detil 
                            ON produk.`kode_produk` = produk_detil.`kode_produk` LIMIT 18");
            if (mysql_num_rows($query) == true){
                while ($data = mysql_fetch_array($query)){
                    $id = $data['idkeahlian'];
                    $query1 = mysql_query("SELECT kategori FROM keahlian WHERE id = '$id'");
                    list($selectKategori) = mysql_fetch_row($query1);
            ?>
                <div class="col-md-3 col-sm-6 portfolio-item">
                    <a href="#<?php echo $data['kode_produk']; ?>" class="portfolio-link" data-toggle="modal" style="background:url('img/produk/resized/<?php echo $data['foto_produk']; ?>')">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content">
                                            <i class="fa fa-search fa-3x"></i>
                                    </div>
                                </div>
                                &nbsp;&nbsp;&nbsp;<h5 class="btn btn-primary">Rp.<?php echo $data['harga']; ?></h5>
                            </a>
                    <div class="portfolio-caption text-center">
                        <h4><?php echo $data['nama_produk']; ?></h4>
                        <p class="text-muted"><?php echo $selectKategori; ?></p>
                    </div>
                </div>
            
            <?php }
                echo "</div><center><a href=\"user/daftar_produk.php?id=1\" class=\"btn btn-xl\">Lihat lebih banyak</a></center>";
            }
            else {
                echo "<center><h2>Tidak ada produk</h2></center>";
            }
            ?>

        </div>
    </section>
    
    
    <!-- Portofolio Modal -->
    <?php 
            $query = mysql_query("SELECT keahlian.*,
                                    produk.*,
                                    produk_detil.* 
                                    FROM keahlian INNER JOIN produk 
                                    ON keahlian.id = produk.idkeahlian 
                                    INNER JOIN produk_detil 
                                    ON produk.kode_produk = produk_detil.kode_produk 
                                    ORDER BY tanggal DESC LIMIT 18");
            if (mysql_num_rows($query) == true){
                while ($data = mysql_fetch_array($query)){
            ?>
            <div class="portfolio-modal modal fade" id="<?php echo $data['kode_produk']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <div class="modal-body">
                            <!-- Project Details Go Here -->
                                    <h2><?php echo $data['nama_produk']; ?></h2>
                                    <p class="item-intro text-muted"><?php echo $data['tanggal']; ?></p>
                                    <img class="img-responsive img-centered" src="img/produk/original/<?php echo $data['foto_produk']; ?>" alt="<?php echo $data['nama_produk']; ?>" title="<?php echo $data['nama_produk']; ?>">
                                    <ul class="list-inline">
                                        <li>Dibuat oleh: <?php echo $data['email_pekerja'];?></li>
                                        <li>kategori:<?php echo $data['kategori']; ?></li>
                                    </ul>
                                    <p><strong><?php echo $data['deskripsi_produk']; ?></strong></p>
                                    <a href="beli_produk.php"><button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-shopping-cart"></i> Beli</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <?php }
                }
            ?>
</body>
</html>