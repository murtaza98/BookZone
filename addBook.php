<?php
    function customPageHeader(){
        echo '<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>';
        echo '<script type="text/javascript" src="includes/javascript/add_book.js"></script>';
    }
?>
<?php include "./templates/header.php"; ?>
<?php include "./templates/navigation.php"; ?>
<?php
    if(!isset($_SESSION['username'])){
        header('Location: ./');
    }
?>
<?php
    if(isset($_SESSION['page_message'])){
        echo $_SESSION['page_message'];
        $_SESSION['page_message'] = null;
    }

?>
<?php
	if(isset($_POST['submit'])&&isset($_SESSION['username'])){
		$book_name=$_POST['book_name'];
		$book_price=$_POST['book_price'];
		$book_author=$_POST['book_author'];
		$book_edition=$_POST['book_edition'];
		$book_original_price=$_POST['book_original_price'];
		$book_category=$_POST['book_category'];
		$book_description=$_POST['book_description'];
        $book_subject = $_POST['book_subject'];
        
        $seller_name = $_SESSION['username'];
        
        
        $post_image = $_FILES['post_image']['name'];
		$post_image_temp_location = $_FILES['post_image']['tmp_name'];
		$post_image_error_code = $_FILES['post_image']['error'];
        
        $final_image_name = $book_name . '_' . $seller_name . '_'. rand(1,100) . '.' .  pathinfo($post_image)['extension'];        
        
        
        if($post_image_error_code === 0){
			move_uploaded_file($post_image_temp_location,"./includes/images/$final_image_name");
            
            $prepare_stmt = $connection->prepare("INSERT INTO books(username,book_name,author,edition,subject,category_id,book_price,book_original_price,book_description,date,book_image) VALUES(?,?,?,?,?,?,?,?,?,?,?) ");
            $date = date('Y-m-d');  
            $prepare_stmt->bind_param("ssssssiisss",$seller_name,$book_name,$book_author,$book_edition,$book_subject,$book_category,$book_price,$book_original_price,$book_description,$date,$final_image_name);
            if(!$prepare_stmt->execute()){
                die('QUERY FAILED '.mysqli_error($connection));
            }else{
                $book_id = mysqli_insert_id($connection);
                
                $_SESSION['page_message'] = '<h4 class="text-center text-success"><b>Book Added....Click <a href="book_details.php?book_id='.$book_id.'">here</a> to view the book</b></h4>';
                
                
                header('Location: addBook.php');
            }
            
            
        }else{
            $_SESSION['page_message'] = '<h3 class="text-center text-danger"><b>Error Uploading Image</b></h3>';
            header('Location: addBook.php');
        }       
        
	}
?>



<h3 class="text-center text-success"><b><u>Tell us more about your book</u></b></h3>

<br>
<div id="error_message" class="alert alert-danger" style="width:80%;margin:0 auto;display:none;">
   
</div>
<br>


<div class="container">
	<form method="POST" action="" onsubmit="return checkForm()" enctype="multipart/form-data">
		<div class="row">
			<div class="col-lg-6">
			    <div class="form-group">
                    <label for="book_category">Book Name</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-book"></i></span>
                        <input name="book_name" type="text" class="form-control" placeholder="Enter book name" required="true">
                    </div>
                </div>
                <div class="form-group">
                    <label for="book_category">Selling Price</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-inr"></i></span>
                        <input id="book_selling_price" onfocusout="checkPrice();" name="book_price" type="number" class="form-control" placeholder="Enter Selling price" required="true">
                    </div>
                </div>
                <div class="form-group">
                    <label for="book_category">Subject</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-inr"></i></span>
                        <input name="book_subject" type="text" class="form-control" placeholder="Enter Subject" required="true">
                    </div>
                </div>
                <div class="form-group">
                    <label for="book_category">Edition</label>
				    <input name="book_edition" type="number" class="form-control" placeholder="Enter book edition" required="true">
                </div>
			</div>
			<div class="col-lg-6">
			    <div class="form-group">
                    <label for="book_category">Author</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>	
                        <input name="book_author" type="text" class="form-control" placeholder="Enter author name" required="true"> 
                    </div>
                </div>
				<div class="form-group">
                    <label for="book_category">Original Price</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-inr"></i></span>
                        <input id="book_original_price" onfocusout="checkPrice();" name="book_original_price" type="number" class="form-control" placeholder="Enter Original price" required="true">
                    </div>
                </div>
                <div class="form-group">
                    <label for="book_category">Category</label>
                    <select class="form-control" name="book_category">
                        <option selected>Choose...</option>
                        <?php
                            $query = "SELECT * FROM categories WHERE parent_category_id = 0";

                            $query_result_category = mysqli_query($connection,$query);

                            if(!$query_result_category){
                                die("QUERY FAILED ".mysqli_error($connection));
                            }
                            while ($row_category = mysqli_fetch_assoc($query_result_category)) {
                                $category_id = $row_category['category_id'];
                                $category_name = $row_category['category_name'];

                                echo "<option value='{$category_id}'>{$category_name}</option>";

                            }
                        ?>
                    </select> 
                </div>
			  	<div class="form-group">
                    <label for="title">Post Image</label>
                    <input type="file" class="form-control" name="post_image">		
                </div>
			</div>
		</div>
		<div class="form-group">
            <label for="book_category">Book Description</label>
		    <textarea id="editor" name="book_description" class="form-control" rows="10" placeholder="Enter book's description"></textarea>
        </div>
	    <input name="submit" type="submit" class="btn btn-primary btn-center" value="Save Details">
	</form>
</div>
<br>
<br>
<br>
<br>
