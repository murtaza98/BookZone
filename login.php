<?php
    function customPageHeader(){
        echo "<link rel='stylesheet' type='text/css' href='includes/css/login.css'>";
    }
?>

<?php include "./templates/header.php"; ?>

<?php include "./templates/navigation.php"; ?>

<div class="container">
  <h1>LOGIN</h1>
  <form>
    Email Id:<br>
    <input type="Email" name="username"> <br><br>
    Password:<br>
    <input type="Password" name="password"> <br><br>
    
    <input type="submit" name="submit" style="margin-bottom: 10px;">
  </form>
</div>

<?php include "templates/footer.php"; ?>