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
				if(isset($_GET['editId'])){
					$book_id = $_GET['editId'];
					$query = "SELECT * FROM books WHERE book_id = $book_id";
					$result = mysqli_query($connection, $query);
					if(!$result){
						die("QUERY FAILED ".mysqli_error($connection));
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
			<form method="post">
				<h3><?php echo $bookname ?> details</h3>
				<div class="row">
					<div class="col-sm-6">
						<label>Seller Name</label>
						<input type="text" class="form-control" placeholder="<?php echo $sellername ?>" disabled>
						
						<label>Author</label>
						<input type="text" name="author" class="form-control" placeholder="<?php echo $author ?>">
						
						<label>Price</label>
						<input type="number" class="form-control" name="price" placeholder="<?php echo $price ?>">
						
						<label>Subject</label>
						<input type="text" class="form-control" name="subject" placeholder="<?php echo $subject ?>">

						<label>Status</label>
						<input type="text" class="form-control "name="status" placeholder="<?php echo $book_status ?>">
					</div>
					<div class="col-sm-6">
						<label>Book Name</label>
						<input type="text" name="bookname" class="form-control" placeholder="<?php echo $bookname ?>">

						<label>Upload Date</label>
						<input type="text" class="form-control" name="date" placeholder="<?php echo $upload_date ?>" disabled>

						<label>Original Price</label>
						<input type="number" class="form-control" name="original_price" placeholder="<?php echo $original_price ?>">

						<label>Edition</label>
						<input type="text" class="form-control" name="edition" placeholder="<?php echo $edition ?>">

						<label>Book Description</label>
						<textarea class="form-control" rows="3" placeholder="<?php echo $book_description ?>"></textarea>

					</div>
				</div>
				
			</form>
 
			<?php
					}
				}else{
					include "templates/view_all_books.php";
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