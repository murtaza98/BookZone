<?php
    function customPageHeader(){
        echo "<link rel='stylesheet' type='text/css' href='includes/css/users.css'>";
    }
?>
<?php include "./templates/admin-header.php"; ?>
<?php if(isset($_SESSION['username'])&&isset($_SESSION['user_role'])&&$_SESSION['user_role']=='admin'){ ?>
<?php include "./templates/admin-navigation.php"; ?>

<div id="wrapper">
	<div id="page-wrapper">
		<div class="container-fluid">
			<?php include "templates/view_all_transactions.php" ?>
		</div>
	</div>
</div>

<?php include "templates/admin-footer.php"; ?>
<?php }else{
		header("Location: ../index.php");
	} 
?>