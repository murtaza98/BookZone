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
        else{
            $row = mysqli_fetch_assoc($query_result);
            $book_name = $row['book_name'];
            $seller_username = $row['username'];
            $book_price = $row['book_price'];
            $book_image = $row['book_image'];
        }
	    $updateQuery = "UPDATE books SET book_status='unavailable' WHERE book_id = $book_id";
	    $updateResult =  mysqli_query($connection,$updateQuery);
	    if(!$updateResult){
	            die('QUERY FAILED '.mysqli_error($connection));
	    }
	    
	    $userQuery = "SELECT * FROM users WHERE 'username'='$seller_username'";
	    echo $userQuery;
	    $userResult = mysqli_query($connection,$userQuery);
	    if(!$userResult){
            die('QUERY FAILED '.mysqli_error($connection));
        }
        else{
            $row = mysqli_fetch_assoc($userResult);
            $firstName = $row['first_name'];
            $lastName = $row['last_name'];
    	}

    	$contactQuery = "SELECT contact_no FROM contacts WHERE 'username'='$seller_username'";
	    $contacts_set = mysqli_query($connection, $contactQuery);
	    if(!$contacts_set){
	            die("QUERY FAILED ".mysqli_error($connection));
	        }else{
	                $contact_row = mysqli_fetch_assoc($contacts_set); 
	                $contactNo = $contact_row['contact_no'];  
	        } 
	}
?>

<div class="container">
    <div class="row">
        <div class="col-sm-4" id="bookImage">
            <img style="width:100%;" src="includes/images/<?php echo $book_image; ?>">
        </div>
        <div class="col-sm-8">
        	<div class="bookName" style="font-size: 28px; font-weight: bold;">
                    <?php echo $book_name; ?>
            </div>
            <?php echo $firstName; ?>
            <?php echo $lastName; ?>
            <?php echo $contactNo; ?>
            <?php echo $book_price; ?>
        </div>
    </div>
</div>