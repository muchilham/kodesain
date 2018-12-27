<?php session_start(); include "admin.php"; include "session_produk.php" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tambah Admin</title>
<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<link href="../css/admin-body.css" rel="stylesheet" />
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
<div class="wrap">
	<div class="form-body">
		<div class="judul">
    		<h2>Input Produk</h2>
    	</div>
        <form action="add_produk_proses.php" method="POST" class="form" enctype="multipart/form-data">
            <div class="nama">
                <span>Kode Produk*</span>
                <input type="text" placeholder="Kode Produk" name="kode" required="required" value="<?php echo $CodeBy; ?>" readonly  />
            </div>
            <div class="foto">
                <span>Foto*</span><br />
                <input type="file" placeholder="Foto" name="foto" required="required" />
            </div>
            <div class="nama">
                <span>Nama Produk*</span>
                <input type="text" placeholder="Nama Produk" name="nama" required="required" />
            </div>
            <div class="nama">
                <span>Email Pekerja*</span>
                <?php if($_SESSION['jabatan'] == 'pekerja'){ ?>
                <input type="text" placeholder="Email Pekerja" name="email" value="<?php echo $_SESSION['email_pekerja']; ?>" required="required" readonly />
                <?php } else { ?>
                <select name="email" onmousedown="if(this.options.length>1){this.size=3;}" onchange='this.size=0;' onblur="this.size=0;">
                   <option value="" disabled selected>Pilih Email</option>
                    <?php include "session_email_pekerja.php"; ?>
                </select>
                <?php } ?>
            </div>
            <div class="nama">
                <span>Kategori*</span>
                <select name="kategori" onmousedown="if(this.options.length>1){this.size=3;}" onchange='this.size=0;' onblur="this.size=0;">
                   <option value="" disabled selected>Pilih Kategori</option>
                   <?php include "session_keahlian.php"; ?>
                </select>
            </div>
            <div class="nama">
                <span>Harga*</span><br />
                <input type="text" placeholder="Harga" name="harga" onkeypress="return isNumberKey(event)" required="required" />
            </div>
            <div class="nama">
                <span>Deskripsi foto* (Max:40)</span><br>
                <textarea name="deskripsi" maxlength="40"></textarea>
            </div>
            <div class="submit">
                <button>Submit</button>
                <input type="reset" value="Clear" />
            </div>
        </form>
    </div>


</body>
</html>