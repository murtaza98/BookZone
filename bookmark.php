<?php
    function customPageHeader(){
    }
?>

<?php include "./templates/header.php"; ?>

<?php 
    if(isset($_GET['book_id'])){
        $book_id = $_GET['book_id']; 
        $username = $_SESSION['username'];
        $query = "INSERT INTO bookmark(username,book_id,date) VALUES('$username','$book_id',now())";
        $query_result = mysqli_query($connection,$query);    
        if(!$query_result){
            die('QUERY FAILED '.mysqli_error($connection));
        }else{
            echo "<script>
                    window.alert('Added to bookmark')
                  </script>";
        }
    }
?>