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
	<div class="form-body">
		<div class="judul">
    		<h2>Input Pekerja</h2>
    	</div>
        <form action="add_pekerja_proses.php" method="POST" class="form" enctype="multipart/form-data">
            <div class="username">
                <span class="span">Nama Pengguna</span>
                <input type="text" placeholder="Nama Pengguna" name="username" required="required" />
            </div>
            <div class="password">
                <span>Kata Sandi</span>
                <input type="password" placeholder="*******" name="password" required="required" />
            </div>
            <div class="nama">
                <span>Nama Lengkap</span>
                <input type="text" placeholder="Nama Lengkap" name="nama" required="required" />
            </div>
            <div class="nama">
                <span>Email</span>
                <input type="text" placeholder="Email" name="email" required="required" />
            </div>
            <div class="foto">
                <span>Foto</span><br />
                <input type="file" placeholder="Foto" name="foto" required="required" />
            </div>
            <div class="submit">
                <button>Submit</button>
                <input type="reset" value="Clear" />
            </div>
        </form>
    </div>


</body>
</html>