function accepted(notification_id){
    var element = document.getElementById("accept"+notification_id);
    if(element.innerHTML=="Accept"){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                element.innerHTML = "Accepted";
                
                var remove = document.getElementById("decline"+notification_id);
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
    var element = document.getElementById("decline"+notification_id);
    if(element.innerHTML=="Decline"){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                element.innerHTML = "Declined";
                
                var remove = document.getElementById("accept"+notification_id);
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