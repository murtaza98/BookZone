<?php ob_start(); ?>
<?php include "db.php"; ?>
<?php  
	if (isset($_POST['review_submit'])) {
		$book_id = $_POST['book_id'];
		$username = $_POST['username'];
		$rating = $_POST['ratings'];
		$content = $_POST['review_content'];

		$prepare_stmt = $connection->prepare("INSERT INTO reviews(username, book_id, ratings, review_content) VALUES(?,?,?,?)");
		$prepare_stmt->bind_param("siis",$username,$book_id,$rating,$content);
		if ($prepare_stmt->execute()) {
			header("Location: ../book_details.php?book_id=".$book_id);
		}else{
			die("FAILED" . mysqli_error($connection));
		}	
		$prepare_stmt->close();
	}
?>