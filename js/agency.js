/*!
 * Start Bootstrap - Agency Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

// Highlight the top nav as scrolling occurs
$('body').scrollspy({
    target: '.navbar-fixed-top'
})

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});

// Closes the Responsive Menu on Click outside Menu
$('body > *').not('nav').click(function() {
    if(!$('button.navbar-toggle').hasClass('collapsed')) {
        $('.navbar-toggle:visible').click();
    }
});

function refreshcart(){
	var xmlhttp;
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
  	}
	else{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	
	xmlhttp.onreadystatechange=function(){
  		if (xmlhttp.readyState==4 && xmlhttp.status==200){
    		document.getElementById("cart-panel").innerHTML=xmlhttp.responseText;
		}
	}
	
	xmlhttp.open("GET","../refreshcart.php",true);
	xmlhttp.send();
}

function updatecart(produk, field){
	var UrlToPass = 'action=insert_availability';
            $.ajax({ // Send the username val to another checker.php using Ajax in POST menthod
            type : 'GET',
            data : UrlToPass,
            url  : '../updatecart.php?produk=' + produk + '&kode=' + field,
            success: function(responseText)
            { // Get the result and asign to each cases
                if(responseText == 0){
					         alert('Silahkan login dulu');
                }
                else if(responseText == 1){
                }
                else if (responseText == 2){
                  alert('Terdapat Produk yang sama pada keranjang');
                }
                else{
                    alert('Problem with sql query');
                }
            }
            });
	refreshcart();
}

function refreshdropdowncart(){
	var xmlhttp;
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
  	}
	else{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	
	xmlhttp.onreadystatechange=function(){
  		if (xmlhttp.readyState==4 && xmlhttp.status==200){
    		document.getElementById("keranjang").innerHTML=xmlhttp.responseText;
		}
	}
	
	xmlhttp.open("GET","../refreshdropdowncart.php",true);
	xmlhttp.send();
}



function deletedropdowncart(produk, field){
  var UrlToPass = 'action=insert_availability';
            $.ajax({ // Send the username val to another checker.php using Ajax in POST menthod
            type : 'GET',
            data : UrlToPass,
            url  : '../deletedropdowncart.php?produk=' + produk + '&kode=' + field,
            success: function(responseText)
            { // Get the result and asign to each cases
                if(responseText == 0){
                   alert('Terjadi kesalahan');
                }
                else if(responseText == 1){
                }
                else{
                    alert('Problem with sql query');
                }
            }
            });
            refreshcart();
}

function deletepembeliancart(produk, field){
  var UrlToPass = 'action=insert_availability';
            $.ajax({ // Send the username val to another checker.php using Ajax in POST menthod
            type : 'GET',
            data : UrlToPass,
            url  : '../deletedropdowncart.php?produk=' + produk + '&kode=' + field,
            success: function(responseText)
            { // Get the result and asign to each cases
                if(responseText == 0){
                   alert('Terjadi kesalahan');
                }
                else if(responseText == 1){
                }
                else{
                    alert('Problem with sql query');
                }
            }
            });
            refreshtotalharga();
            refreshcartpembelian();
}

function refreshcartpembelian(){
  var xmlhttp;
  if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
  else{// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  
  xmlhttp.onreadystatechange=function(){
      if (xmlhttp.readyState==4 && xmlhttp.status==200){
        document.getElementById("cart-pembelian").innerHTML=xmlhttp.responseText;
    }
  }
  
  xmlhttp.open("GET","../refreshcartpembelian.php",true);
  xmlhttp.send();
}

function refreshtotalharga(){
  var xmlhttp;
  if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
  else{// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  
  xmlhttp.onreadystatechange=function(){
      if (xmlhttp.readyState==4 && xmlhttp.status==200){
        document.getElementById("refresh-form").innerHTML=xmlhttp.responseText;
    }
  }
  
  xmlhttp.open("GET","../refreshtotalharga.php",true);
  xmlhttp.send();
}

