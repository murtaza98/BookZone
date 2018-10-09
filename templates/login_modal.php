<div id="loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" style="margin-right: 9px;">&times;</button>
        <h3 class="modal-title"><b>&nbsp;LOGIN</b></h3>
      </div>
      <?php 
        if(isset($_SESSION['autostart_modal'])){
          echo '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error!</strong> Username or Password is wrong!!!
          </div>';
        }
      ?>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-8"> 
            <form method="post" action="./templates/login.php">

              <div class="form-group">
                <label for="email">Username</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <?php 
                      if(isset($_SESSION['autostart_modal'])){
                        $username = $_SESSION['temp_username'];
                        echo '<input id="text" type="text" class="form-control" name="username" value="'.$username.'">';
                        }else{
                          echo '<input id="text" type="text" class="form-control" name="username" placeholder="Username">';
                        }
                      ?>
                </div>                     
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                </div>                     
              </div>

              <div class="form-group">
                <input type="submit" class="btn btn-default" value="Login" name="submit" style="margin-bottom: 10px;">                
              </div>

            </form>
          </div>    
        <div class="col-sm-4" style=" padding-right: 0;">
            <br>
            <h3><b>NOT A MEMBER?</b></h3>
            <a href="register.php"><button type="button" class="btn btn-default">Register now</button></a>
        </div>
        </div>
      </div>
      <div class="modal-footer" style="margin-right: 10px;">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="position: absolute; margin-bottom: 10px; margin-right: 10px; right: 0; bottom: 0">Close</button>
      </div>
    </div>
  </div>
</div>