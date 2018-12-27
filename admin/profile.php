<?php include "admin.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tambah Admin</title>
<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<link href="../css/admin-body.css" rel="stylesheet" />

</head>

<body>

<div class="wrap">
    <div class="profile">
		<div class="judul2">
    		<h2>Profil</h2>
    	</div>
        <img src="<?php echo $_SESSION['foto'];?>">
        <form name="upload" class="form" method="POST" enctype="multipart/form-data" action="ganti_foto_proses.php">
    		<div class="foto">
            	<span>Ganti Foto</span><br />
            	<input type="file" placeholder="Foto" name="pic" required="required" />
            	<button>Unggah</button>
            </div>
		</form>
		<form name="nama" class="form" method="post" enctype="multipart/form-data" action="update_admin.php">
            <div class="nama">
            	<span>Ganti Nama</span>
            	<input type="text" name="nama" required="required" value="<?php echo $_SESSION['nama_lengkap']; ?>" />
            </div>
            <div class="password">
            	<span>Ganti Kata Sandi</span>
            	<input type="password" name="password" placeholder="Ganti kata sandi" />
            <div class="password">
                <span>Masukkan password anda terlebih dahulu untuk melanjutkannya.</span>
                <input type="password" name="password2" required="required" placeholder="Masukkan kata sandi anda" />
            	<button>Ganti</button>
            </div>
        </form>
    </div>
</div>


</body>
</html>