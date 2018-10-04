function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

function addToBookmark(book_id){
    var element = document.getElementById("bookmark");
    alert(element.innerHTML);
    if(element.innerHTML=="Bookmark"){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                element.style.background = 'orange';
                element.innerHTML = "Bookmarked";
            }
        };
        xhttp.open("GET", "bookmark.php?book_id="+book_id+"&type=addToBookmark", true);
        xhttp.send();
    }
}

function removeFromBookmark(book_id){
    if(element.innerHTML=="Bookmarked"){
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

function handleBookmark(book_id){
    var element = document.getElementById("bookmark");
    switch(element.innerHTML){
        case "Bookmark":
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        element.style.background = 'orange';
                        element.innerHTML = "Bookmarked";
                    }
                };
                xhttp.open("GET", "bookmark.php?book_id="+book_id+"&type=addToBookmark", true);
                xhttp.send();
            break;
        case "Bookmarked":
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        element.style.background = 'white';
                        element.innerHTML = "Bookmark";
                    }
                };
                xhttp.open("GET", "bookmark.php?book_id="+book_id+"&type=removeFromBookmark", true);
                xhttp.send();
            break;
        default:
            break;
    }
}

function showLoginModal(modal_id) {
    $(modal_id).modal('show');
}
