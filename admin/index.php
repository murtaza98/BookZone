<?php ob_start(); ?>
<?php session_start(); ?>
<?php
    if(isset($_SESSION['username'])&&isset($_SESSION['user_role'])&&$_SESSION['user_role']=='admin'){
        
    }else{
        header("Location: ../");
    }
?>