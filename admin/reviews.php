<?php
    function customPageHeader(){
    	 echo "<link rel='stylesheet' type='text/css' href='includes/css/users.css'>";
         echo "<script type='text/javascript' src='includes/javascript/reviews.js'></script>";        
    }
?>
<?php include "./templates/admin-header.php"; ?>
<?php if(isset($_SESSION['username'])&&isset($_SESSION['user_role'])&&$_SESSION['user_role']=='admin'){ ?>
<?php include "./templates/admin-navigation.php"; ?>

<?php
	if(isset($_GET['delete'])){
		$book_delete = $_GET['delete'];

		$query = "DELETE FROM reviews WHERE book_id = '$book_delete'";

		$query_result = mysqli_query($connection,$query);

		if(!$query_result){
			die("QUERY FAILED ".mysqli_error($connection));
		}else{
			$_SESSION['ALERT'] = "RECORD DELETED";
			header("Location: reviews.php");
		}
	}
?>

<div id="wrapper">
	<div id="page-wrapper">
		<div class="container-fluid">
			<?php if(isset($_POST['review_submit'])&&isset($_POST['book_id'])) {
                    $book_id = $_POST['book_id'];
					$content  = $_POST['review'];
					$edit_query = "UPDATE reviews SET review_content = '{$content}' WHERE book_id = '{$book_id}'";
					$result = mysqli_query($connection, $edit_query);
					if (!$result) {
							die("QUERY FAILED " .mysqli_error($connection));
					}else{
						header("Location: reviews.php");
					}		
				}else{
					include "templates/view_all_reviews.php";
				}
			?>
		</div>
	</div>
</div>
<?php include "templates/admin-footer.php"; ?>
<?php 
    }else{
		header("Location: ../index.php");
	} 
?>