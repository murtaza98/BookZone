<?php
    function customPageHeader(){
    }
?>
<!--div class="container">
  <h1>LOGIN</h1>
  <form method="post" action="./login.php">
    Email Id:<br>
    <input type="text" name="username"> <br><br>
    Password:<br>
    <input type="Password" name="password"> <br><br>
    
    <input type="submit" name="submit" style="margin-bottom: 10px;">
  </form>
</div-->

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

<div class="row">
    <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" style="margin-right: 9px;">&times;</button>
            <h3 class="modal-title"><b>&nbsp;LOGIN</b></h3>
    </div>
    <div class="modal-body">
        <div class="col-sm-8"> 
            <form method="post" action="./login.php">
            EMAIL ADDRESS<br>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="email" type="text" class="form-control" name="email" placeholder="Email">
                </div> <br>
            PASSWORD<br>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="password" type="password" class="form-control" name="password" placeholder="Password">
            </div> <br>
            <input type="submit" class="btn btn-default" style="margin-bottom: 10px;">
            </form>
        </div>    
        <div class="col-sm-4" style=" padding-right: 0;">
            <br>
            <h3><b>NOT A MEMBER?</b></h3>
            <a href="register.php"><button type="button" class="btn btn-default">Register now</button></a>
        </div>
    </div>
    <div class="modal-footer" style="margin-right: 10px;">
            <button type="button" class="btn btn-default" data-dismiss="modal" style="position: absolute; margin-bottom: 10px; margin-right: 10px; right: 0; bottom: 0">Close</button>
        </div>
</div>

<?php include "templates/footer.php"; ?>

