<?php
    function customPageHeader(){
        echo "<link rel='stylesheet' type='text/css' href='includes/css/login.css'>";
    }
?>

<?php include "./templates/header.php"; ?>

<?php include "./templates/navigation.php"; ?>

<?php
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $query = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";
        
        $query_result = mysqli_query($connection,$query);
        
        if(!$query_result){
            die("FAILED" . mysqli_error($connection));
        }else{
            $row_count = mysqli_num_rows($query_result);
            if($row_count == 1){
                while($row = mysqli_fetch_assoc($query_result)){
                    $name = $row['first_name'];
                    echo "<h2 class = 'text-center'>WELCOME {$name}</h2>"; 
                }
            }
        }
    }
?>

<div class="container">
  <h1>LOGIN</h1>
  <form method="post" action="./login.php">
    Email Id:<br>
    <input type="text" name="username"> <br><br>
    Password:<br>
    <input type="Password" name="password"> <br><br>
    
    <input type="submit" name="submit" style="margin-bottom: 10px;">
  </form>
</div>

<?php include "templates/footer.php"; ?>