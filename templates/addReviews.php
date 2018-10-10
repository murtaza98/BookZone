<?php ob_start(); ?>
<?php include "db.php"; ?>
<?php  
	if (isset($_POST['review_submit'])) {
		$book_id = $_POST['book_id'];
		$username = $_POST['username'];
		$rating = $_POST['ratings'];
		$content = $_POST['review_content'];

		$query = "INSERT INTO reviews VALUES('$username','$book_id','$rating','$content')";
		$result = mysqli_query($connection, $query);
		if (!$result) {
				die("QUERY FAILED " .mysqli_error($connection));
		}else{
			header("Location: ../book_details.php?book_id=".$book_id);
		}	
	}
?>