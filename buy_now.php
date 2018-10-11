<?php
    function customPageHeader(){
        echo '<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">';
    }
?>
<?php include "./templates/header.php"; ?>
<div id="wrapper">
<?php include "./templates/navigation.php"; ?>
<div class= "container close_bookmark_sidebar" id="page-content-wrapper" style="margin: 0px; padding: 0px">

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
	    
	    $userQuery = "SELECT * FROM users WHERE username = '{$seller_username}'";
	    $userResult = mysqli_query($connection,$userQuery);
	    if(!$userResult){
            die('QUERY FAILED '.mysqli_error($connection));
        }
        else{
            $user_row = mysqli_fetch_assoc($userResult);
            $firstName = $user_row['first_name'];
            $lastName = $user_row['last_name'];
    	}

    	$contactQuery = "SELECT contact_no FROM contacts WHERE username = '{$seller_username}'";
	    $contacts_set = mysqli_query($connection, $contactQuery);
	    if(!$contacts_set){
	            die("QUERY FAILED ".mysqli_error($connection));
	        }else{
	                $contact_row = mysqli_fetch_assoc($contacts_set); 
	                $contactNo = $contact_row['contact_no'];  
	        } 
	}
?>
<div class="container close_bookmark_sidebar" id='container'>
    <div class="container" style="margin-top: 10px;">
        <div class="row">
            <div class="col-sm-4" id="bookImage">
                <img style="width:100%;" src="includes/images/<?php echo $book_image; ?>">
            </div>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-5">
                    	<div style="font-size: 35px;font-weight: 550; font-family: Karla, Arial, Helvetica">
                            <span><?php echo $book_name; ?></span><br>
                        </div>
                        <div class="price" style="font-family: Karla, Arial, Helvetica, sans-serif; font-size: 28px; ">
                            <span>&#x20b9; <?php echo $book_price; ?></span>
                        </div>
                        <div style="font-size: 20px; font-family: Karla, Arial, Helvetica">
                            <label for="seller_username">Username: </label>
                            <span id="seller_username"><?php echo $seller_username ?></span><br>
                            <label for="name">Name: </label>
                            <span id="name"><?php echo $firstName; ?> <?php echo $lastName; ?></span><br>
                            <label for="contactNo">Contact No.</label>
                            <span id="contactNo"><?php echo $contactNo; ?></span>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <form method="post" action="">
                            <div class="form-group">
                                <label for="sel1">Payment Method:</label>
                                <select class="form-control" name="payment_method" id="sel1">
                                    <option>None</option>
                                    <option>PayTM</option>
                                    <option>Cash</option>
                                    <option>Net Banking</option>
                                    <option>Freecharge</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="sel2">Delivary Method:</label>
                                <select class="form-control" name="delivary_method" id="sel2">
                                    <option>None</option>
                                    <option>Personal</option>
                                    <option>Courier</option>
                                </select>
                            </div>

                            <input type="submit" id="order" class="btn btn-primary form-control" value="Order" name="order">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <span style="font-size: 24px;font-weight: 450; font-family: Karla, Arial, Helvetica; color: ">More from <?php echo $seller_username ?></span>
        <div class='row'>
        <?php 
            $morebook_query = "SELECT * FROM books WHERE username = '{$seller_username}'";
            $morebook_set = mysqli_query($connection, $morebook_query);
            if(!$morebook_set){
                die('QUERY FAILED '.mysqli_error($connection));
            }
            else{
                while($morebook_row = mysqli_fetch_assoc($morebook_set)){
                    $morebook_id = $morebook_row['book_id'];
                    $morebook_name = $morebook_row['book_name'];
                    $morebook_author = $morebook_row['author'];
                    $morebook_edition = $morebook_row['edition'];
                    $morebook_subject = $morebook_row['subject'];
                    $morebook_price = $morebook_row['book_price'];
                    $morebook_image = $morebook_row['book_image'];
        ?>

            <div class="col-sm-6 col-md-3 col-lg-3 col-xs-6">
                <div class="thumbnail">
                    <div class="w3-display-container w3-hover-opacity">
                        <img src="includes/images/<?php echo $morebook_image ?>" alt="<?php echo $morebook_name ?>" style="width:100%; height: 290px;">
                        <div class="w3-display-middle w3-display-hover">
                            <a href="book_details.php?book_id=<?php echo $morebook_id?>">
                                <button class="w3-button" style="background-color: #0b113e; color: white">View Details</button></a>
                        </div>
                        <div class="w3-display-topright w3-display-hover">
                            <a data-toggle="modal" href="" data-target="#quick_look" style="color: white" title="quick look"><button><span class="glyphicon glyphicon-zoom-in" style="color: black"></span></button></a>
                        </div>
                    </div>
                    <div class="caption" style="height: 60px; border-top: 5px solid blue">
                        <p align="center"><?php echo $morebook_name ?></p>
                    </div>
                </div>
            </div>

        <?php 
                }
            }
        ?>
        </div>
    </div>
