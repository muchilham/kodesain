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
<?php 
	if(!isset($_SESSION['username'])){
    	echo "<script language='javascript'>alert('Silahkan login dahulu sebagai member');</script>";
    	echo "<script>window.location.href='../index.php';</script>";
	}
	
	else{
?>
<?php include "../navbar.php"; ?>


    <section class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <br><br><h2 class="section-heading">Kirim Project</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 text-center">
                    <form action="kirim_project_proses.php" enctype="multipart/form-data" method="POST">
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                        </div>
                    </form>
                </div>
            	<div class="col-md-6">
            		<form action="kirim_project_proses.php" enctype="multipart/form-data" method="POST">
            			<div class="form-group">
							<label for="username">Nama Pengguna*</label>
							<input type="text" name="username" value="<?php echo $_SESSION['username']; ?>" readonly class="form-control">
						</div>
						<div class="form-group">
							<label for="fullname">Nama Lengkap*</label>
							<input type="text" name="fullname" value="<?php echo $_SESSION['nama'];?>" required class="form-control">
						</div>
						<div class="form-group">
							<label for="email">Email*</label>
							<input type="email" name="email" value="<?php echo $_SESSION['email'];?>" required class="form-control">
						</div>
						<div class="form-group">
							<label for="alamat">Alamat Rumah*</label>
							<textarea name="alamat" rows="3" class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label for="telepon">Telepon*</label>
							<input type="text" onkeypress="return isNumberKey(event)" name="telepon" value="<?php echo $_SESSION['telepon'];?>" required class="form-control">
						</div>
						<div class="form-group">
            				<label for="Photos"> Foto* </label>
                			<input type="file" name="foto" required="required" class="form-control">
                		</div>
                		<div class="form-group">			
            				<select name="pekerja" onmousedown="if(this.options.length>1){this.size=5;}" onchange='this.size=0;' onblur="this.size=0;" class="form-control" required>
                    			<option value="" disabled selected>Pilih Pekerja*</option>
                        		<?php include "session_pekerja.php"; ?>
							</select>
						</div>
						<div class="form-group">
							<select name="kategori" onmousedown="if(this.options.length>1){this.size=5;}" onchange='this.size=0;' onblur="this.size=0;" class="form-control" required>
                    			<option value="" disabled selected>Pilih Kategori*</option>
								<?php include "session_kategori.php"; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="deskripsi">Deksripsi Project*</label>
							<textarea name="deskripsi" rows="3" class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<input type="submit" id="project" value="Kirim" class="btn btn-xl">
						</div>
            		</form>
            	</div>
                <div class="col-md-3 text-center">
                    <form action="kirim_project_proses.php" enctype="multipart/form-data" method="POST">
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php } ?>

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