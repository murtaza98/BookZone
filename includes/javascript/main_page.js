function autocomplete(inp,parent_element) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      
//      var arr = showResultList(val,parent_element);
      
      getResult(this.value);
      
      /*create a DIV element that will contain the items (values):*/
//      a = document.createElement("DIV");
//      a.setAttribute("id", this.id + "autocomplete-list");
//      a.setAttribute("class", "autocomplete-items");
//      /*append the DIV element as a child of the autocomplete container:*/
////      this.parentNode.appendChild(parent_element);
//      parent_element.appendChild(a);
//      /*for each item in the array...*/
//      for (i = 0; i < arr.length; i++) {
//        /*check if the item starts with the same letters as the text field value:*/
//        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
//          /*create a DIV element for each matching element:*/
//          b = document.createElement("DIV");
//          /*make the matching letters bold:*/
//          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
//          b.innerHTML += arr[i].substr(val.length);
//          /*insert a input field that will hold the current array item's value:*/
//          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
//          /*execute a function when someone clicks on the item value (DIV element):*/
//              b.addEventListener("click", function(e) {
//              /*insert the value for the autocomplete text field:*/
//              inp.value = this.getElementsByTagName("input")[0].value;
//              /*close the list of autocompleted values,
//              (or any other open lists of autocompleted values:*/
//              closeAllLists();
//          });
//          a.appendChild(b);
//        }
//      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById("autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
      x[i].parentNode.removeChild(x[i]);
    }
  }
}
    
    function getResult(str) {
      if (str.length==0) { 
        document.getElementById("livesearch").innerHTML="";
        document.getElementById("livesearch").style.border="0px";
        return;
      }
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
      } else {  // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
    //      document.getElementById("livesearch").innerHTML=this.responseText;
    //      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
//            console.log(this.responseText);
            var data = JSON.parse(this.responseText);
            
//            alert(data.length);
    //        for (var i = 0; i < data.length; i++) {
    //            console.log(data[i].name + ' is a ');
    //        }
//            autocomplete(document.getElementById("myInput"),document.getElementById("parent_element"), data);
            showResultList(data,str);

        }
      }
    //  xmlhttp.open("GET","templates/livesearch.php?q="+str,true);
      xmlhttp.open("GET","templates/livesearch.php?search_key="+str,true);
      xmlhttp.send();
    }
    
    function showResultList(arr,val){
      a = document.createElement("DIV");
      a.setAttribute("id", "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
//      this.parentNode.appendChild(parent_element);
      parent_element.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
              b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
    }
/*execute a function when someone clicks in the document:*/
document.addEventListener("click", function (e) {
    closeAllLists(e.target);
});
}


function searchFunction(){
    alert("found");
}

function showQuickView(title,author,price,subject,image,book_id){
//    alert(title+author+price+subject+image);
    
    var image_element = document.getElementById("modal_image");
    image_element.setAttribute("src","includes/images/"+image);
    
    var name_element = document.getElementById("modal_name");
    name_element.innerHTML = title;
    
    var author_element = document.getElementById("modal_author");
    author_element.innerHTML = author;
    
    var subject_element = document.getElementById("modal_subject");
    subject_element.innerHTML = subject;
    
    var price_element = document.getElementById("modal_price");
    price_element.innerHTML = price;
    
    var view_more_element = document.getElementById("modal_view_more");
    view_more_element.setAttribute("href","book_details.php?book_id="+book_id);
    
    
    $('#quick_view').modal('show');
    
    
    
}