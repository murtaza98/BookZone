<?php
    function customPageHeader(){
    	 echo "<link rel='stylesheet' type='text/css' href='includes/css/users.css'>";
    }
?>
<?php include "./templates/admin-header.php"; ?>
<?php if(isset($_SESSION['username'])) { ?>
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
				if(isset($_POST['add_category'])){
					$category_name = $_POST['category-name'];
					$query = "INSERT INTO categories(category_name,parent_category_id) VALUES('$category_name',0)";
					$query_result = mysqli_query($connection, $query);
					if(!$query_result){
						echo'<div class="alert alert-danger alert-dismissible">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>Error! </strong>Category already exists!!!
						 </div>';
					}else{
						echo'<div class="alert alert-success alert-dismissible">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>Success! </strong>New Category added!!!
						 </div>';
					}
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


<?php include "templates/admin-footer.php"; ?>
<?php }else{
		header("Location: ../index.php");
	} 
?>