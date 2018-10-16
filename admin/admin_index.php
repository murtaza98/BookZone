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
	.chart {
	  width: 100%; 
	  min-height: 450px;
	}
	.row {
	  margin:0 !important;
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
									$count_users = "SELECT COUNT(*) as total FROM users";
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
									$count_books = "SELECT COUNT(*) as total FROM books";
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
									$count_orders = "SELECT COUNT(*) as total FROM buyers";
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

		<script type="text/javascript">
			var months = ['August','September','October','November','December'];
		</script>

		<?php
			for ($i=0; $i < 5; $i++) { 
				$month = 8 + $i;
				if ($i < 2) {
					$month_match = '0'.$month;
				}else{
					$month_match = $month;
				}	

				$query1 = "SELECT COUNT(*) as total FROM users WHERE date LIKE '%-$month_match-%'";
				$query1_result = mysqli_query($connection, $query1);
				$users = mysqli_fetch_assoc($query1_result)['total'];

				$query2 = "SELECT COUNT(*) as total FROM books WHERE date LIKE '%-$month_match-%'";
				$query2_result = mysqli_query($connection, $query2);
				$books = mysqli_fetch_assoc($query2_result)['total'];

				$query3 = "SELECT COUNT(*) as total FROM buyers WHERE date LIKE '%-$month_match-%'";
				$query3_result = mysqli_query($connection, $query3);
				$buyers = mysqli_fetch_assoc($query3_result)['total'];
		?>

		<script type="text/javascript">
			var data<?php echo $i?>	= [months[<?php echo $i ?>], <?php echo $users ?>, <?php echo $books ?>, <?php echo $buyers ?>]; 	
		</script>

		<?php
			}
		?>

		<script type="text/javascript">
	      	google.charts.load('current', {'packages':['bar']});
	      	google.charts.setOnLoadCallback(drawChart);

	      	function drawChart() {
	        	var data = google.visualization.arrayToDataTable([
		        ['Month', 'Users', 'Books', 'Transactions'],
		        data0,
		        data1,
		        data2,
		        data3,
		        data4
		        ]);

	        var options = {
	          	chart: {
	            title: 'BookZone Performance',
	            subtitle: 'No. of Users, Books and transactions: August-December, 2018',
	          	}
	        };

	        var chart = new google.charts.Bar(document.getElementById('performance_chart'));

	        chart.draw(data, google.charts.Bar.convertOptions(options));
	      }
	    </script>

	    <div class="row">
		  	<div class="col-md-4 col-md-offset-4">
		    	<hr />
		  	</div>
		  	<div class="clearfix"></div>
		  	<div class="col-md-12">
		    	<div id="performance_chart" class="chart"></div>
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