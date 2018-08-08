<?php include "./templates/db.php"; ?>
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
    }else{
        echo "POST submit error";
    }
?>