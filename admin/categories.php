<?php
    function customPageHeader(){
    	 echo "<link rel='stylesheet' type='text/css' href='includes/css/users.css'>";
    }
?>
<?php include "./templates/admin-header.php"; ?>
<?php if(isset($_SESSION['username'])&&isset($_SESSION['user_role'])&&$_SESSION['user_role']=='admin'){ ?>
<?php include "./templates/admin-navigation.php"; ?>

<?php
	if(isset($_GET['delete'])){
		$category_id = $_GET['delete'];

		$query = "DELETE FROM categories WHERE category_id = $category_id";

		$query_result = mysqli_query($connection,$query);

		if(!$query_result){
			die("QUERY FAILED ".mysqli_error($connection));
		}else{
			$_SESSION['ALERT'] = "RECORD DELETED";
			header("Location: categories.php");
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
						case 'view_all_categories':
							include "templates/view_all_categories.php";
							break;
						case 'edit_category':
							include "templates/admin_edit_details_category.php";
							break;
						default:
							include "templates/view_all_categories.php";
							break;
					}
				}else{
					include "templates/view_all_categories.php";
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