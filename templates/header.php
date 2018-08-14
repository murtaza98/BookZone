<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "./templates/db.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <!--CDN for Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    
    <!--cdn for font awesome icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    
    <!--include navigation bar css -->  
    <link rel='stylesheet' type='text/css' href='includes/css/navbar.css'>
    
    <!--Javascript to add textarea functions to sell book page-->
    <script type="text/javascript" src="includes/javascript/textareaFunctions.js"></script>
    
    <?php 
        if(function_exists('customPageHeader')){
            customPageHeader();
        }
    ?>
</head>
<body>