<?php if(!isset($_GET['id']) && !isset($_GET['project']) && !isset($_GET['pembelian'])){ ?>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Kodesain</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#services">Services</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#team">Team</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Portfolio</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#cara">Tata Cara</a>
                    </li>

                    <li>
                        <a class="page-scroll" href="#kontak">Kontak</a>
                    </li>
                    <?php if(isset($_SESSION['username'])){include "user/user.php";}
					else{
					?>
                    <li>
                    	<a href="#" data-toggle="modal" data-target="#login">Login</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Log in</h4>
                </div> <!-- /.modal-header -->
                <div class="modal-body">
                    <form name="sentMessage" id="contactForm" method="POST" action="user/login_proses.php">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <div class="input-group merged">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control" placeholder="Username" id="name" required data-validation-required-message="Masukkan Username anda" name="username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group merged">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="password" class="form-control" placeholder="********" id="password" required data-validation-required-message="Masukkan Password anda" name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 text-center">
                                <button class="form-control btn btn-primary"><i class="fa fa-sign-in"></i>&nbsp;&nbsp;Masuk</button>
                            </div>
                        </div>
                    </form>
                        <a href="user/lupa_password_isi.php?id=1"><h4>Lupa Password</h4></a>
                </div> <!-- /.modal-body -->
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>


<?php } elseif (isset($_GET['id']) && !isset($_GET['project']) && !isset($_GET['pembelian'])){ ?>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="../index.php">Kodesain</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="../index.php#services">Services</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="../index.php#team">Team</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="../index.php#portfolio">Portfolio</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="../index.php#cara">Tata Cara</a>
                    </li>

                    <li>
                        <a class="page-scroll" href="../index.php#kontak">Kontak</a>
                    </li>
                    <?php if(isset($_SESSION['username'])){include "user/user.php";}
                    else{
                    ?>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#login">Login</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Log in</h4>
                </div> <!-- /.modal-header -->
                <div class="modal-body">
                    <form name="sentMessage" id="contactForm" method="POST" action="login_proses.php">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <div class="input-group merged">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control" placeholder="Username" id="name" required data-validation-required-message="Masukkan Username anda" name="username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group merged">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="password" class="form-control" placeholder="********" id="password" required data-validation-required-message="Masukkan Password anda" name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 text-center">
                                <button class="form-control btn btn-primary"><i class="fa fa-sign-in"></i>&nbsp;&nbsp;Masuk</button>
                            </div>
                        </div>
                    </form>
                    <a href="lupa_password_isi.php?id=1"><h4>Lupa Password</h4></a>
                </div> <!-- /.modal-body -->
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <?php } else{ ?>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="../index.php">Kodesain</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="../index.php#services">Services</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="../index.php#team">Team</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="../index.php#portfolio">Portfolio</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="../index.php#cara">Tata Cara</a>
                    </li>

                    <li>
                        <a class="page-scroll" href="../index.php#kontak">Kontak</a>
                    </li>
                    <?php if(isset($_SESSION['username'])){include "user/user.php";}
                    else{
                    ?>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#login">Login</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Log in</h4>
                </div> <!-- /.modal-header -->
                <div class="modal-body">
                    <form name="sentMessage" id="contactForm" method="POST" action="login_proses.php">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <div class="input-group merged">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control" placeholder="Username" id="name" required data-validation-required-message="Masukkan Username anda" name="username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group merged">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="password" class="form-control" placeholder="********" id="password" required data-validation-required-message="Masukkan Password anda" name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 text-center">
                                <button class="form-control btn btn-primary"><i class="fa fa-sign-in"></i>&nbsp;&nbsp;Masuk</button>
                            </div>
                        </div>
                    </form>
                    <a href="lupa_password_isi.php?id=1"><h4>Lupa Password</h4></a>
                </div> <!-- /.modal-body -->
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <?php } ?>