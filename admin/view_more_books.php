<?php
    function customPageHeader(){
    	 echo "<link rel='stylesheet' type='text/css' href='includes/css/users.css'>";
    }
?>
<?php include "./templates/admin-header.php"; ?>
<?php if(isset($_SESSION['username'])&&isset($_SESSION['user_role'])&&$_SESSION['user_role']=='admin'){ ?>
<?php include "./templates/admin-navigation.php"; ?>

<div class="container">
    <div id="wrapper">
        <div id="page-wrapper">
<?php

	if (isset($_GET['bookid'])) {
        $book_id = $_GET['bookid'];
		$query = "SELECT * from books WHERE book_id = {$book_id}";

		$query_result = mysqli_query($connection,$query);

		if(!$query_result){
			header("Location: ../error.php");
		}else{
			$row = mysqli_fetch_assoc($query_result);
			$book_name = $row['book_name'];
            $category_id = $row['category_id'];
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

            $category_query = "SELECT * FROM categories WHERE category_id = {$category_id}";
            $category_query_result = mysqli_query($connection,$category_query);

            if(!$category_query_result){
                header("Location: ../error.php");
            }else{
                $category_row = mysqli_fetch_assoc($category_query_result);
                $category_name = $category_row['category_name'];
            }
?>
    <div class="row">
        <div class="col-lg-6 col-sm-12 col-xs-12 col-md-12" id="bookImage">
            <img style="width:50%;margin-top: 5%;margin-left: 25%;margin-right: 25%; border-radius: 8px;" src="../includes/images/<?php echo $book_image; ?>">
        </div>
        <div class="col-lg-6 col-sm-12 col-xs-12 col-md-12">
            <div class="desc_content" style="margin-bottom: 20px">
                <h5><font size="4"><b>Subject:</b>&nbsp;&nbsp;
                <?php echo $subject; ?></font></h5>
            </div>

            <div class="desc_content" style="margin-bottom: 20px">
                <h5><font size="4"><b>Category:</b>&nbsp;&nbsp;
                <?php echo $category_name; ?></font></h5>
            </div>

            <div class="desc_content" style="margin-bottom: 20px">
                <h5><font size="4"><b>Book Name:</b>&nbsp;&nbsp;
                <?php echo $book_name; ?></font></h5>
            </div>

            <div class="desc_content" style="margin-bottom: 20px">
                <h5><font size="4"><b>Author:</b>&nbsp;&nbsp;
                <?php echo $author; ?></font></h5>
            </div>

            <div class="desc_content" style="margin-bottom: 20px">
                <h5><font size="4"><b>Original Price:</b>&nbsp;&nbsp;
                <?php echo $book_original_price; ?></font></h5>
            </div>

            <div class="desc_content" style="margin-bottom: 20px">
                <h5><font size="4"><b>Book Price:</b>&nbsp;&nbsp;
                <?php echo $book_price; ?></font></h5>
            </div>

            <div class="desc_content" style="margin-bottom: 20px">
                <h5><font size="4"><b>Edition:</b>&nbsp;&nbsp;
                <?php echo $edition; ?></font></h5>
            </div>

            <div class="desc_content" style="margin-bottom: 20px">
                <h5><font size="4"><b>Subject:</b>&nbsp;&nbsp;
                <?php echo $subject; ?></font></h5>
            </div>

            <div class="desc_content" style="margin-bottom: 20px">
                <h5><font size="4"><b>Sold By:</b>&nbsp;&nbsp;
                <?php echo $seller_username; ?></font></h5>
            </div>

            <div class="desc_content" style="margin-bottom: 20px">
                <h5><font size="4"><b>Uploaded on:</b>&nbsp;&nbsp;
                <?php echo $date; ?></font></h5>
            </div>

            <div class="desc_content" style="margin-bottom: 20px">
                <h5><font size="4"><b>Description:</b>&nbsp;&nbsp;
                <div style="width:auto;"><?php echo $book_description; ?></div></font></h5>
            </div>

            <a href="books.php"><button class="btn btn-primary">View Less</button></a>
        </div>
    </div>
<?php 
		}
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