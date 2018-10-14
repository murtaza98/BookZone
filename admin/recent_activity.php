<?php
    function customPageHeader(){
        echo "<link rel='stylesheet' type='text/css' href='includes/css/users.css'>";
    }
?>
<?php include "./templates/admin-header.php"; ?>
<?php if(isset($_SESSION['username'])&&isset($_SESSION['user_role'])&&$_SESSION['user_role']=='admin'){ ?>
<?php include "./templates/admin-navigation.php"; ?>

<style type="text/css">
	.huge {
    	font-size: 48px;
	}	

	.arrow-right {
		font-size: 16px;
	}
</style>
<div class="container">
<div id="wrapper">
	<div id="page-wrapper">
		<div class="row">
			<div class="col-sm-4">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="row">
							<div class="col-sm-3">
								<i class="fa fa-user fa-8x"></i>
							</div>
							<div class="col-sm-9 text-right">
								<?php 
									$date = date('Y-m-d', strtotime('-7 days'));
									$today = date('Y-m-d');
									$count_users = "SELECT COUNT(*) as total FROM users WHERE date > '{$date}' AND date <= '{$today}'";
									$users_result = mysqli_query($connection, $count_users);
									$users = mysqli_fetch_assoc($users_result)['total'];
								?>
								<div class="huge"><?php echo $users ?></div>
								<div>Users</div>
							</div>
						</div>
					</div>
					<a href="users.php">
						<div class="panel-footer">
							<div class="pull-left">
								View details
							</div>
							<div class="pull-right arrow-right">
								<i class="glyphicon glyphicon-circle-arrow-right"></i>							
							</div>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>

			<div class="col-sm-12 col-lg-4 col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="row">
							<div class="col-sm-3">
								<i class="fa fa-book fa-8x"></i>
							</div>
							<div class="col-sm-9 text-right">
								<?php  
									$date = date('Y-m-d', strtotime('-7 days'));
									$count_books = "SELECT COUNT(*) as total FROM books WHERE date > '{$date}' AND date <= '{$today}'";
									$books_result = mysqli_query($connection, $count_books);
									$books = mysqli_fetch_assoc($books_result)['total'];
								?>
								<div class="huge"><?php echo $books ?></div>
								<div>Books</div>
							</div>
						</div>
					</div>
					<a href="books.php">
						<div class="panel-footer">
							<div class="pull-left">
								View details
							</div>
							<div class="pull-right arrow-right">
								<i class="glyphicon glyphicon-circle-arrow-right"></i>							
							</div>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="row">
							<div class="col-sm-3">
								<i class="glyphicon glyphicon-transfer" style="font-size: 8em;"></i>
							</div>
							<div class="col-sm-9 text-right">
								<?php  
								    $date = date('Y-m-d', strtotime('-7 days'));	
									$count_orders = "SELECT COUNT(*) as total FROM buyers WHERE date > '{$date}' AND date <= '{$today}'";
									$orders_result = mysqli_query($connection, $count_orders);
									$orders = mysqli_fetch_assoc($orders_result)['total'];
								?>
								<div class="huge"><?php echo $orders ?></div>
								<div>Transactions</div>
							</div>
						</div>
					</div>
					<a href="transactions.php">
						<div class="panel-footer">
							<div class="pull-left">
								View details
							</div>
							<div class="pull-right arrow-right">
								<i class="glyphicon glyphicon-circle-arrow-right"></i>							
							</div>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>
		</div>

		<div class="container-fluid">
			<h3 class="text-center"><b><u>New Users</u></b></h3>
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
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
							$newuser_query = "SELECT username,email,is_verified,date FROM users WHERE date > '{$date}' AND date <= '{$today}' ORDER BY date DESC, username ASC";
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
			</div>
			<h3 class="text-center"><b><u>New Books</u></b></h3>
			<div class="table-responsive">
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
							$newbook_query = "SELECT username,book_name,date FROM books WHERE date > '{$date}' AND date <= '{$today}' ORDER BY date DESC, username ASC";
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
</div>
</div>
<?php include "templates/admin-footer.php"; ?>
<?php }else{
		header("Location: ../index.php");
	} 
?>