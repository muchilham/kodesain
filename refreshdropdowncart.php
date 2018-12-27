<?php
session_start();
include('koneksi.php'); include('user/session_user.php');

$query1 = mysql_query("SELECT keranjang.*,
						produk.*,
						produk_detil.*
						FROM keranjang INNER JOIN produk 
						ON keranjang.kode_produk = produk.kode_produk
						INNER JOIN produk_detil
						ON produk.kode_produk = produk_detil.kode_produk 
						WHERE keranjang.username = '$terimauser'");

$jumlahkeranjang 	= mysql_num_rows($query1);
?>
	<div>
		<div style="height:300px;overflow-y:scroll;">
    	<?php
		if ($query1 == true) {
			if (mysql_num_rows($query1) < 1 ) {
			}
			
			else {
				while ($data = mysql_fetch_array($query1)){
		?>	
			<div class="col-md-4 col-sm-6 portfolio-item" name="produk" onclick="deletedropdowncart('produk', '<?php echo $data['kode_produk']; ?>')">
            	<a class="portfolio-dropdown" style="background:url('../img/produk/resized/<?php echo $data['foto_produk']; ?>')">
                	<div class="portfolio-hover">
                    	<div class="portfolio-hover-content">
                        	<div class="col-md-12">
                            	 <i class="fa fa-trash-o fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>           
     	<?php } 
			}
		}
		
		else { die(mysql_error()); }
		?>
		</div>
		<a href="pembelian.php?id=1" style="color:#FFF;">
            <div class="col-md-12 text-center btn btn-primary">
                <i class="fa fa-dollar"></i> Beli
			</div>
    	</a>
	</div>