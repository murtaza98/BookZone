<?php
    function customPageHeader(){
        
    }
?>

<?php include "./templates/header.php"; ?>

<?php include "./templates/navigation.php"; ?>

<?php
    if(isset($_GET['book_id'])){
        $book_id = $_GET['book_id'];
        $query = "SELECT * FROM books WHERE book_id = $book_id";
        
        $query_result = mysqli_query($connection,$query);
        
        if(!$query_result){
            die('QUERY FAILED '.mysqli_error($connection));
        }
        $num_rows = mysqli_num_rows($query_result);
        if($num_rows==1){
            while($row = mysqli_fetch_assoc($query_result)){
                $book_name = $row['book_name'];
                $seller_username = $row['username'];
                $author = $row['author'];
                $edition = $row['edition'];
                $subject = $row['subject'];
                $category_id = $row['category_id'];
                $book_price = $row['book_price'];
                $book_original_price = $row['book_original_price'];
                $book_description = $row['book_description'];
                $book_image = $row['book_image'];
                $book_status = $row['book_status'];
                $date = $row['date'];
            }
        }
        
        
        //For loading category
        $query = "SELECT * FROM categories WHERE category_id = {$category_id}";
        $query_result = mysqli_query($connection,$query);
        if(!$query_result){
            die('CATEGORY QUERY FAILED '.mysqli_error($connection));
        }
        $num_rows = mysqli_num_rows($query_result);
        if($num_rows != 0){
            while($row = mysqli_fetch_assoc($query_result)){
                $category_name_temp = $row['category_name'];
                $parent_category_id = $row['parent_category_id'];
                if($parent_category_id == 0){
                    //IT has no parent
                    $category_name = $category_name_temp;
                }else{
                    //get the parent category name
                    $query_parent = "SELECT * FROM categories WHERE category_id = {$parent_category_id}";
                    
                    $query_result_parent = mysqli_query($connection,$query_parent);
                    
                    if(!$query_result_parent){
                        die('Parent category query failed '.mysqli_error($connection));
                    }else{
                        $num_rows = mysqli_num_rows($query_result_parent);
                        if($num_rows != 0){
                            while($row_parent = mysqli_fetch_assoc($query_result_parent)){
                                $parent_category_name = $row_parent['category_name'];
                                
                                $category_name = $parent_category_name . ' -> ' . $category_name_temp;
                            }
                        }else{
                            //some error occured, print only chid category
                            $category_name = $category_name_temp;
                        }
                    }
                }
            }
        }else{
            $category_name = "NO CATEGORY AVAILABLE";
        }
    }else{
        header('Location: ./');
    }
?>

<div class="container">
	<div class="row">
		<div class="col-sm-4" style="position: sticky; top: 0;">
			<img style="width:100%;" src="includes/images/<?php echo $book_image; ?>">
			<button type="button" class="btn" style="width: 49.3%; background-color: #396a94; color: white">Bookmark</button>
			<button type="button" class="btn" style="width: 49.3%; background-color: #18456b; color: white">Buy Now</button>
		</div>
		<div class="col-sm-6">
			<div class="bookName">
				<h3><?php echo $book_name; ?></h3>
				<h4>by <?php echo $author; ?></h4>
			</div>
		<div class="price">
			<span style="font-size: 28px;"><?php echo $book_price; ?></span>
			<span style="font-size: 16px; color: #878787; text-decoration: line-through;"><?php echo $book_original_price; ?></span>
		</div>
		<div class="Edition">
			<h5><strong>Edition</strong></h5>
            <p><?php echo $edition; ?></p>
		</div>	
		<div class="seller">
			<h5><strong>Seller's information</strong></h5>
            <p><?php echo $seller_username; ?></p>
		</div>
		<div class="subject">
			<h5><strong>Subject</strong></h5>
            <p><?php echo $subject; ?></p>
		</div>
		<div class="category">
			<h5><strong>Category</strong></h5>
            <p><?php echo $category_name; ?></p>
		</div>			
		<div class="bookDesc">
			<h5><strong>Book Description</strong></h5>
			<p><?php echo $book_description; ?></p>
		</div>
	</div>
</div>
