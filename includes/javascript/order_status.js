function accepted(notification_id){
    var element = document.getElementById("accept");
    if(element.innerHTML=="Accept"){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                element.innerHTML = "Accepted";
                
                var remove = document.getElementById("decline");
                remove.parentNode.removeChild(remove);
                
                var att = document.createAttribute('disabled');
                att.value = 'disabled';
                element.setAttributeNode(att);
            }
        };
        xhttp.open("GET", "order.php?notification_id="+notification_id+"&type=acceptOrder", true);
        xhttp.send();
    }
}

function rejected(notification_id){
    var element = document.getElementById("decline");
    if(element.innerHTML=="Decline"){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                element.innerHTML = "Declined";
                
                var remove = document.getElementById("accept");
                remove.parentNode.removeChild(remove);
                
                var att = document.createAttribute('disabled');
                att.value = 'disabled';
                element.setAttributeNode(att);
            }
        };
        xhttp.open("GET", "order.php?notification_id="+notification_id+"&type=declineOrder", true);
        xhttp.send();
    }
}