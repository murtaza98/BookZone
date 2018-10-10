<?php include "./templates/admin-header.php"; ?>
<?php
	if(isset($_POST['add_category'])){
		$category_name = $_POST['category-name'];
		$query = "INSERT INTO categories(category_name,parent_category_id) VALUES('$category_name',0)";
		$query_result = mysqli_query($connection, $query);
		if(!$query_result){
			die("QUERY FAILED ".mysqli_error($connection));
		}else{
			$_SESSION['add_category'] = 'true';
			header("Location: categories.php");
		}
	}
?>