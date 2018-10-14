<?php  
	if (isset($_POST['change'])) {
		$book_id = $_GET['editId'];
		$bookname = $_POST['bookname'];
		$author = $_POST['author'];
		$price = $_POST['price'];
		$original_price = $_POST['original_price'];
		$edition = $_POST['edition'];
		$subject = $_POST['subject'];
		$edition = $_POST['edition'];
		$book_description = $_POST['book_description'];
		$status = $_POST['status'];
		
		$prepare_stmt = $connection->prepare("UPDATE books SET book_name= ?, author= ?, book_description = ?, book_price= ?,book_original_price= ?, subject= ?, book_status= ?, edition= ? WHERE book_id = ?");
        $prepare_stmt->bind_param("sssiisssi",$bookname,$author,$book_description,$price,$original_price,$subject,$status,$edition,$book_id);
        if(!$prepare_stmt->execute()){
            die("QUERY FAILED ".mysqli_error($connection));
            $prepare_stmt->close();
        }else{
        	$_SESSION['edit_book'] = 'true';
        	$prepare_stmt->close();
        	header("Location: books.php");
		}
	}	
?>

<?php
	if(isset($_GET['editId'])){
		$book_id = $_GET['editId'];
		$query = "SELECT * FROM books WHERE book_id = $book_id";
		$result = mysqli_query($connection, $query);
		if(!$result){
			header("Location:../error.php");
		}else{
			$row = mysqli_fetch_assoc($result);
			$sellername = $row['username'];
			$bookname = $row['book_name']; 
			$author = $row['author'];
			$upload_date = $row['date'];
			$book_description = $row['book_description'];
			$price = $row['book_price'];
			$original_price = $row['book_original_price'];
			$edition = $row['edition'];
			$book_status = $row['book_status'];
			$subject = $row['subject'];
	?>

	<form method="post" action="">
		<h3><?php echo $bookname ?> details</h3>
		<div class="row">
			<div class="col-sm-6">
				<label>Seller Name</label>
				<input type="text" class="form-control" value="<?php echo $sellername ?>" disabled>
				
				<label>Author</label>
				<input type="text" name="author" class="form-control" value="<?php echo $author ?>">
				
				<label>Price</label>
				<input type="number" class="form-control" name="price" value="<?php echo $price ?>">
				
				<label>Subject</label>
				<input type="text" class="form-control" name="subject" value="<?php echo $subject ?>">

				<label>Status</label>
				<input type="text" class="form-control "name="status" value="<?php echo $book_status ?>">
			</div>
			<div class="col-sm-6">
				<label>Book Name</label>
				<input type="text" name="bookname" class="form-control" value="<?php echo $bookname ?>">

				<label>Upload Date</label>
				<input type="text" class="form-control" name="date" value="<?php echo $upload_date ?>" disabled>

				<label>Original Price</label>
				<input type="number" class="form-control" name="original_price" value="<?php echo $original_price ?>">

				<label>Edition</label>
				<input type="text" class="form-control" name="edition" value="<?php echo $edition ?>">

				<label>Book Description</label>
				<textarea class="form-control" name="book_description" rows="3" value="<?php echo $book_description ?>"></textarea>

			</div>
		</div>
		<input type="submit" name="change" class="btn btn-primary" value="Save changes">
	</form>

	<?php }} ?>