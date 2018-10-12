<?php include "./db.php"; ?>
<?php

    if(isset($_GET['search_key'])){
        $search_key = $_GET['search_key'];
        
        $query = "SELECT DISTINCT book_name from books WHERE book_name LIKE '%{$search_key}%'";
//        echo $query;

        $query_result = mysqli_query($connection,$query);

        $result = array();

        while($row = mysqli_fetch_assoc($query_result)){
            $result[] = $row['book_name'];
        }    


        $myJSON = json_encode($result);
        echo $myJSON;
        
    }
    








//$countries = array("Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua &amp; Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia &amp; Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre &amp; Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts &amp; Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad &amp; Tobago","Tunisia","Turkey","Turkmenistan","Turks &amp; Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe");


//// Array with names
//$a[] = "Anna";
//$a[] = "Brittany";
//$a[] = "Cinderella";
//$a[] = "Diana";
//$a[] = "Eva";
//$a[] = "Fiona";
//$a[] = "Gunda";
//$a[] = "Hege";
//$a[] = "Inga";
//$a[] = "Johanna";
//$a[] = "Kitty";
//$a[] = "Linda";
//$a[] = "Nina";
//$a[] = "Ophelia";
//$a[] = "Petunia";
//$a[] = "Amanda";
//$a[] = "Raquel";
//$a[] = "Cindy";
//$a[] = "Doris";
//$a[] = "Eve";
//$a[] = "Evita";
//$a[] = "Sunniva";
//$a[] = "Tove";
//$a[] = "Unni";
//$a[] = "Violet";
//$a[] = "Liza";
//$a[] = "Elizabeth";
//$a[] = "Ellen";
//$a[] = "Wenche";
//$a[] = "Vicky";
//
//// get the q parameter from URL
//$q = $_REQUEST["q"];
//
//$hint = "";
//
//// lookup all hints from array if $q is different from "" 
//if ($q !== "") {
//    $q = strtolower($q);
//    $len=strlen($q);
//    foreach($a as $name) {
//        if (stristr($q, substr($name, 0, $len))) {
//            if ($hint === "") {
//                $hint = $name;
//            } else {
//                $hint .= ", $name";
//            }
//        }
//    }
//}
//
//// Output "no suggestion" if no hint was found or output correct values 
//echo $hint === "" ? "no suggestion" : $hint;
?>