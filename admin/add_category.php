<?php include "./templates/admin-header.php"; ?>
<?php if(isset($_SESSION['username'])&&isset($_SESSION['user_role'])&&$_SESSION['user_role']=='admin'){ ?>
<?php
	if(isset($_POST['add_category'])){
		$category_name = $_POST['category-name'];
		$a=0;
		$prepare_stmt = $connection->prepare("INSERT INTO categories(category_name,parent_category_id) VALUES(?,?)");
		$prepare_stmt->bind_param("si",$category_name,$a);
		if(!$prepare_stmt->execute()){
			die("QUERY FAILED ".mysqli_error($connection));
			$prepare_stmt->close();
		}else{
			$_SESSION['add_category'] = 'true';
			$prepare_stmt->close();
			header("Location: categories.php");
		}
	}
?>
<?php } ?>