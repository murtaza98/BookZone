<?php
    function customPageHeader(){
        echo "<link rel='stylesheet' type='text/css' href='includes/css/reg_form.css'>";
    }
?>

<?php include "./templates/header.php"; ?>

<?php include "./templates/navigation.php"; ?>


<div class="container">
    <h1 class="text-center">Registration Form</h1>
    <form>
        Email Id:<br>
        <input type="Email" name="username" size="46"> <br><br>
        Password:<br>
        <input type="Password" name="password" size="46"> <br><br>
        Confirm Password: <br>
        <input type="P" name="confirmpwd" size="46"> <br><br>
        First Name: &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; Last Name:<br>
        <input type="text" style="width: 187px;" name="firstname"> &nbsp;
        <input type="text" style="width: 186px;" name="lastname"> <br><br>
        Address:<br>
        <textarea style="width: 382px; height: 78px;"></textarea> <br><br>
        Contact number:<br>
        <input type="text" name="contact" size="46"> <br><br>

        <input type="submit" name="submit" value="REGISTER" style="margin-bottom: 10px;">
    </form>
</div>


<?php include "templates/footer.php"; ?>