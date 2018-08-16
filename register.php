<?php
    function customPageHeader(){
    }
?>

<?php include "./templates/header.php"; ?>

<?php include "./templates/navigation.php"; ?>


<?php
    if(isset($_POST['submit'])){
        $user_name = $_POST['username'];
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
        
        $query = "INSERT INTO users(username,password,email,first_name,middle_name,last_name,city,pincode,user_category,role) VALUES('$user_name','$user_password','$user_email','$user_firstName','$user_middleName','$user_lastname','$user_city','$user_pincode','$user_category','$user_role');";
        $query .= " INSERT INTO contacts(contact_no) VALUES($user_contact) where username = '$username'";


        if(mysqli_multi_query($connection,$query)){
            do{
                if($query_result = mysqli_store_result($connection)){
                    // Free result set
                    mysqli_free_result($query_result);
                }
            }while(mysqli_next_result($connection));
        }else{
            die('QUERY FAILED '.mysqli_error($connection));
        }

    }
?>
<div class="container">
    <h1 class="text-center">Registration Form</h1>
    <form method="post" action="./register.php">
        <div class="row">
            <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <label for="username">Username</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input name="username" type="text" class="form-control" id="username" placeholder="Username" required="true"> 
                    </div>
                    <label for="passwd">Password</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input name="password" type="Password" class="form-control" id="passwd" placeholder="Password" required="true"> 
                    </div>
                    <label for="confirmpwd">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input name="confirmpassword" type="Password" class="form-control" id="confirmpwd" placeholder="Re-type password" required="true">
                    </div>
                    <label for="email">Email</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input name="email" type="Email" class="form-control" id="email" placeholder="Enter Email" required="true">
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="fname">First Name</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input name="firstname" type="text" class="form-control" id="fname" placeholder="First name" required="true">
                            </div>
                        </div>
                    
                        <div class="col-sm-4">
                            <label for="mname">Middle Name</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input name="middlename" type="text" class="form-control" id="mname" placeholder="Middle name">
                            </div>
                        </div>
                    
                        <div class="col-sm-4">
                            <label for="lname">Last Name</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input name="lastname" type="text" class="form-control" id="lname" placeholder="Last name" required="true">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="city">City</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                                <input name="city" type="text" class="form-control" id="city" placeholder="City" required="true">
                            </div>                            
                            <label for="contact">Contact</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                <input name="contact" type="number" class="form-control" id="contact" placeholder="Contact Number" valid><br>
                            </div>
                        </div>
                    
                        <div class="col-sm-6">
                            
                            <label for="pincode">Pincode</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                                <input name="pincode" type="number" class="form-control" id="pincode" placeholder="Pincode" required="true" valid>
                            </div>
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
                    <input name="submit" type="submit" class="btn btn-primary" value="REGISTER">
                </div>
            <div class="col-sm-3"></div>
            </div>
        </div>
    </form>
</div>


<?php include "templates/footer.php"; ?>