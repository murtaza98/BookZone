<?php
    function customPageHeader(){
    	 echo "<link rel='stylesheet' type='text/css' href='includes/css/users.css'>";
    }
?>
<?php include "./templates/admin-header.php"; ?>
<?php if(isset($_SESSION['username'])&&isset($_SESSION['user_role'])&&$_SESSION['user_role']=='admin'){?>
<?php include "./templates/admin-navigation.php"; ?>

<?php
	if(isset($_GET['delete'])){
		$book_delete = $_GET['delete'];

		$query = "DELETE FROM books WHERE book_id = {$book_delete}";

		$query_result = mysqli_query($connection,$query);

		if(!$query_result){
			die("QUERY FAILED ".mysqli_error($connection));
		}else{
			$_SESSION['ALERT'] = "RECORD DELETED";
			header("Location: books.php");
		}
	}
?>
<div class="container">
<div id="wrapper">
	<div id="page-wrapper">
		<div class="container-fluid">
			<?php
				
				if(isset($_SESSION['ALERT'])){
					echo "<h3 class = 'text-center text-success'><b>".$_SESSION['ALERT']."</b></h3>";
					$_SESSION['ALERT'] = null;
				}
			?>
			<?php
				if(isset($_GET['source'])){
					switch($_GET['source']){
						case 'view_all_books':
							include "templates/view_all_books.php";
							break;
						case 'edit_book':
							include "templates/admin_edit_book_details.php";
							break;
						default:
							include "templates/view_all_books.php";
							break;
					}
				}else{
					include "templates/view_all_books.php";
				}
			?>
		</div>
	</div>
</div>
</div>
<?php include "templates/admin-footer.php"; ?>
<?php }else{
		header("Location: ../index.php");
	} 
?>