<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "./templates/db.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>BookZone</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <!--CDN for Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <!--cdn for font awesome icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
      
    <!--include navigation bar css -->  
    <link rel='stylesheet' type='text/css' href='includes/css/navbar.css'>
    <link type='text/css' href="includes/css/simple-sidebar.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
    <?php 
        if(function_exists('customPageHeader')){
            customPageHeader();
        }
    ?>

    <style type="text/css">
        .thumbnail{
            box-shadow: 1px 1px 1px 1px #9e9d9d;
        }
    </style>
    <script type='text/javascript' src='includes/javascript/navigation.js'></script>
</head>
<body>