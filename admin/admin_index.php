<?php
    function customPageHeader(){
        echo "<link rel='stylesheet' type='text/css' href='includes/css/users.css'>";
    }
?>
<?php include "./templates/admin-header.php"; ?>
<?php if(isset($_SESSION['username'])) { ?>
<?php include "./templates/admin-navigation.php"; ?>

<div id="wrapper">
	<div id="page-wrapper">
		<div class="container-fluid">
			<h3 class="text-center"><b><u>New Users</u></b></h3>
			<table class="table table-bordered table-hover table-responsive">
				<thead>
					<tr>
						<th class="text-center">Username</th>
						<th class="text-center">Email Id</th>
						<th class="text-center">Verified</th>
						<th class="text-center">Date</th>
					</tr>
				</thead>
				<tbody>
					<?php  
						$date = date('Y-m-d', strtotime('-7 days'));
						$newuser_query = "SELECT username,email,is_verified,date FROM users WHERE date > '{$date}' ORDER BY date DESC, username ASC";
						$newuser_query_result = mysqli_query($connection, $newuser_query);
						if(!$newuser_query_result){
							die("QUERY FAILED ".mysqli_error($connection));
						}else{
							while($row = mysqli_fetch_assoc($newuser_query_result)){
							$username = $row['username'];
							$email = $row['email'];
							$isverified = $row['is_verified'];
							$date = $row['date'];
					?>
					<tr>
						<td class="text-center"><?php echo $username ?></td>
						<td class="text-center"><?php echo $email ?></td>
						<td class="text-center"><?php echo $isverified ?></td>
						<td class="text-center"><?php echo $date ?></td>
					</tr>
					<?php  
						}
					}
					?>
				</tbody>
			</table>
			<h3 class="text-center"><b><u>New Books</u></b></h3>
			<table class="table table-bordered table-hover table-responsive">
				<thead>
					<tr>
						<th class="text-center">SellerName</th>
						<th class="text-center">BookName</th>
						<th class="text-center">Date</th>
					</tr>
				</thead>
				<tbody>
					<?php  
						$date = date('Y-m-d', strtotime('-7 days'));
						$newbook_query = "SELECT username,book_name,date FROM books WHERE date > '{$date}' ORDER BY date DESC, username ASC";
						$newbook_query_result = mysqli_query($connection, $newbook_query);
						if(!$newbook_query_result){
							die("QUERY FAILED ".mysqli_error($connection));
						}else{
							while($row = mysqli_fetch_assoc($newbook_query_result)){
							$sellername = $row['username'];
							$bookname = $row['book_name'];
							$upload_date = $row['date'];
					?>
					<tr>
						<td class="text-center"><?php echo $sellername ?></td>
						<td class="text-center"><?php echo $bookname ?></td>
						<td class="text-center"><?php echo $upload_date ?></td>
					</tr>
					<?php  
						}
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php include "templates/admin-footer.php"; ?>
<?php }else{
		header("Location: ../index.php");
	} 
?>