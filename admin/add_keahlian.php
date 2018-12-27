<?php session_start(); include "admin.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tambah Keahlian</title>
<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<link href="../css/admin-body.css" rel="stylesheet" />

</head>

<body>
<div class="wrap">
	<div class="form-body">
		<div class="judul">
    		<h2>Input Kategori</h2>
    	</div>
        <form action="add_keahlian_proses.php" method="POST" class="form" enctype="multipart/form-data">
            <div class="keahlian">
                <span class="span">Kategori</span>
                <input type="text" name="kategori" required="required" />
            </div>
            <div class="submit">
            	<button>Submit</button>
                <input type="reset" value="Clear" />
            </div>
        </form>
    </div>
</div>


</body>
</html>