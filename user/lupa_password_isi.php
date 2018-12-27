<?php session_start(); include "../koneksi.php"; ?>
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
  <br><br>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-3 text-center"></div>
            <div class="col-md-6">
              <h2 class="section-heading text-center">Lupa Password</h2>
              <br><br>
              <form action="lupa_password_proses.php" enctype="multipart/form-data" method="POST">
                <div class="form-group">
                  <div class="input-group input-group-lg merged">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input class="form-control" placeholder="Masukkan email anda..." name="email">
                    <span class="input-group-btn">
                      <button class="btn btn-default"><span class="fa fa-share-square-o"></span></button>
                    </span>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-md-3 text-center"></div>
          </div>
        </div>
      </div>
    </section>

</body>
</html>

