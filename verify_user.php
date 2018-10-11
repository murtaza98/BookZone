<?php
    function customPageHeader(){
        echo "<script type='text/javascript' src='./includes/javascript/verify_user.js'></script>";
    }
?>
<?php include "./templates/header.php"; ?>

<?php 
	if(isset($_GET['email_id']) && isset($_GET['username']) && !isset($_POST['verify'])) {
		$email_id = $_GET['email_id'];
		$username = $_GET['username'];
		$subject = "Verification code";
        $message = rand(1,999999);
        $query = "INSERT INTO verification VALUES('{$email_id}','{$message}')";
        $query_result = mysqli_query($connection, $query);
        mail($email_id, $subject, $message);
	}
?>
<div class="container">
	<div class="row">
		<div class="col-sm-offset-4 col-sm-4">
			<p style="font-size: 35px;font-weight: 550; font-family: Karla, Arial, Helvetica">Check your Email</p>
			<p style="font-size: 16px;font-family: Karla, Arial, Helvetica">We’ve sent a six-digit confirmation code to <strong><?php echo $email_id ?></strong>. Enter it below to confirm your email address.</p>
		</div>
        <div class="col-sm-offset-4 col-sm-4">
            <form method="post">
				<div class="form-group">
        			<label for="validate-email" style="font-size: 16px;font-family: Karla, Arial, Helvetica">Validate Email</label>
					<div class="input-group" data-validate="email">
						<input type="text" class="form-control" name="code" id="validate-email" required>
						<span class="input-group-btn"><button type="submit" class="btn btn-primary col-xs-12" name="verify" id="verify">Submit</button>	</span>
					</div>
				</div>
            </form>
        </div>
    </div>
</div>

<?php
    if(isset($_POST['verify'])){
    	$entered_code = $_POST['code'];
        $email_id = $_GET['email_id'];
		$username = $_GET['username'];
    	$code_query = "SELECT code FROM verification WHERE email_id = '{$email_id}'";
    	$code_query_result = mysqli_query($connection, $code_query);
    	if(!$code_query_result){
            die('QUERY FAILED '.mysqli_error($connection));
        }else{
    		$row = mysqli_fetch_assoc($code_query_result);
    		$code = $row['code'];
    	}

    	if($entered_code == $code){
    		$query = "UPDATE users SET is_verified='true' WHERE username = '{$username}'";
       		$query_result = mysqli_query($connection,$query);
            include "templates/login_modal.php";
            echo "<script>$(window).on('load', function(){
                    $('#loginModal').modal('show');
                  });</script>";

            echo "<script>var att = document.createAttribute('disabled');
                att.value = 'disabled';
               document.getElementById('verify').setAttributeNode(att);</script>";
                $delete_query = "DELETE FROM verification WHERE email_id= '{$email_id}'";
    			$result = mysqli_query($connection, $delete_query);

            echo "<div class='col-sm-offset-5 col-sm-4'><a href='index.php' style='font-size: 16px;'>Back to home</a></div>";
    	}else{
    		$delete_query = "DELETE FROM verification WHERE email_id= '{$email_id}' and code = '{$code}'";
    		$result = mysqli_query($connection, $delete_query);
    	}
    }
?>
