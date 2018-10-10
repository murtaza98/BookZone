$(document).ready(function(){
    ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .catch( error => {
        console.error( error );
    } );
});

var price_valid = true;


function checkPrice(){
    var original_price = document.getElementById("book_original_price");
    var selling_price = document.getElementById("book_selling_price");
    
    if(original_price != undefined && selling_price != undefined){
        if(parseInt(original_price.value,10) < parseInt(selling_price.value,10)){
            original_price.style.boxShadow = "0px 0px 4px 4px #f00";
            selling_price.style.boxShadow = "0px 0px 4px 4px #f00";
            showError("Selling Price should be less than or equal to Original Price");
            price_valid = false;
        }else{
            hideError();
            price_valid = true;
        }
    }
}

function showError(message){
    var msg_start = "<strong>Error!   </strong>";
    
    var error_element = document.getElementById("error_message");
    error_element.style.display = "block";
    error_element.innerHTML = msg_start + message;
}

function hideError(){
    var original_price = document.getElementById("book_original_price");
    var selling_price = document.getElementById("book_selling_price");
    original_price.style.removeProperty("box-shadow");
    selling_price.style.removeProperty("box-shadow");
    
    var error_element = document.getElementById("error_message");
    error_element.style.display = "none";
}

function checkForm(){
    if(price_valid){
        return true;
    }else{
        return false;
    }
}
