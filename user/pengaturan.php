<?php 
		include "../koneksi.php";	
		include "pengaturan_awal.php";
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

<script type="text/javascript">
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>
</head>

<body>

<?php include "../navbar.php"; ?>

    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Halaman Profil</div>
                <div class="intro-keterangan">Disini anda dapat mengubah foto profil anda,</div>
                <div class="intro-keterangan">mengubah password anda, melengkapi data pribadi anda.</div>
                <div class="intro-keterangan">Dan anda bisa melihat histori pemesanan project anda sudah sampai mana.</div>
            </div>
        </div>
    </header>


    <section id="profile">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Profil</h2>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-6">
                    <div class="team-member">
                        <img src="<?php echo $_SESSION['foto']; ?>" class="img-responsive img-rounded" alt="<?php echo $_SESSION['username']; ?>" title="<?php echo $_SESSION['username']; ?>">
                    </div>
                    <h4 class="service-heading">Ganti Foto</h4>
                    <form name="upload" class="upload" method="POST" enctype="multipart/form-data" action="upload_proses.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <input type="file" name="pic" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </div>
                        </div>
				    </form>
                </div>

                <div class="col-md-6"> 
				    <h4 class="service-heading">Data Pribadi</h4>
                    <form name="sentMessage" id="contactForm" method="POST" novalidate action="update_proses.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nama anda *" id="name" required data-validation-required-message="Masukkan nama asli anda" name="name" value="<?php echo $_SESSION['nama']; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password anda *" id="password" required data-validation-required-message="Masukkan password anda" name="password">
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Nomor telepon anda *" id="phone" required data-validation-required-message="Masukkan nomor telepon anda" name="phone" value="<?php echo $_SESSION['telepon']; ?>" onkeypress="return isNumberKey(event)">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Alamat anda *" id="message" required data-validation-required-message="Masukkan alamat anda" name="alamat"><?php echo $_SESSION['alamat']; ?></textarea>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-10">
                                <p class="text-muted">Masukkan Password terlebih dahulu untuk melanjutkan</p>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password anda *" id="password" required data-validation-required-message="Masukkan password anda" name="password2">
                                </div>
                                <button type="submit" class="btn btn-primary">Perbarui</button>
                            </div>
                        </div>
                    </form>
    			</div>
       		</div>
        </div>
    </section>

    <section id="pemesanan" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Pemesanan Project</h2>
                </div>
            </div>

            <div class="row">
                <table class="table table-hover table-responsive text-center">
        	   		<tr>
						<td>No</td>
						<td>Deskripsi Foto</td>
						<td>Foto</td>
						<td>status</td>
						<td>&nbsp;</td>
        			</tr>
						<?php
                        if (isset($_GET["project"])) { $page  = $_GET["project"]; } else { $page=1; };
                        $num_rec_per_page=1;
                        $start_from = ($page-1) * $num_rec_per_page;
						$project	= mysql_query("SELECT photo, deskripsi_foto, status FROM project WHERE username = '$terimauser' LIMIT $start_from, $num_rec_per_page");

						if(mysql_num_rows($project) == true){
							$nomer = 1;
							while($tampil 	= mysql_fetch_array($project)){
								$_SESSION['desk'] = $tampil['deskripsi_foto'];
								$_SESSION['photos'] = $tampil['photo'];

								$foto = $tampil['photo'];
								echo "<tr style=\"background:#FFF;\">";
									echo "<td>".$nomer.".</td>";
									echo "<td>".$tampil['deskripsi_foto']."</td>";
									echo "<td><img src='images/".$tampil['photo']."' class=\"img-responsive img-rounded\" width=\"240\" height=\"200\"></td>";

                                    if ($tampil['status'] == 'Belum diterima'){
									   echo "<td>".$tampil['status']."<div class=\"progress\">";
                                            echo "<div class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"60\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 0%;\">";
                                                echo "<font color=\"#000\">0%";
                                            echo "</div>";
                                        echo "</div></td>";
                                    }

                                    elseif ($tampil['status'] == 'Sudah diterima'){
                                       echo "<td>".$tampil['status']."<div class=\"progress\">";
                                            echo "<div class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"60\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 25%;\">";
                                                echo "25%";
                                            echo "</div>";
                                        echo "</div></td>";
                                    }

                                    elseif ($tampil['status'] == 'Proses pengerjaan'){
                                       echo "<td>".$tampil['status']."<div class=\"progress\">";
                                            echo "<div class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"60\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 50%;\">";
                                                echo "50%";
                                            echo "</div>";
                                        echo "</div></td>";
                                    }

                                    elseif ($tampil['status'] == 'Selesai pengerjaan'){
                                       echo "<td>".$tampil['status']."<div class=\"progress\">";
                                            echo "<div class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"60\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 75%;\">";
                                                echo "75%";
                                            echo "</div>";
                                        echo "</div></td>";
                                    }

                                    else {
                                       echo "<td>".$tampil['status']."<div class=\"progress\">";
                                            echo "<div class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"60\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 100%;\">";
                                                echo "100%";
                                            echo "</div>";
                                        echo "</div></td>";
                                    }
									echo "<td><form action='hapus_project.php' method='post'><button  name='ini' value='$foto' onclick=\"javascript: if(confirm('Yakin ingin dihapus?')); \" class=\"btn btn-primary\">Hapus</button></form></td>";
								echo "</tr>";
								$nomer++;
							}
						}
						
						else {
							echo "<tr style=\"background:#FFF;\">";
								echo "<td></td>";
								echo "<td colspan=\"3\"><center>Tidak ada data!</center></td>";
								echo "<td></td>";
							echo "</tr>";
						}
						?>
        		</table>

                <?php 
                $sql = "SELECT * FROM project"; 
                $rs_result = mysql_query($sql); //run the query
                $total_records = mysql_num_rows($rs_result);  //count number of records
                $total_pages = ceil($total_records / $num_rec_per_page); 
                echo "<nav class=\"text-center\">
                        <ul class=\"pagination pagination-lg\">
                            <li>
                                <a href='pengaturan.php?project=1' aria-label=\"Previous\"><span aria-hidden=\"true\">&laquo;</span></a>
                            </li> "; // Goto 1st page  
                for ($i=1; $i<=$total_pages; $i++) { 
                    echo "<li><a href='pengaturan.php?project=".$i."'>".$i."</a></li>"; 
                };

                echo "<li><a href='pengaturan.php?project=$total_pages' aria-label=\"Next\"><span aria-hidden=\"true\">&raquo;</span></a></li>"; // Goto last page

                ?>
            </div>

            <br><br><br><br><br>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Pembelian</h2>
                </div>
            </div>

            <div class="row">
                <table class="table table-hover table-responsive text-center">
                    <tr>
                        <!--<td>No</td>-->
                        <td>Kode Pembelian</td>
                        <td>Nama Produk</td>
                        <td>Foto</td>
                        <td>Tanggal</td>
                        <td>&nbsp;</td>
                    </tr>
                        <?php
                        if (isset($_GET["pembelian"])) { $page  = $_GET["pembelian"]; } else { $page=1; };
                        $num_rec_per_page=10;
                        $start_from = ($page-1) * $num_rec_per_page;
                        $project    = mysql_query("SELECT pembelian.*, 
                                            pembelian_detil.nama_produk,
                                            pembelian_detil.foto_produk,
                                            pembelian_detil.tanggal_pembelian
                                            FROM pembelian INNER JOIN pembelian_detil
                                            ON pembelian.kode_pembelian = pembelian_detil.kode_pembelian
                                            WHERE username = '$terimauser' LIMIT $start_from, $num_rec_per_page");

                        if(mysql_num_rows($project) == true){
                            //$nomer = 1;
                            while($tampil   = mysql_fetch_array($project)){
                                $_SESSION['photos'] = $tampil['foto_produk'];

                                $foto = $tampil['foto_produk'];
                                echo "<tr style=\"background:#FFF;\">";
                                    //echo "<td>".$nomer.".</td>";
                                    echo "<td>".$tampil['kode_pembelian']."</td>";
                                    echo "<td>".$tampil['nama_produk']."</td>";
                                    echo "<td><img src='../img/produk/original/".$tampil['foto_produk']."' class=\"img-responsive img-rounded\" width=\"200\" height=\"200\"></td>";
                                    echo "<td>".$tampil['tanggal_pembelian']."</td>";
                                    echo "<td><form action='hapus_pembelian.php' method='post'><button  name='ini' value='$foto' onclick=\"javascript: if(confirm('Yakin ingin dihapus?')); \" class=\"btn btn-primary\">Hapus</button></form></td>";
                                echo "</tr>";
                                //$nomer++;
                            }
                        }
                        
                        else {
                            echo "<tr style=\"background:#FFF;\">";
                                echo "<td></td>";
                                echo "<td colspan=\"4\"><center>Tidak ada data!</center></td>";
                                echo "<td></td>";
                            echo "</tr>";
                        }
                        ?>
                </table>
                <?php 
                $sql = "SELECT * FROM pembelian"; 
                $rs_result = mysql_query($sql); //run the query
                $total_records = mysql_num_rows($rs_result);  //count number of records
                $total_pages = ceil($total_records / $num_rec_per_page); 
                echo "<nav class=\"text-center\">
                        <ul class=\"pagination pagination-lg\">
                            <li>
                                <a href='pengaturan.php?page=1' aria-label=\"Previous\"><span aria-hidden=\"true\">&laquo;</span></a>
                            </li> "; // Goto 1st page  
                for ($i=1; $i<=$total_pages; $i++) { 
                    echo "<li><a href='pengaturan.php?pembelian=".$i."'>".$i."</a></li>"; 
                };

                echo "<li><a href='pengaturan.php?pembelian=$total_pages' aria-label=\"Next\"><span aria-hidden=\"true\">&raquo;</span></a></li>"; // Goto last page

                ?>
            </div>
        </div>
    </section>



    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="../js/classie.js"></script>
    <script src="../js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="../js/jqBootstrapValidation.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../js/agency.js"></script>
</body>
</html>
 
