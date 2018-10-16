<?php
    if(isset($_POST['submit_passwd'])){
        $oldPassword = $_POST['oldPasswd'];
        $newPassword = $_POST['newPasswd'];

        $oldPassword = mysqli_real_escape_string($connection,$oldPassword);
        $newPassword = mysqli_real_escape_string($connection,$newPassword);
        $hash_password = password_hash($newPassword, PASSWORD_DEFAULT);

        $query = "SELECT password FROM users WHERE username='".addslashes($_SESSION['username'])."'";
        $password_result = mysqli_query($connection, $query);
        $db_password = mysqli_fetch_assoc($password_result);
        if (password_verify($oldPassword, $db_password['password']) && $oldPassword != $newPassword) {
          $prepare_stmt = $connection->prepare("UPDATE users SET password=? WHERE username=?");
          $prepare_stmt->bind_param("ss",$hash_password,$username);
          if(!$prepare_stmt->execute()){
              die("QUERY FAILED ".mysqli_error($connection));
              $prepare_stmt->close();
          }else{
              $_SESSION['passwd_changed'] = 'true';
              $prepare_stmt->close();
              echo "<script>
                window.location.href = 'edit_details.php';
              </script>";
          }
        }else{
            echo "<script>window.alert('Old password did not match')</script>";
        }
    }
?>

<div id="changePwdModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" style="margin-right: 9px;">&times;</button>
        <h3 class="modal-title"><b>&nbsp;Change Password</b></h3>
      </div>
      <div class="modal-body">
            <form method="post" action="">
              <div class="form-group">
                <label for="oldPasswd">Old Password</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="oldPasswd" type="password" class="form-control" name="oldPasswd" placeholder="Old Password">
                </div>
              </div>

              <div class="form-group">
                <label for="newPasswd">New Password</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="newPasswd" type="password" class="form-control" name="newPasswd" placeholder="New Password" required>
                </div>
              </div>

              <div class="form-group">
                <label for="password">Confirm Password</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="comfirmPasswd" type="password" class="form-control" name="comfirmPasswd" placeholder="Confirm Password" required>
                </div>
              </div>

              <div class="form-group">
                <input type="submit" class="btn btn-default" value="Change" name="submit_passwd" style="margin-bottom: 10px;">
              </div>

            </form>
        </div>
        <div class="modal-footer" style="margin-right: 10px;">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="position: absolute; margin-bottom: 10px; margin-right: 10px; right: 0; bottom: 0">Close</button>
      </div>
      </div>
    </div>
  </div>
</div>
