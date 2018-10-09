<?php  
	if (isset($_POST['change'])) {
		$edit_id = $_GET['edit'];
		$category_id = $_POST['category_id'];
		$category_name = $_POST['category_name'];
		
		$update_query = "UPDATE categories SET category_id=$category_id, category_name='$category_name' WHERE category_id = $edit_id";
        $update_query_result = mysqli_query($connection,$update_query);
        
        if(!$update_query_result){
            die("QUERY FAILED ".mysqli_error($connection));
        }else{
        	header("Location: categories.php");
		}
	}	
?>

<?php
	if(isset($_GET['edit'])){
		$category_id = $_GET['edit'];
		$query = "SELECT * FROM categories WHERE category_id = $category_id";
		$result = mysqli_query($connection, $query);
		if(!$result){
			die("QUERY FAILED ".mysqli_error($connection));
		}else{
			$row = mysqli_fetch_assoc($result);
			$category_id = $row['category_id'];
			$category_name = $row['category_name']; 
	?>

	<form method="post" action="">
		<label>Category Id</label>
		<input type="text" class="form-control" name="category_id" value="<?php echo $category_id ?>">
		
		<label>Category Name</label>
		<input type="text" name="category_name" class="form-control" value="<?php echo $category_name ?>">
		<br>
		<input type="submit" name="change" class="btn btn-primary" value="Save changes">
	</form>

	<?php }} ?>