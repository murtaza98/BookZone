<?php include "./templates/admin-header.php"; ?>
<?php if(isset($_SESSION['username'])&&isset($_SESSION['user_role'])&&$_SESSION['user_role']=='admin'){  ?>
<?php
    if(isset($_POST['submit_passwd'])){
        $username = $_POST['username'];
        $oldPassword = $_POST['oldPasswd'];
        $newPassword = $_POST['newPasswd'];
        $query = "SELECT password FROM users WHERE username='$username'";
        $password_result = mysqli_query($connection, $query);
        $db_password = mysqli_fetch_assoc($password_result);
        if ($db_password['password'] == $oldPassword && $oldPassword != $newPassword) {
          $prepare_stmt = $connection->prepare("UPDATE users SET password=? WHERE username=?");
          $prepare_stmt->bind_param("ss",$newPassword,$username);          
          if(!$prepare_stmt->execute()){
              die("QUERY FAILED ".mysqli_error($connection));
              $prepare_stmt->close();
          }else{
              $_SESSION['passwd_changed'] = 'true';
              $prepare_stmt->close();
              echo "<script>
                window.location.href = 'users.php?source=edit_user&edit=$username';
                window.alert('Password Changed');
              </script>";
          }
        }else{
            echo "<script>window.alert('Old password did not match')</script>";
        }
    }
?>
<?php } ?>