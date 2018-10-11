var flag_username = true;
var flag_password = true;
var flag_email = true;
var flag_name = true;
var flag_contact = true;
var flag_pincode = true;

function checkPassword(){
    var original_passwd = document.getElementById('passwd').value
    var confirm_passwd = document.getElementById('confirmpwd').value
    var error_p = document.getElementById('error_msg_confirmpwd')
    if(original_passwd === confirm_passwd){
        error_p.style.display = 'none';
        flag_password = true;
    }else{
        error_p.style.display = 'block';
        flag_password = false;
    }
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
                    flag_username = true;
                }else{
                    element.style.display = "block";
                    flag_username = false;
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
                    element.style.display = 'none';
                    flag_email = true;
                }else{
                    element.style.display = 'block';
                    flag_email = false;
                }                
            }
        };
        xhttp.open("GET", "templates/async_check_register.php?verify_email="+email, true);
        xhttp.send();
    }
}

function checkName(name) {
    var pattern = new RegExp("^[A-Za-z]+$");
    if (!pattern.test(name)) {
        document.getElementById('name_error').style.display = 'block';
        flag_name = false;
    }else{
        document.getElementById('name_error').style.display = 'none';
        flag_name = true;
    }
}

function checkContact(contact) {
    if (contact.length != 10) {
        document.getElementById('contact_error').innerHTML = "Contact no should be of 10 digits!!!";
        flag_contact = false;
    }else{
        if(contact!=null){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var response = this.responseText;
                    var element = document.getElementById("contact_error");
                    if(response == "valid"){
                        element.innerHTML = '';
                        flag_contact = true;
                    }else{
                        element.innerHTML = "Contact no. in use!!!";
                        flag_contact = false;
                    }                
                }
            };
            xhttp.open("GET", "templates/async_check_register.php?verify_contact="+contact, true);
            xhttp.send();
        }
    }
}

function checkPincode(pincode) {
    if (pincode.length != 6) {
        document.getElementById('pincode_error').style.display = 'block';
        flag_pincode = false;
    }else{
        document.getElementById('pincode_error').style.display = 'none';
        flag_pincode = true;
    }
}

function checkForm() {
    if (flag_pincode && flag_password && flag_contact && flag_name && flag_email && flag_name && flag_username){
        return true;
    }
    else{
        return false;
    }
}