</div>
<div id="quick_look" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span><h4 style="width: auto;">Quick Look</h4>
                <button type="button" class="close" data-dismiss="modal" style="margin-right: 9px; width: auto;">&times;</button></span>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-5">
                        <img src="includes/images/<?php echo $morebook_image ?>">
                    </div>
                    <div class="col-sm-7">
                        <?php echo $morebook_name ?>
                        &#x20b9; <?php echo $morebook_price ?>
                    </div>
                </div>
            <div class="modal-footer" style="margin-right: 10px;">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="position: absolute; margin-bottom: 10px; margin-right: 10px; right: 0; bottom: 0">Close</button>
            </div>
            </div>
        </div>
    </div>
</div>

<!-- adding detials in buyer table -->
    <?php 
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
        }
        if (isset($_POST['order'])) {
            
            $book_id=$_GET['book_id'];
            
            $payment_method = $_POST['payment_method'];
            $delivary_method = $_POST['delivary_method'];
            $query = "INSERT INTO buyers VALUES('{$username}','{$book_name}','{$seller_username}',now(),'{$book_price}','{$payment_method}')";
            $query_result = mysqli_query($connection,$query);
            
            if(!$query_result){
                die('QUERY FAILED '.mysqli_error($connection));
            }else{
                echo "<h2>Book ordered</h2>";
                echo "<script type='text/javascript'>
                        document.getElementById('order').setAttribute('value', 'Ordered');
                        var att = document.createAttribute('disabled');
                        att.value = 'disabled';
                        document.getElementById('order').setAttributeNode(att);
                        document.getElementById('order').style.backgroundColor = 'red';
                    </script>";
                
                //make book status unavailable
                $updateQuery = "UPDATE books SET book_status='unavailable' WHERE book_id = $book_id";
                $updateResult =  mysqli_query($connection,$updateQuery);
                if(!$updateResult){
                        die('QUERY FAILED '.mysqli_error($connection));
                }
                
            }
            
            
        }

        if (isset($_POST['order'])) {
            $message = "{$username} is interested in buying {$book_name} , Preferred payment method: {$payment_method} , Preferred delivary mode: {$delivary_method}";
            $buyer_query = "INSERT INTO notification VALUES(NULL,'$seller_username','$message','Unseen','$username',now(),'pending')";
            $buyer_query_result = mysqli_query($connection, $buyer_query);
            if(!$buyer_query_result){
                die('QUERY FAILED '.mysqli_error($connection));
            }else{
                echo "Notification send";
            }

            $mail_query = "SELECT email FROM users WHERE username = '{$seller_username}'";
            $mail_query_result = mysqli_query($connection,$mail_query);
            if(!$mail_query_result){
                die('QUERY FAILED '.mysqli_error($connection));
            }else{
                $row = mysqli_fetch_assoc($mail_query_result);
                $email = $row['email'];
            }
            $message = wordwrap($message);
            $subject = "We have found someone who is interested in buying your book";
            mail($email, $subject, $message);
        }
    ?>


<?php include "templates/footer.php"; ?>