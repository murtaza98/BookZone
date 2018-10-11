<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "db.php"; ?>
<?php
    if(isset($_POST['verify'])){
    	$entered_code = $_POST['code'];
    	$code_query = "SELECT code FROM verification WHERE email_id = {$email_id}";
    	$code_query_result = mysqli_query($connection, $code_query);
    	if(!$code_query_result){
            die('QUERY FAILED '.mysqli_error($connection));
        }else{
    		$row = mysqli_fetch_assoc($code_query_result);
    		$code = $row['code'];
    	}

    	if($entered_code == $code){
    		$query = "UPDATE users SET is_verified='true' WHERE username = {$username}";
       		$query_result = mysqli_query($connection,$query);
            include "templates/login_modal.php";
            echo "<script>$(window).on('load', function(){
                    $('#loginModal').modal('show');
                  });</script>";

            echo "<script>var att = document.createAttribute('disabled');
                att.value = 'disabled';
               document.getElementById('verify').setAttributeNode(att);</script>";
                $delete_query = "DELETE FROM verification WHERE email_id= {$email_id}";
    			$result = mysqli_query($connection, $delete_query);

            echo "<div class='col-sm-offset-5 col-sm-4'><a href='index.php' style='font-size: 16px;'>Back to home</a></div>";
    	}else{
    		$delete_query = "DELETE FROM verification WHERE email_id= {$email_id} and code = {$code}";
    		$result = mysqli_query($connection, $delete_query);
    	}
    }
?>