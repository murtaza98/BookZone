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
        $query = "SELECT * FROM users WHERE username = '{$username}'";
        $query_result = mysqli_query($connection,$query);
        
        if(!$query_result){
            die("FAILED" . mysqli_error($connection));
        }else{
            $row = mysqli_fetch_assoc($query_result);
            $username = $row['username'];
            $hash_password = $row['password']; 
            $name = $row['first_name'] . " " . $row['last_name'];
            $user_role = $row['role'];                    
            $user_category = $row['user_category'];
            if (password_verify($password, $hash_password)) {
                $_SESSION['username'] = $username;
                $_SESSION['name'] = $name;
                $_SESSION['user_role'] = $user_role;
                $_SESSION['user_category'] = $user_category;
                header('Location: ../');
                if ($user_role == 'admin') {
                    header("Location: ../admin/admin_index.php");
                }
                    
            }
            else{
                $_SESSION['autostart_modal'] = 'true';
                header('Location: ../');
            }
        }
    }else{
        echo "POST submit error";
    }
?>

