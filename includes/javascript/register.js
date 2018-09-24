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
