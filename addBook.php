<?php
    function customPageHeader(){
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

		$query = "INSERT INTO books(username,book_name,author,edition,subject,category_id,book_price,book_original_price,book_description,date) ";
        $query .= "VALUES('{$seller_name}','{$book_name}','{$book_author}','{$book_edition}','{$book_subject}',{$book_category},{$book_price},{$book_original_price},'{$book_description}',now())";
        
        
        $query_result = mysqli_query($connection,$query);
        
        if(!$query_result){
            die('QUERY FAILED '.mysqli_error($connection));
        }else{
            echo "<h2>Book Added</h2>";
        }
	}
?>

<div class="container">
	<form method="POST" action="">
		<div class="row">
			<div class="col-lg-6">
				Book Name <br>
				<div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-book"></i></span>
					<input name="book_name" type="text" class="form-control" placeholder="Enter book name" required="true">
				</div>  <br><br>
			  	Price <br>
				<div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-inr"></i></span>
                    <input name="book_price" type="text" class="form-control" placeholder="Enter price" required="true">
                </div> 	 <br><br>
                Subject <br>
				<div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-inr"></i></span>
                    <input name="book_subject" type="text" class="form-control" placeholder="Enter Subject" required="true">
                </div> 	 <br><br>
				Edition <br>
				<input name="book_edition" type="text" class="form-control" placeholder="Enter book edition" required="true">
				
			</div>
			<div class="col-lg-6">
				Author <br>
				<div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>	
					<input name="book_author" type="text" class="form-control" placeholder="Enter author name" required="true"> 
				</div> <br><br>
				Original Price <br>
				<div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-inr"></i></span>
                    <input name="book_original_price" type="text" class="form-control" placeholder="Enter price" required="true">
                </div> 	 <br><br>
                Category <br>
    			<select class="form-control" name="book_category">
    				<option selected>Choose...</option>
    				<?php
    					$query = "SELECT * FROM CATEGORIES WHERE parent_category_id = 0";

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
			  	</select> <br><br>
			</div>
		</div>
		Book description <br><br>
		<div class="btn-toolbar" role="toolbar" style="margin-left: 0px; background-color: #9e9e9e;">
			<ul>
				<li class="btn btn-secondary" title="Bold" onclick="boldText();
				"><i class="fa fa-bold"></i></li>
				<li class="btn btn-secondary" title="Italics"><i class="fa fa-italic"></i></li>
				<li class="btn btn-secondary" title="Underline"><i class="fa fa-underline"></i></li>
				<li class="btn btn-secondary" title="Unordered list"><i class="fa fa-list-ul"></i></li>
				<li class="btn btn-secondary" title="Ordered List"><i class="fa fa-list-ol"></i></li>
			</ul>
		</div>
		<textarea name="book_description" class="form-control" rows="5" placeholder="Enter book's description" style="resize: none;"></textarea><br>
	    <input name="submit" type="submit" class="btn btn-primary" value="REGISTER">
	</form>
</div>
