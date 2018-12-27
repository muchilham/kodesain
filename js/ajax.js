function checkForm(){
 
    //mengambil nilai form
    var name = document.getElementById("username1").value;
    var user = document.getElementById("usernamenya1").value;
    var pass = document.getElementById("passwordnya1").value;
    var email = document.getElementById("email1").value;

 
    if(name == '' || user == '' || email == '' || pass == ''){
        alert("Form tidak boleh kosong");
    } 

    else {
        var username1 = document.getElementById("username");
        var user1 = document.getElementById("usernamenya");
        var pass1 = document.getElementById("passwordnya");
        var email1 = document.getElementById("email");
 
        //Check value form
        if(username1.innerHTML == '<i class=\"fa fa-exclamation-circle\"></i> Harus lebih dari 3 huruf' || 
            username1.innerHTML == '<i class=\"fa fa-exclamation-circle\"></i> Username sudah digunakan' || 
            user1.innerHTML == '<i class=\"fa fa-exclamation-circle\"></i> Buruk' ||
            pass1.innerHTML == '<i class=\"fa fa-exclamation-circle\"></i> Password tidak sama' ||
            email1.innerHTML == '<i class=\"fa fa-exclamation-circle\"></i> Format email salah!' || 
            email1.innerHTML == '<i class=\"fa fa-exclamation-circle\"></i> Email sudah digunakan')
        {
            alert('Informasi harus valid!!');
        }

        else {
            document.getElementById("form").submit();
        }
    }
}
 
function validate(field, query){
    var xmlhttp;
    if(window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
 
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState != 4 && xmlhttp.status == 200){
            document.getElementById(field).innerHTML = "Cek Validasi..";
        } else if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById(field).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById(field).innerHTML = "Error Occurred. <a href='index.php'>Reload Or Try Again</a> the page.";
        }
    }
    xmlhttp.open("GET","validation.php?field=" + field + "&query=" + query, false);
    xmlhttp.send();
}
