<?php session_start(); include "admin.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Pengguna</title>

<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<link href="../css/admin-body.css" rel="stylesheet" />
</head>
<body>
<div class="wrap">
    <table>
	   <tr style="color:#FFF;">
            <td>No</td>
            <td>Pengguna</td>
            <td>Email</td>
            <td>Alamat</td>
            <td>Telepon</td>
            <td>Foto</td>
            <td></td>

        </tr>
        <?php
    	   include "view.php";
		
		  $view	= new view();
		  $view->view_user();
	   ?>
    </table>
</body>
</html>