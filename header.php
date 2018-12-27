<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Header</title>
<script src="js/ajax.js"></script>
<script type="text/javascript">
function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('usernamenya1');
    var pass2 = document.getElementById('passwordnya1');
    //Store the Confimation Message Object ...
    var message = document.getElementById('passwordnya');
    if(pass1.value == pass2.value)
    {
        message.innerHTML = "<span><font color='#1abf12'><i class=\"fa fa-check\"></i></font></span>"
    }
    else
    {
        message.innerHTML = "<span><font color='red'><i class=\"fa fa-exclamation-circle\"></i> Password tidak sama</font></span>"
    }
}

</script>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Selamat Datang</div>
                <div class="intro-heading">Kodesain</div>
                <div class="intro-keterangan">Situs yang menyediakan berbagai jasa untuk anda.</div>
                <div class="intro-keterangan">Dengan adanya kami, pekerjaan anda akan menjadi lebih mudah.</div>
                <div class="intro-keterangan">Dan hanya di Kodesain anda dapat melakukannya.</div>
                <?php if(isset($_SESSION['username'])){ } else {?>
                <a href="#" data-toggle="modal" data-target="#daftar" class="page-scroll btn btn-xl">Daftar</a>
                <?php } ?>
            </div>
        </div>
    </header>

<div class="modal fade" id="daftar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Daftar</h4>
            </div> <!-- /.modal-header -->
            <div class="modal-body">
            <form name="form" id="form" class="form" method="POST" action="user/register_proses.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <div class="input-group merged">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Username*" id="username1" required data-validation-required-message="Masukkan Username anda" name="username" onblur="validate('username', this.value)">
                                <span id="username" class="input-group-addon red"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group merged">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" class="form-control" placeholder="Email anda*" id="email1" required data-validation-required-message="Masukkan Email anda" name="email" onblur="validate('email', this.value)">
                                <span id="email" class="input-group-addon red"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group merged">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Password*" id="usernamenya1" required data-validation-required-message="Masukkan Password" name="usernamenya" onblur="validate('usernamenya', this.value)">
                                <span id="usernamenya" class="input-group-addon red"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group merged">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Ulangi password*" id="passwordnya1" required data-validation-required-message="Masukkan Password." name="passwordnya" onkeyup="checkPass(); return false;">
                                <span id="passwordnya" class="input-group-addon red"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 text-center">
                        <input type="button" value="Daftar" class="form-control btn btn-primary" onclick= 'return checkForm();'>
                    </div>
                </div>
            </form>
            </div> <!-- /.modal-body -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
</body>
</html>