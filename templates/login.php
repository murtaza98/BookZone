<?php include "./db.php"; ?>
<?php session_start(); ?>
<?php
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $_SESSION['temp_username'] = $username; 
        //To prevent SQL injection
        $username = mysqli_real_escape_string($connection,$username);
        $password = mysqli_real_escape_string($connection,$password);
        
        $verify_query = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";
        
        $verify_query_result = mysqli_query($connection,$verify_query);
        
        if(!$verify_query_result){
            die("FAILED" . mysqli_error($connection));
        }else{
            $verify_row = mysqli_fetch_assoc($verify_query_result);
            $email_id = $verify_row['email'];
            $username = $verify_row['username'];
            $is_verified = $verify_row['is_verified'];
            if ($is_verified == 'false') {
                header("Location: ../verify_user.php?email_id='{$email_id}'&username='{$username}'");
            }
        }

        $query = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";
        
        $query_result = mysqli_query($connection,$query);

        if ($is_verified == 'true') {
            # code...
            if(!$query_result){
                die("FAILED" . mysqli_error($connection));
            }else{
                $row_count = mysqli_num_rows($query_result);
                if($row_count == 1){
                    while($row = mysqli_fetch_assoc($query_result)){
                        $username = $row['username'];
                        $name = $row['first_name'] . " " . $row['last_name'];
                        $user_role = $row['role'];
                        $user_category = $row['user_category'];

                        // echo "<h2 class = 'text-center'>WELCOME {$name}</h2>"; 


                        $_SESSION['username'] = $username;
                        $_SESSION['name'] = $name;
                        $_SESSION['user_role'] = $user_role;
                        $_SESSION['user_category'] = $user_category;

                        header('Location: ../');


                    }
                }
                else{
                    $_SESSION['autostart_modal'] = 'true';
                    header('Location: ../');
                }
            }
        }
    }else{
        echo "POST submit error";
    }
?>