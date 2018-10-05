<?php
    function customPageHeader(){
    }
?>
<?php include "./templates/header.php"; ?>
<?php 
    if(isset($_GET['book_id']) && isset($_GET['type']) && isset($_SESSION['username'])){
        $type = $_GET['type'];
        $book_id = $_GET['book_id'];
        $username = $_SESSION['username'];
        
        switch($type){
            case "addToBookmark":
                $query = "INSERT INTO bookmark(username,book_id,date) VALUES('$username','$book_id',now())";
                break;
            case "removeFromBookmark":
                $query = "DELETE FROM bookmark WHERE username = '{$username}' AND book_id = '{$book_id}'";
                break;
            default:
                $query = null;
                break;
        }
        
        
        if($query != null){
            $query_result = mysqli_query($connection,$query);    
            if(!$query_result){
                die("<script>
                        window.location.href = 'book_details.php';
                        window.alert('Already bookmarked');
                      </script>");
            }else{
                echo "<script>
                        window.location.href = 'book_details.php';
                        window.alert('Added to bookmark');
                      </script>";
            }
        }
        
        
        
//        $book_id = $_GET['book_id'];
//        $username = $_SESSION['username'];
//        $query = "INSERT INTO bookmark(username,book_id,date) VALUES('$username','$book_id',now())";
//        $query_result = mysqli_query($connection,$query);    
//        if(!$query_result){
//            die("<script>
//                    window.location.href = 'book_details.php';
//                    window.alert('Already bookmarked');
//                  </script>");
//        }else{
//            echo "<script>
//                    window.location.href = 'book_details.php';
//                    window.alert('Added to bookmark');
//                  </script>";
//        }
    }
?>