<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "./db.php"; ?>
<?php
    if(isset($_GET['verify_username'])){
        $username = $_GET['verify_username'];
        $query = "SELECT username from users WHERE username = '{$username}'";
        $query_result = mysqli_query($connection,$query);
        
        if(!$query_result){
            die("QUERY FAILED " . mysqli_error($connection));
        }else{
            $no_rows = mysqli_num_rows($query_result);
            
            if($no_rows == 0){
                echo "valid";
            }else{
                echo "invalid";
            }
        }
    }

    if(isset($_GET['verify_email'])){
        $email = $_GET['verify_email'];
        $query = "SELECT email from users WHERE email = '{$email}'";
        $query_result = mysqli_query($connection,$query);
        
        if(!$query_result){
            die("QUERY FAILED " . mysqli_error($connection));
        }else{
            $no_rows = mysqli_num_rows($query_result);
            
            if($no_rows == 0){
                echo "valid";
            }else{
                echo "invalid";
            }
        }
    }

    if(isset($_GET['verify_contact'])){
        $contact = $_GET['verify_contact'];
        $query = "SELECT contact_no from contacts WHERE contact_no = '{$contact}'";
        $query_result = mysqli_query($connection,$query);
        
        if(!$query_result){
            die("QUERY FAILED " . mysqli_error($connection));
        }else{
            $no_rows = mysqli_num_rows($query_result);
            
            if($no_rows == 0){
                echo "valid";
            }else{
                echo "invalid";
            }
        }
    }
    
?>