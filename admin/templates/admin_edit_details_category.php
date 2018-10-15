<?php  
	if (isset($_POST['change'])) {
		$edit_id = $_GET['edit'];
		$category_id = $_POST['category_id'];
		$category_name = $_POST['category_name'];
		
		$prepare_stmt = $connection->prepare("UPDATE categories SET category_id=?, category_name=? WHERE category_id =?");
        $prepare_stmt->bind_param("isi",$category_id,$category_name,$edit_id);
        
        if(!$prepare_stmt->execute()){
            die("QUERY FAILED ".mysqli_error($connection));
            $prepare_stmt->close();
        }else{
        	$_SESSION['edit_category'] = 'true';
        	$prepare_stmt->close();
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
			header("Location:../error.php");
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