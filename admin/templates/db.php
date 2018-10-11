<?php
    $servername = "localhost";
    $username = "id6856741_bookzone";
    $password = "bookzone";
    $database_name = "id6856741_bookzone";

    // Create connection
    $connection = mysqli_connect($servername, $username, $password,$database_name);
    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
//        echo "<h1>Connected</h1>";
    }

?>