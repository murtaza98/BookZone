<?php
    function customPageHeader(){
    }
?>

<?php include "./templates/header.php"; ?>

<?php include "./templates/navigation.php"; ?>

<!--View User details-->
<?php  
	$query = "SELECT * FROM users WHERE username='".addslashes($_SESSION['username'])."'";
	$details_set = mysqli_query($connection, $query);
	if(!$details_set){
            die("QUERY FAILED ".mysqli_error($connection));
        }else{
                $detail_row = mysqli_fetch_assoc($details_set);
        		$username = $detail_row['username'];
        		$password = $detail_row['password'];
        		$firstName = $detail_row['first_name'];
        		$middleName = $detail_row['middle_name'];
        		$lastName = $detail_row['last_name'];
        		$city = $detail_row['city'];
        		$pincode = $detail_row['pincode'];
                $category = $detail_row['user_category'];
        	}

    $contactQuery = "SELECT contact_no FROM contacts WHERE username='".addslashes($_SESSION['username'])."'";
    $contacts_set = mysqli_query($connection, $contactQuery);
    if(!$contacts_set){
            die("QUERY FAILED ".mysqli_error($connection));
        }else{
                $contact_row = mysqli_fetch_assoc($contacts_set); 
                $contactNo = $contact_row['contact_no'];  
        } 
?>

  <div class="container">
    <h1 class="text-center"><?php echo $_SESSION['username']?>'s details</h1>
    <form>
        <div class="row">
            <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <label for="email">Email</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="Email" class="form-control" id="email" value="<?php echo $username?>" placeholder="Email ID" disabled> 
                    </div>
                    <!--
                    <label for="passwd">Password</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="Password" class="form-control" id="passwd" value="<?php echo $password?>" placeholder="Password" disabled> 
                    </div>
                    -->
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="fname">First Name</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" id="fname" value="<?php echo $firstName?>" placeholder="First name" disabled>
                            </div>
                        </div>
                    
                        <div class="col-sm-4">
                            <label for="mname">Middle Name</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" id="mname" value="<?php echo $middleName?>" placeholder="Middle name" disabled>
                            </div>
                        </div>
                    
                        <div class="col-sm-4">
                            <label for="lname">Last Name</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" id="lname" value="<?php echo $lastName?>" placeholder="Last name" disabled>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                          <label for="city">City</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                                <input type="text" class="form-control" id="city" value="<?php echo $city?>" placeholder="City" disabled>
                            </div>

                            <label for="contact">Contact</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                <input type="number" class="form-control" id="contact" value="<?php echo $contactNo?>" placeholder="Contact Number" disabled>
                            </div><br>

                        </div>
                    
                        <div class="col-sm-6">
                            <label for="pincode">Pincode</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                                <input type="text" class="form-control" id="pincode" value="<?php echo $pincode?>" placeholder="Pincode" disabled>
                            </div>
                            <label for="pincode">Category</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                                <input type="text" class="form-control" id="pincode" value="<?php echo $category?>" placeholder="category" disabled>
                            </div><br> 
                            
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="edit_details.php" class="btn btn-primary form-control"><i class="glyphicon glyphicon-edit"> Edit</i></a>
                            </div>
                            <div class="col-sm-6">
                                <button class=" form-control btn btn-warning">Report</button>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-sm-3"></div>
        </div>
    </form>
</div>
