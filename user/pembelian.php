<?php
session_start();
if (isset($_SESSION['username'])) {
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

    <!-- DatetimePicker CSS -->
    <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

    <script type="text/javascript">
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
            return true;
    }

    function cekharga(){
        var total = document.getElementById("total").value;
        var bayar = document.getElementById("bayar").value;
        var check = document.getElementById("check");
        var totalharga = Math.floor(total);
        var bayarharga = Math.floor(bayar);
        
        if (bayarharga < totalharga){
            check.innerHTML = "<font color=\"red\"><i class=\"fa fa-close\"></i></font>";
        }
        else {
            check.innerHTML = "";
        }
    }

    function check(){
        //mengambil nilai form
        var waktu = document.getElementById("waktu").value;
        var total = document.getElementById("total").value;
        var bayar = document.getElementById("bayar").value;
        var atasnama = document.getElementById("atasnama").value;
        var bukti = document.getElementById("bukti").value;
        var check = document.getElementById("check");

 
        if(waktu == '' || total == '' || bayar == '' || atasnama == '' || bukti == ''){
        alert("Form tidak boleh kosong");
        }

        else if (check.innerHTML == "<font color=\"red\"><i class=\"fa fa-close\"></i></font>"){
            alert("Nominal pengiriman uang kurang dari Total Harga");
        }

        else{
            document.getElementById("form").submit();
        }
    }
    </script>
</head>

<body>
<?php include "../navbar.php"; ?>

<section id="portfolio" class="bg-light-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <span class="list-group-item active text-center">
                    <h3>Pembelian</h3>
                </span>
                <div class="panel panel-body" style="overflow-y:scroll; height:500px;">
                <div id="cart-pembelian">
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
                    </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-10">
                    <div class="alert alert-danger text-justify" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        <strong>Peringatan</strong>
                        <br>
                        Jika anda benar-benar sudah mentransfer uangnya sesuai dengan harganya, maka anda diizinkan untuk melanjutkan tahap ini, tapi jika anda belum mentransfer uangnya, maka jangan lakukan tahap ini terlebih dahulu. Jika terjadi kesalahan bukan tanggung jawab kami.
                        <br>
                        <button class="btn btn-default" id="open">Saya mengerti</button>
                    </div>
                </div>
                <div id="tampil" style="display:none;">
                    <div class="col-md-10">
                        <div class="alert alert-danger text-justify" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            <span class="sr-only">Error:</span>
                            <strong>Peringatan</strong>
                            <br>
                            Mohon diisi sesuai dengan bukti transfer anda.
                        </div>
                    </div>
                    <form name="form" id="form" method="POST" action="pembayaran.php" enctype="multipart/form-data">
                        <div class="col-md-10">
                            <div class="form-group">
                                <div class="input-group date form_datetime col-md-12" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                    <input id="waktu" class="form-control" size="16" type="text" value="" name="waktu" placeholder="Waktu ketika anda mentransfer" readonly>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                </div>
                                <input type="hidden" id="dtp_input1" value="" />
                            </div>
                            
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
                            <div class="form-group">
                                <div class="input-group merged">
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                    <div id="refresh-form">
                                    <input id="total" type="text" class="form-control" placeholder="Total harga*" name="totalharga" value="<?php echo $totalharga;?>" readonly required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group merged">
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                    <input id="bayar" type="text" class="form-control" placeholder="Nominal yang anda kirim*" name="bayar" data-validation-required-message="Masukkan Nominal yang Anda kirim" onkeypress="return isNumberKey(event)" onBlur="cekharga(); return false;" required>
                                    <span id="check" class="input-group-addon"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group merged">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input id="atasnama" type="text" class="form-control" placeholder="Atas nama*" name="atasnama" data-validation-required-message="Masukkan atas Nama pengirim" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Mohon sertakan bukti transfernya</label>
                                <div class="input-group merged">
                                    <span class="input-group-addon"><i class="fa fa-camera"></i></span>
                                    <input id="bukti" type="file" class="form-control" name="bukti" data-validation-required-message="Masukkan atas Nama pengirim" required >
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 text-center">
                            <input type="button" value="Bayar" class="form-control btn btn-primary" onclick='check();'>
                        </div>
                    </form>
                    </div>
                </div> <!--Closing id Open -->
            </div> <!-- Closing col-md-6 -->
        </div> <!-- Closing ROW -->
    </div> <!-- Closing Container -->
</section>

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

    <!-- Datetime Picker -->
    <script src="../js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
    $('.form_datetime').datetimepicker({
        language:  'id',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });

    $("#open").click(function(){
     $("#tampil").toggle();
    });
    </script>
</body>
</html>

<?php }
else {
    echo "<script language='javascript'>alert('Silahkan login dahulu sebagai member');</script>";
    echo "<script>window.location.href='../index.php';</script>";
}