<?php 
    include "../koneksi.php"; 
    include "daftar_produk_awal.php";
?>
<!DOCTYPE HTML "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kodesain</title>

    <link rel="icon" href="../img/logo.png" type="image/png" sizes="128x128">

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

</head>

<body>
<?php include "../navbar.php"; ?>

<section id="portfolio" class="bg-light-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="../search.php" enctype="multipart/form-data" method="POST">
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input class="form-control" placeholder="Pencarian..." name="search" type="search">
                                <span class="input-group-btn">
                                    <button class="btn btn-default"><span class="fa fa-search"></span></button>
                                </span>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <span href="#" class="list-group-item active text-center">
                    <h3>Kategori</h3>
                </span>
                <div class="panel panel-body creations-filter" style="overflow-y:scroll; height:500px;">
                        <ul class="list-group">
                            <a href="#all"><li class="list-group-item kategori active" data-filter="*">All</li></a>
                    <?php
                        $query = mysql_query("SELECT kategori, id FROM keahlian");
                        if (mysql_num_rows($query) == true){
                        while ($data = mysql_fetch_array($query)){
                            $idkeahlian = $data['id'];
                            $querytotal = mysql_query("SELECT produk.`kode_produk`, 
                                                produk.`nama_produk`, 
                                                produk.`email_pekerja`, 
                                                keahlian.`kategori` 
                                                FROM produk INNER JOIN keahlian 
                                                ON produk.`idkeahlian` = keahlian.`id` WHERE keahlian.`id` = '$idkeahlian'");
                            $numtotal = mysql_num_rows($querytotal);
                            $kategori = $data['kategori'];
                            $numkategori = str_word_count($kategori);
                            $pecah    = explode(" ", $kategori);
                            for($i=0;$i<$numkategori;$i++)
                            {
                                $gabung   = $pecah[$i]."-".$gabung;
                            }
                            
                    ?>
                            <a href="#<?php echo $gabung; ?>">
                                <li class="list-group-item kategori" data-filter=".<?php echo $gabung; ?>">
                                    <span class="badge"><?php echo $numtotal; ?></span>
                                    <?php echo $data['kategori']; ?>
                                </li>
                        </a>
                    <?php
                        $gabung = ""; 
                        }
                    }
                    else {
                        echo "<center><h2>Tidak ada produk</h2></center>";
                    }
            ?>
                        </ul>
                </div>
            </div>
            <div class="col-md-7">
                    <span class="list-group-item active text-center">
                        <h3>Daftar Produk</h3>
                    </span>
                    <div class="panel panel-body" style="overflow-y:scroll; height:600px;">
                    <div class="creations-container">
                    <?php
                        if (isset($_GET['search'])){
                            $value = $_GET['search'];
                            $query = mysql_query("SELECT keahlian.*,
                                    produk.*,
                                    produk_detil.*
                                    FROM keahlian INNER JOIN produk
                                    ON keahlian.id = produk.idkeahlian
                                    INNER JOIN produk_detil
                                    ON produk.kode_produk = produk_detil.kode_produk
                                    WHERE produk.kode_produk LIKE '%$value%'
                                    OR produk.nama_produk LIKE '%$value%'
                                    OR produk_detil.deskripsi_produk LIKE '%$value%' ");
                            if (mysql_num_rows($query) == true){
                                while ($data = mysql_fetch_array($query)){
                                    $numtotal = mysql_num_rows($querytotal);
                                    $kategori = $data['kategori'];
                                    $numkategori = str_word_count($kategori);
                                    $pecah    = explode(" ", $kategori);
                                    for($i=0;$i<$numkategori;$i++){
                                        $gabung   = $pecah[$i]."-".$gabung;
                                    }
                    ?>
                        <div class="portfolio-item <?php echo $gabung; ?> col-md-4 col-sm-6">
                            <a class="portfolio-link" style="background:url('../img/produk/resized/<?php echo $data['foto_produk']; ?>')">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content">
                                        <div class="col-xs-6">
                                            <button class="btn btn-primary" name="produk" value="<?php echo $data['kode_produk']; ?>" onclick="updatecart('produk', this.value)"><i class="fa fa-shopping-cart fa-3x"></i></button>
                                        </div>
                                        <div class="col-xs-6">
                                            <button class="btn btn-primary" data-target="#<?php echo $data['kode_produk']; ?>" value="<?php echo $data['kode_produk']; ?>" data-toggle="modal"><i class="fa fa-eye fa-3x"></i></button>
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

                            <?php $gabung = ""; 
                                }
                            }
                            else {
                                echo "<center><h2>Tidak ada produk</h2></center>";
                            }
                        }

                        else{
                        $query = mysql_query("SELECT keahlian.*,
                                    produk.*,
                                    produk_detil.* 
                                    FROM keahlian INNER JOIN produk 
                                    ON keahlian.id = produk.idkeahlian 
                                    INNER JOIN produk_detil 
                                    ON produk.kode_produk = produk_detil.kode_produk
									ORDER BY produk_detil.tanggal DESC");
                        if (mysql_num_rows($query) == true){
                        while ($data = mysql_fetch_array($query)){
                            $numtotal = mysql_num_rows($querytotal);
                            $kategori = $data['kategori'];
                            $numkategori = str_word_count($kategori);
                            $pecah    = explode(" ", $kategori);
                            for($i=0;$i<$numkategori;$i++)
                            {
                                $gabung   = $pecah[$i]."-".$gabung;
                            }
                    ?>
                        <div class="portfolio-item <?php echo $gabung; ?> col-md-4 col-sm-6">
                            <a class="portfolio-link" style="background:url('../img/produk/resized/<?php echo $data['foto_produk']; ?>')">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content">
                                        <div class="col-xs-6">
                                            <button class="btn btn-primary" name="produk" value="<?php echo $data['kode_produk']; ?>" onclick="updatecart('produk', this.value)"><i class="fa fa-shopping-cart fa-3x"></i></button>
                                        </div>
                                        <div class="col-xs-6">
                                            <button class="btn btn-primary" data-target="#<?php echo $data['kode_produk']; ?>" value="<?php echo $data['kode_produk']; ?>" data-toggle="modal"><i class="fa fa-eye fa-3x"></i></button>
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

                            <?php $gabung = ""; 
                                }
                            }
                            else {
                                echo "<center><h2>Tidak ada produk</h2></center>";
                            }
                        }
                    ?>
                    </div>
                    </div>
            </div>

            <?php

            $query1 = mysql_query("SELECT keranjang.*,
                        produk.*,
                        produk_detil.*
                        FROM keranjang INNER JOIN produk 
                        ON keranjang.kode_produk = produk.kode_produk
                        INNER JOIN produk_detil
                        ON produk.kode_produk = produk_detil.kode_produk 
                        WHERE keranjang.username = '$terimauser'");
            $jumlahkeranjang    = mysql_num_rows($query1);
            ?>

            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel panel-body">
                        <div class="col-md-12">
                            <div class="dropdown" onclick="refreshdropdowncart();">
                                <button class="btn btn-primary bell" type="button" id="show">
                                    <span class="badge" id="cart-panel"><?php echo $jumlahkeranjang; ?></span>
                                    Keranjang anda
                                    <span class="glyphicon glyphicon-shopping-cart"></span>
                                </button>
                                <div class="row">
                                <div class="col-md-12 cart" style="visible:hidden;" id="keranjang">
                                <div style="height:300px; overflow-y:scroll;">
                                <?php
                                    if ($query1 == true) {
                                        if (mysql_num_rows($query1) < 1 ) {

                                         }

                                         else {
                                            while ($data = mysql_fetch_array($query1)){

                                    ?>

                                    <div class="col-md-4 col-sm-6 portfolio-item" name="produk" onclick="deletedropdowncart('produk', '<?php echo $data['kode_produk']; ?>')">
                                        <a class="portfolio-dropdown" style="background:url('../img/produk/resized/<?php echo $data['foto_produk']; ?>')">
                                            <div class="portfolio-hover">
                                                <div class="portfolio-hover-content">
                                                    <div class="col-md-12">
                                                        <i class="fa fa-trash-o fa-2x"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>           
                                    <?php } 
                                        }
                                    }
        
                                    else { die(mysql_error()); }
                                ?>
                                </div>
                                    <a href="pembelian.php?id=1" style="color:#FFF;">
                                        <div class="col-sm-12 text-center btn btn-primary">
                                            <i class="fa fa-dollar"></i> Beli
                                        </div>
                                    </a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

            <?php
                $query = mysql_query("SELECT keahlian.*,
                                    produk.*,
                                    produk_detil.* 
                                    FROM keahlian INNER JOIN produk 
                                    ON keahlian.id = produk.idkeahlian 
                                    INNER JOIN produk_detil 
                                    ON produk.kode_produk = produk_detil.kode_produk 
                                    ORDER BY tanggal DESC");
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
                                    <!-- Project Details Go Here --><!-- Project Details Go Here -->
                                    <h2><?php echo $data['nama_produk']; ?></h2>
                                    <p class="item-intro text-muted"><?php echo $data['tanggal']; ?></p>
                                    <img class="img-responsive img-centered" src="../img/produk/original/<?php echo $data['foto_produk']; ?>" alt="<?php echo $data['nama_produk']; ?>" title="<?php echo $data['nama_produk']; ?>">
                                    <ul class="list-inline primary">
                                        <li class="item-intro text-muted"><h4>Dibuat oleh: <?php echo $data['email_pekerja'];?></h4></li>
                                        <li class="item-intro text-muted"><h4>Kategori: <?php echo $data['kategori']; ?></h4></li>
                                    </ul>
                                    <p class="item-intro text-muted"><strong><?php echo $data['deskripsi_produk']; ?></strong></p>
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


    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../js/jquery.easing.min.js"></script>
    <script src="../js/classie.js"></script>
    <script src="../js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="../js/jqBootstrapValidation.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../js/agency.js"></script>

    <!-- Filtering -->
    <script src="../js/isotope.pkgd.js"></script>
    <script src="../js/filtering.js"></script>
    
    <script>
        $(document).ready(function(){
            $("#show").click(function(){
                $("#keranjang").toggle();
            });
        });
    </script>

    

</body>
</html>