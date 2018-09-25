<?php
    $servername = "https://databases.000webhost.com/";
    $username = "id6856741_ojas";
    $password = "bookzone";
    $database_name = "id6856741_books_portal";
    // Create connection
    $connection = mysqli_connect($servername, $username, $password,$database_name);
    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
//        echo "<h1>Connected</h1>";
    }
?>
