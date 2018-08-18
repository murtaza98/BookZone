<?php
    function customPageHeader(){
    }
?>

<?php include "./templates/header.php"; ?>

<?php include "./templates/navigation.php"; ?>

<?php 
	$username = $_SESSION['username'];
	$query = "SELECT * FROM books WHERE book_id IN ( SELECT book_id FROM bookmark WHERE username='$username')";
	$query_result = mysqli_query($connection, $query);
	if (!$query_result) {
		die('QUERY FAILED '.mysqli_error($connection));
	}else {
		while($query_set = mysqli_fetch_assoc($query_result)){
			$bookId = $query_set['book_id'];
			$bookName = $query_set['book_name'];
			$author = $query_set['author'];
			$edition = $query_set['edition'];
			$subject = $query_set['subject'];
			$bookPrice = $query_set['book_price'];
			$originalPrice = $query_set['book_original_price'];
			$bookDescription = $query_set['book_description'];
			$bookImage = $query_set['book_image'];
			$categoryId = $query_set['category_id'];
			$category_query = "SELECT category_name FROM categories WHERE category_id='$categoryId'";
			$category_result = mysqli_query($connection, $category_query);
			$category_set = mysqli_fetch_assoc($category_result);
			$categoryName = $category_set['category_name'];
			echo '<div class="container">
						<div class="media">
						  	<div class="media-left media-top">
						  		<a href="remove_bookmark.php?book_id='.$bookId.'"><i class="glyphicon glyphicon-remove" style="color: red;"></i></a>
						    	<img src="includes/images/'.$bookImage.'" class="media-object" style="width:60px">
						  	</div>
						  	<div class="media-body">
						    	<h4 class="media-heading"><b>'.$bookName.'</b>&nbsp;<small><b>'.$author.'</b></small></h4>
						    	<div class="price">
								<span style="font-size: 28px;"><?php echo $bookPrice; ?></span>
								<span style="font-size: 16px; color: #878787; text-decoration: line-through;"><?php echo $originalPrice; ?></span>
							</div>
							<div class="Edition">
								<h5><strong>Edition</strong>&nbsp'.$edition.'</h5>
							</div>	
						    	
						  	</div>
						</div>
					</div>';
		}
	}
 ?>

