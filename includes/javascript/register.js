function sayHello(){
    var original_passwd = document.getElementById('passwd').value
    var confirm_passwd = document.getElementById('confirmpwd').value
    var error_p = document.getElementById('error_msg_confirmpwd')
    if(original_passwd === confirm_passwd){
        error_p.style.display = 'none'
    }else{
        error_p.style.display = 'block'
    }
}

window.onload = function(){
    
}

function checkUsername(username){
    if(username!=null){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var response = this.responseText;
                var element = document.getElementById("username_error");
                if(response == "valid"){
                    element.style.display = "none";
                    return true;
                }else{
                    element.style.display = "block";
                    return false;
                }
            }
        };
        xhttp.open("GET", "templates/async_check_register.php?verify_username="+username, true);
        xhttp.send();
    }
}

function checkEmail(email){
    if(email!=null){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var response = this.responseText;
                var element = document.getElementById("email_error");
                if(response == "valid"){
                    element.style.background = 'none';
                    return true;
                }else{
                    element.style.background = 'block';
                    return false;
                }                
            }
        };
        xhttp.open("GET", "templates/async_check_register.php?verify_email="+email, true);
        xhttp.send();
    }
}

function validateForm() {
    var x = document.getElementById('email').value;
    var error_p = document.getElementById('error_msg_email')
    if (x == "") {
        error_p.style.display = 'block'
    }
}
