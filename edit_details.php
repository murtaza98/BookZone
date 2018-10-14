<?php
    function customPageHeader(){
    }
?>
<?php include "./templates/header.php"; ?>

<?php include "./templates/navigation.php"; ?>

<!--Update User details-->
<?php  
    if (isset($_SESSION['edit_detail'])) {
        echo'<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> Changes Made!!!
              </div>';
         $_SESSION['edit_detail'] = null;
    }
?>

<?php
    if(isset($_POST['submit'])){
        $username = $_SESSION['username'];
        $user_flatNo = $_POST['street_no'];
        $user_area = $_POST['area'];
        $user_city = $_POST['city'];
        $user_pincode = $_POST['pincode'];
        $user_contact = $_POST['contact'];
        $user_category = $_POST['category'];
        
        $prepare_stmt = $connection->prepare("UPDATE users SET street_no=?,area=?,city=?,pincode=?,user_category=? WHERE username=?");
        $prepare_stmt->bind_param("ississ",$user_flatNo,$user_area,$user_city,$user_pincode,$user_category,$username);
        
        $prepare_stmt1 = $connection->prepare("UPDATE contacts SET contact_no = ? WHERE username=?");
        $prepare_stmt1->bind_param("ss",$user_contact,$username);
        $prepare_stmt1->execute();

        if(!$prepare_stmt->execute()){
            die("QUERY FAILED ".mysqli_error($connection));
            $prepare_stmt->close();
            $prepare_stmt1->close();
        }else{
            $_SESSION['edit_detail'] = 'true';
            $prepare_stmt->close();
            $prepare_stmt1->close();
            $redirect_url = "http://{$_SERVER['HTTP_HOST']}"."{$_SERVER['REQUEST_URI']}";
            header("Location: $redirect_url");
        }
    }
?>

<?php 
    if(isset($_SESSION['passwd_changed'])){
        echo '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> Password Changed!!!
              </div>';
        $_SESSION['passwd_changed'] = null;
    }
?>

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
        		$flatNo = $detail_row['street_no'];
        		$area = $detail_row['area'];
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
    <form method="post" action="./edit_details.php">
        <div class="row">
            <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <label for="email">Email</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="Email" class="form-control" id="email" value="<?php echo $username?>" placeholder="Email ID" disabled> 
                    </div>
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
                            <label for="flatNo">Flat No.</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                                <input name="street_no" type="number" class="form-control" id="flatNo" value="<?php echo $flatNo?>" placeholder="Flat no. , Street no.">
                            </div>
                            <label for="area">Area</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                                <input name="area" type="text" class="form-control" id="area" value="<?php echo $area?>" placeholder="Area">
                            </div>
                            <label for="contact">Contact</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                <input name="contact" type="number" class="form-control" id="contact" value="<?php echo $contactNo?>" placeholder="Contact Number">
                            </div><br>
                        </div>
                    
                        <div class="col-sm-6">
                            <label for="city">City</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                                <input name="city" type="text" class="form-control" id="city" value="<?php echo $city?>" placeholder="City">
                            </div>
                            <label for="pincode">Pincode</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                                <input name="pincode" type="text" class="form-control" id="pincode" value="<?php echo $pincode?>" placeholder="Pincode">
                            </div>
                            <div class="form-group">
                                  <label for="preference">Category</label>
                                  <select name="category" class="form-control" id="preference">
                                        <option <?php if($category=='FirstYear'){echo 'selected';} ?> value="FirstYear">FirstYear</option>
                                        <option <?php if($category=='SecondYear'){echo 'selected';} ?> value="SecondYear">SecondYear</option>
                                        <option <?php if($category=='ThirdYear'){echo 'selected';} ?> value="ThirdYear">ThirdYear</option>
                                        <option <?php if($category=='LastYear'){echo 'selected';} ?> value="LastYear">LastYear</option>
                                  </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <input name="submit" type="submit" class="form-control btn btn-primary" value="Save Changes">
                        </div>
                        <div class="col-sm-6 form-group">
                            <a data-toggle="modal" href="" data-target="#changePwdModal" class="btn btn-primary form-control">Change Password</a>
                            <?php include "templates/changePasswd.php" ?>
                        </div>
                    </div>
                </div>
            <div class="col-sm-3"></div>
        </div>
    </form>
</div>
