<?php session_start(); ?>
<?php
    $_SESSION['username'] = null;
    $_SESSION['name'] = null;
    $_SESSION['user_role'] = null;
    $_SESSION['user_category'] = null;
    
    header('Location: ../');
?>