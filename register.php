<?php
    function customPageHeader(){
        echo "<link rel='stylesheet' type='text/css' href='includes/css/reg_form.css'>";
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
        <i class="fa fa-info-circle"></i> Email Id:<br>
        <input type="Email" name="username" size="46"> <br><br>
        <i class="fa fa-info-circle"></i> Password:<br>
        <input type="Password" name="password" size="46"> <br><br>
        <i class="fa fa-info-circle"></i> Confirm Password: <br>
        <input type="Password" name="confirmpwd" size="46"> <br><br>
        <i class="fa fa-info-circle"></i> First Name: &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;<i class="fa fa-info-circle"></i> Last Name:<br>
        <input type="text" style="width: 187px;" name="firstname"> &nbsp;
        <input type="text" style="width: 186px;" name="lastname"> <br><br>
        <i class="fa fa-info-circle"></i> Address:<br>
        <textarea name="address" style="width: 382px; height: 78px;"></textarea> <br><br>
        <i class="fa fa-info-circle"></i> Contact number:<br>
        <input type="text" name="contact" size="46"> <br><br>

        <input type="submit" name="submit" value="REGISTER" style="margin-bottom: 10px;">
    </form>
</div>


<?php include "templates/footer.php"; ?>