function checkOTP(otp,username,email_id){
    
    var otp_element = document.getElementById("validate-email");
    
    if(otp_element.innerHTML!=null && otp_element.innerHTML!=""){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {




                var element = document.getElementById("bookmark");
                element.style.background = 'white';
                element.innerHTML = "Bookmark";
            }
        };
        xhttp.open("GET", "bookmark.php?book_id="+book_id+"&type=removeFromBookmark", true);
        xhttp.send();
    }
}