<?php
    function customPageHeader(){
        echo "<script type='text/javascript' src='./includes/javascript/register.js'></script>";
    }
?>
<?php include "./templates/header.php"; ?>

<?php include "./templates/navigation.php"; ?>


<?php
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $user_password = $_POST['password'];
        $user_email = $_POST['email'];
        $user_firstName = $_POST['firstname'];
        $user_middleName = $_POST['middlename'];
        $user_lastname = $_POST['lastname'];
        $user_city = $_POST['city'];
        $user_pincode = $_POST['pincode'];
        $user_contact = $_POST['contact'];
        $user_category = $_POST['user_category'];
        $user_role = "user";
        $is_verified = 'false';
        $date = date('Y-m-d');
        $password = mysqli_real_escape_string($connection,$user_password);
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        //CALL procedure
        $query = "CALL addUser('$username','$hash_password','$user_email','$user_firstName','$user_middleName','$user_lastname','$user_city',$user_pincode,'$user_category','$user_role',$user_contact,'$is_verified','$date')";
        
        $query_result = mysqli_query($connection,$query);
        
        if(!$query_result){
            die('QUERY FAILED '.mysqli_error($connection));
        }else{
            header("Location: verify_user.php?email_id=$user_email&username=$username");
        }
       
    }
?>
<div class="container">
    <h1 class="text-center">Registration Form</h1>
    <p id="errorMsg" style='color:#F00'></p>
    <form method="post" onsubmit="return checkForm()" action="./register.php">
        <div class="row">
            <div class="col-sm-3"></div>
                <div class="col-sm-6">
                   <div class='form-group'>
                        <label for="username">Username</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input onkeyup="checkUsername(this.value)" name="username" type="text" class="form-control" id="username" placeholder="Username" required="true">
                        </div>              
                        <p id="username_error" style="color:red;display:none;"><b>Sorry!! This username is already taken</b></p>      
                    </div>
                    <div class='form-group'>
                        <label for="passwd">Password</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input name="password" type="Password" class="form-control" id="passwd" placeholder="Password" required="true"> 
                        </div>
                    </div>
                    
                    <div class='form-group'>
                        <label for="confirmpwd">Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input onfocusout="checkPassword()"  name="confirmpassword" type="Password" class="form-control" id="confirmpwd" placeholder="Re-type password" required="true">
                        </div>
                        <p id="error_msg_confirmpwd" style="color:#F00; padding-top: 5px; display:none">ERROR!!! Password doesnt match</p> 
                    </div>
                    <div class='form-group'>
                        <label for="email">Email</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input onkeyup="checkEmail(this.value)" name="email" type="Email" class="form-control" id="email" placeholder="Enter Email" required="true">
                        </div>
                        <p id="email_error" style="color:red;display:none;"><b>This email is already used, Please try some other email</b></p>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class='form-group'>
                                <label for="fname">First Name</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input name="firstname" onfocusout="checkName(this.value)" type="text" class="form-control" id="fname" placeholder="First name" required="true">
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-sm-4">
                           <div class='form-group'>
                                <label for="mname">Middle Name</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input name="middlename" onfocusout="checkName(this.value)" type="text" class="form-control" id="mname" placeholder="Middle name">
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-sm-4">
                           <div class='form-group'>
                                <label for="lname">Last Name</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input name="lastname" onfocusout="checkName(this.value)" type="text" class="form-control" id="lname" placeholder="Last name" required="true">
                                </div>
                            </div>
                        </div>
                    </div>
                    <p id="name_error" style="color:red;display:none;"><b>Name cannot contain numbers!!!</b></p>
                    
                    <div class="row">
                        <div class="col-sm-6">
                           <div class='form-group'>
                                <label for="city">City</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                                    <input name="city" type="text" class="form-control" id="city" placeholder="City" required="true">
                                </div>
                            </div>
                            <div class='form-group'>                           
                                <label for="contact">Contact</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                    <input name="contact" onfocusout="checkContact(this.value);" type="number" class="form-control" id="contact" placeholder="Contact Number" valid><br>
                                </div>
                            </div>
                            <p id="contact_error" style="color:red;"></p>
                        </div>
                    
                        <div class="col-sm-6">
                            
                            <div class='form-group'>
                                <label for="pincode">Pincode</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                                    <input name="pincode" onfocusout="checkPincode(this.value)" type="number" class="form-control" id="pincode" placeholder="Pincode" required="true" valid>
                                </div>
                            </div>
                            <p id="pincode_error" style="color:red;display:none;"><b>Enter 6 digit pincode!!!</b></p>
                            <div class="form-group">
                                  <label for="preference">Your Preference</label>
                                  <select name="user_category" class="form-control" id="preference">
                                        <option value="Computer">Computer</option>
                                        <option value="Mechanical">Mechanical</option>
                                        <option value="IT">IT</option>
                                        <option value="Electronics">Electronics</option>
                                        <option value="EXTC">EXTC</option>
                                  </select>
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                    <input name="submit" type="submit" id="final_submit" class="btn btn-primary" value="Verify and Register">
                    </div>
                </div>
            <div class="col-sm-3"></div>
        </div>
    </form>
</div>




<?php include "templates/footer.php"; ?>