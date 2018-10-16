<?php
    function customPageHeader(){
    	echo "<script type='text/javascript' src='includes/javascript/order_status.js'></script>";
    }
?>
<?php include "./templates/header.php"; ?>
<div id="wrapper">
<?php include "./templates/navigation.php"; ?>

<?php  
	if (isset($_POST['seen'])) {
		$notification_id = $_POST['notification_id'];
		$notification_id = mysqli_real_escape_string($connection, $notification_id);
		$query = "UPDATE notification SET status='Seen' WHERE notification_id=$notification_id";
		$result = mysqli_query($connection, $query);
		header("Location: ./notification.php");
	}
?>

<div class= "container close_bookmark_sidebar" id="page-content-wrapper" style="margin: 0px; padding: 0px">

<div class="container close_bookmark_sidebar" id='container'>
	<div class="container" style="margin-top: 20px;">
		<div class="panel panel-default">
		  	<div class="panel-heading">
		  		<i class="glyphicon glyphicon-comment"></i> Messages
		  	</div>
		  	<div class="panel-body">
				<ul class="list-group">
					<?php 
	  					if(isset($_SESSION['username'])) {
	  						$username = $_SESSION['username'];
	  						$query = "SELECT * FROM notification WHERE username = '{$username}'";
	  						$query_result = mysqli_query($connection,$query);
					        if(!$query_result){
					            die("FAILED" . mysqli_error($connection));
					        }else{
					        	while ($row = mysqli_fetch_assoc($query_result)) {
					    			$message = $row['message'];
					    			$status = $row['status'];
					    			$buyer_name = $row['buyer_name'];
					    			$date = $row['date'];
					    			$offer_status = $row['offer_status'];
					    			$notification_id = $row['notification_id'];
					    			$status = $row['status'];
					?>	
					<li class="list-group-item">
				  		<div class="row">
				  			<?php  
				  				if ($status == "Unseen") {
				  			?>
					  			<div class="col-sm-1" align="center" style="width: 15px; padding-top: 23px; ">
					  				<form action="./notification.php" method="post">
							  			<input type="text" name="notification_id" value="<?php echo $notification_id ?>" style="display: none;">
									  	<input type="checkbox" name="seen" title="mark as read" onchange="submit()">
									</form>
					  			</div>
					  		<?php  
					  			}else{
					  		?>
					  			<div class="col-sm-1" align="center" style="width: 15px; padding-top: 23px;">
					  				<input type="checkbox" title="Seen" checked disabled>
					  			</div>
					  		<?php } ?>
				  			<div class="col-sm-1">
				  				<img src="./includes/images/img_avatar.png" class="media-object" style="width:60px; border-radius: 50%">
				  			</div>
				  			<div class='col-sm-10'>
				  				<span>From: <?php echo $buyer_name; ?></span>
				  				<span>on: <?php echo $date ?></span><br>
				  				<span style="font-size: 16px;font-weight: 550; font-family: Karla, Arial, Helvetica"><?php echo $message; ?></span><br>	
				  				<?php 
				  					if ($offer_status == "accepted") {
				  				?>
				  				<span>
				  					<button class="btn btn-success" disabled="true">Accepted</button>
				  				</span>

				  				<?php  
				  					}elseif ($offer_status == "rejected") {			  				
				  				?>
				  				<span>
				  					<button class="btn btn-danger" disabled="true">Declined</button>	
				  				</span>

				  				<?php 		
				  					}elseif ($offer_status == "pending"){
				  				?>
				  				<span>
				  					<button class="btn btn-success" id="accept<?php echo $notification_id ?>" onclick="accepted(<?php echo $notification_id?>)">Accept</button>
				  					<button class="btn btn-danger" id="decline<?php echo $notification_id ?>" onclick="rejected(<?php echo $notification_id?>)">Decline</button>	
				  				</span>
				  				<?php
				  					}else{ }		
				  				?>	     	
				  			</div>
				  		</div>
				  	</li>
				  	<?php 
								}
							}
		  				}
				  	?>
				</ul>
		  	</div>
		</div>
	</div>
</div>