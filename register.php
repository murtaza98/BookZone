<?php
    function customPageHeader(){
    }
?>

<?php include "./templates/header.php"; ?>

<?php include "./templates/navigation.php"; ?>


<?php
    if(isset($_POST['submit'])){
        $user_name = $_POST['username'];
        $user_pass = $_POST['password'];
        $user_firstName = $_POST['firstname'];
        $user_lastname = $_POST['lastname'];
        $user_address = $_POST['address'];
        $user_contact = $_POST['contact'];
        $user_role = "user";
        
        $query = "INSERT INTO users(username,password,first_name,last_name,role,area,contact_no) VALUES('$user_name','$user_pass','$user_firstName','$user_lastname','$user_role','$user_address',$user_contact)";
        
        $query_result = mysqli_query($connection,$query);
        
        if(!$query_result){
            die("QUERY FAILED ".mysqli_error($connection));
        }else{
            echo "<h2 class='text-center text-success'><b>DATA SAVED</b></h2>";
        }
        
    }
?>
<div class="container">
    <h1 class="text-center">Registration Form</h1>
    <form method="post" action="./register.php">
        <div class="row">
            <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <label for="email">Email</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="Email" class="form-control" id="email" placeholder="Email ID" required="true"> 
                    </div>
                    <label for="passwd">Password</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="Password" class="form-control" id="passwd" placeholder="Password" required="true"> 
                    </div>
                    <label for="confirmpwd">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="Password" class="form-control" id="confirmpwd" placeholder="Re-type password" required="true">
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="fname">First Name</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" id="fname" placeholder="First name" required="true">
                            </div>
                        </div>
                    
                        <div class="col-sm-4">
                            <label for="mname">Middle Name</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" id="mname" placeholder="Middle name">
                            </div>
                        </div>
                    
                        <div class="col-sm-4">
                            <label for="lname">Last Name</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" id="lname" placeholder="Last name" required="true">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="flatNo">Flat No.</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                                <input type="text" class="form-control" id="flatNo" placeholder="Flat no. , Street no.">
                            </div>
                            <label for="area">Area</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                                <input type="text" class="form-control" id="area" placeholder="Area">
                            </div>
                            <label for="contact">Contact</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                <input type="number" class="form-control" id="contact" placeholder="Contact Number"><br>
                            </div>
                        </div>
                    
                        <div class="col-sm-6">
                            <label for="city">City</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                                <input type="text" class="form-control" id="city" placeholder="City" required="true">
                            </div>
                            <label for="pincode">Pincode</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                                <input type="text" class="form-control" id="pincode" placeholder="Pincode" required="true">
                            </div>
                            <div class="form-group">
                                  <label for="preference">Your Preference</label>
                                  <select class="form-control" id="preference">
                                        <option>Computer</option>
                                        <option>Mechanical</option>
                                        <option>IT</option>
                                        <option>Electronics</option>
                                        <option>EXTC</option>
                                  </select>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="REGISTER">
                </div>
            <div class="col-sm-3"></div>
            </div>
        </div>
    </form>
</div>


<?php include "templates/footer.php"; ?>