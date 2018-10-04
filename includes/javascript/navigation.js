function removeFromBookmark(book_id,element_name){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var element = document.getElementById(element_name);
            element.style.display = 'none';
        }
    };
    xhttp.open("GET", "bookmark.php?book_id="+book_id+"&type=removeFromBookmark", true);
    xhttp.send();
}